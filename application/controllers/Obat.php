<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat
extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Data Obat ';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['obat'] = $this->model->get_data('obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('obat/stok_obat', $data);
        $this->load->view('templates/footer');
    }
    public function stok_obat()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Dashboard ';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['obat'] = $this->model->get_data('obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('obat/stok_obat', $data);
        $this->load->view('templates/footer');
    }


    public function add_obat()
    {
        $data = [
            'nama_obat' => $this->input->post('obat'),
            'stok_obat' => $this->input->post('stok'),
            'satuan' => $this->input->post('satuan'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('obat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New obat added! </div>');
        redirect('obat');
    }

    public function hapus($id_obat)
    {
        $this->db->where('id_obat', $id_obat);
        $this->db->delete('obat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Obat berhasil dihapus! </div>');
        redirect('obat');
    }
    public function update_obat()
    {
        $ambil = $this->input->post();
        $this->load->model('Eksekusi_model', 'model');
        $id = $ambil['id_obat'];

        $update = [
            'nama_obat' => $ambil['obat'],
            'stok_obat' => $ambil['stok'],
            'satuan' => $ambil['satuan'],
            'keterangan' => $ambil['keterangan'],

        ];
        $this->model->update('obat', $update, 'id_obat', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> obat has been updated! </div>');
        redirect('obat');
    }
}
