<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }
    public function transaksi_masuk()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Transaksi Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['transaksi'] = $this->model->transaksi_masuk();
        $data['poli'] = $this->model->get_data('poliklinik');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/transaksi_masuk', $data);
        $this->load->view('templates/footer');
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
    public function rekapHarian()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Transaksi Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $ambil = $this->input->post();
        $date = date('d-m-Y');
        $data['transaksi'] = $this->model->transaksiRekap($ambil['date']);
        $data['total'] = $this->model->sum_totalRekap($ambil['date']);
        $data['poli'] = $this->model->get_data('poliklinik');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/rekap', $data);
        $this->load->view('templates/footer');
    }
    public function rekapBulanan()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Transaksi Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $ambil = $this->input->post();
        $tahun = date('Y');
        // $date = $date.$ambil['bulan'];
        $data['transaksi'] = $this->model->transaksiRekapBulan($ambil['bulan'], $tahun);
        $data['total'] = $this->model->sum_totalRekapBulan($ambil['bulan'], $tahun);
        $data['poli'] = $this->model->get_data('poliklinik');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/rekap', $data);
        $this->load->view('templates/footer');
    }
}
