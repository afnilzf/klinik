<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apoteker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Apoteker';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('apoteker/index', $data);
        $this->load->view('templates/footer');
    }
    public function data_apoteker()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Data Apoteker';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['apoteker'] = $this->model->get_data('apoteker');
        // $data['poli'] = $this->model->get_data('poliklinik');
        // var_dump($data['dokter']);
        // die();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('apoteker/data_apoteker', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added! </div>');
            redirect('apoteker/data_apoteker');
        }
    }
    public function add_apoteker()
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
            redirect('apoteker/data_apoteker');
        } else {
            $data = [
                'name' => $ambil['nama'],
                'email' => htmlspecialchars($this->input->post('email', true)),
                'img' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 4,
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
                'id_user' => $ambil_dokter['id'],
            ];
            $this->db->insert('apoteker', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Docter account has been created</div>');
            redirect('apoteker/data_apoteker');
        }
    }
    public function update_apoteker()
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil = $this->input->post();
        $date = date('Y-m-d');
        $id = $this->input->post('id');
        // var_dump($ambil);
        // die();
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->where('id_apoteker', $id)->update('apoteker', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Docter account has been updated</div>');
        redirect('apoteker/data_apoteker');
    }

    public function hapus_apoteker($id)
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil_dokter = $this->model->get_rowdata('apoteker', 'id_apoteker', $id);
        $ambil_user = $this->model->get_rowdata('user', 'id', $ambil_dokter['id_user']);
        // var_dump($ambil_user);
        // die();
        $this->db->where('id', $ambil_user['id']);
        $this->db->delete('user');
        $this->db->where('id_apoteker', $id);
        $this->db->delete('apoteker');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Apoteker berhasil dihapus! </div>');
        redirect('apoteker/data_apoteker');
    }
}
