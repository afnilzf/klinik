<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Info';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }
    public function info_terbaru()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Info';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['info'] = $this->model->get_data('info');
        // var_dump($data['dokter']);
        // die();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('info/info_terbaru', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added! </div>');
            redirect('menu');
        }
    }
    public function add_info()
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil = $this->input->post();
        $date = date('Y-m-d');
        $foto = $_FILES['file'];
        // var_dump($foto);
        // die();
        if ($foto != '') {
            $config['upload_path'] = './assets/upload/gambar-info';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $foto = 'default.jpg';
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            'judul_info' => $ambil['judul'],
            'gambar_info' => $foto,
            'isi_info' => $ambil['isi'],
            'tanggal_info' => $date,
        ];
        $this->db->insert('info', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Docter account has been created</div>');
        redirect('info/info_terbaru');
    }
}
