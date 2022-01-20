<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }
    public function data_dokter()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Data Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['dokter'] = $this->model->data_dokter();
        $data['poli'] = $this->model->get_data('poliklinik');
        // var_dump($data['dokter']);
        // die();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/data_dokter', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added! </div>');
            redirect('menu');
        }
    }
    public function add_dokter()
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil = $this->input->post();
        $date = date('d-m-Y');
        // var_dump($ambil);
        // die();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password too short'
        ]);
        if ($this->form_validation->run() == false) {
            redirect('dokter/data_dokter');
        } else {
            $data = [
                'name' => $ambil['nama'],
                'email' => htmlspecialchars($this->input->post('email', true)),
                'img' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => $date
            ];
            $this->db->insert('user', $data);
            $ambil_dokter = $this->model->get_rowdata('user', 'name', $ambil['nama']);
            // var_dump($ambil_dokter);
            // die();
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kel' => $this->input->post('jenkel'),
                'spesialisasi' => $this->input->post('spesialisasi'),
                'id_poli' => $this->input->post('poli'),
                'id_user' => $ambil_dokter['id'],
            ];
            $this->db->insert('dokter', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Docter account has been created</div>');
            redirect('dokter/data_dokter');
        }
    }
    public function update_dokter()
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil = $this->input->post();
        $date = date('Y-m-d');
        $id_dokter = $this->input->post('id_dokter');
        // var_dump($ambil);
        // die();
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kel' => $this->input->post('jenkel'),
            'spesialisasi' => $this->input->post('spesialisasi'),
            'id_poli' => $this->input->post('poli'),
        ];
        $this->db->where('id_dokter', $id_dokter)->update('dokter', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Docter account has been created</div>');
        redirect('dokter/data_dokter');
    }

    public function hapus_dokter($id)
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil_dokter = $this->model->get_rowdata('dokter', 'id_dokter', $id);
        $ambil_user = $this->model->get_rowdata('user', 'id', $ambil_dokter['id_user']);
        // var_dump($ambil_user);
        // die();
        $this->db->where('id', $ambil_user['id']);
        $this->db->delete('user');
        $this->db->where('id_dokter', $id);
        $this->db->delete('dokter');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Dokter berhasil dihapus! </div>');
        redirect('dokter/data_dokter');
    }
}
