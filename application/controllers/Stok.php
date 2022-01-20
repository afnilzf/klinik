<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Stok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/index', $data);
        $this->load->view('templates/footer');
    }
    public function stok_keluar()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Stok Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['stok_keluar'] = $this->model->stok_keluar();
        $data['poli'] = $this->model->get_data('poliklinik');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/stok_keluar', $data);
        $this->load->view('templates/footer');
    }
    public function stok_masuk()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Stok Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['stok_masuk'] = $this->model->stok_masuk();
        $data['poli'] = $this->model->get_data('poliklinik');
        $data['obat'] = $this->model->get_data('obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/stok_masuk', $data);
        $this->load->view('templates/footer');
    }
    public function add_stok()
    {
        $this->load->model('Eksekusi_model', 'model');
        $ambil = $this->input->post();
        $date = date('Y-m-d');
        $id_obat = $this->input->post('obat');
        $stok_masuk = $this->input->post('stok');
        $data = [
            'id_obat' => $id_obat,
            'stok_masuk' => $stok_masuk,
            'tanggal_masuk' => $date,
        ];
        $this->db->insert('stok_masuk', $data);
        $obat = $this->model->get_rowdata('obat', 'id_obat', $id_obat);
        $update = [
            'stok_obat' => (int)$obat['stok_obat'] + (int)$stok_masuk,
        ];
        $this->db->where('id_obat', $id_obat)->update('obat', $update);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Docter account has been created</div>');
        redirect('stok/stok_masuk');
    }
}
