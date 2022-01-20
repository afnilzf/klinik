<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poliklinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Dashboard ';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['poli'] = $this->model->get_data('poliklinik');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('poli/index', $data);
        $this->load->view('templates/footer');
    }


    public function add_poli()
    {
        $data = [
            'nama_poli' => $this->input->post('poli'),
        ];
        $this->db->insert('poliklinik', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New poliklinik added! </div>');
        redirect('poliklinik');
    }
    public function update_poli()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_poli' => $this->input->post('poli'),
        ];
        $this->db->where('id_poli', $id)->update('poliklinik', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> has been updated! </div>');
        redirect('poliklinik');
    }
    public function hapus_poli($id)
    {
        $this->db->where('id_poli', $id);
        $this->db->delete('poliklinik');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> poliklinik berhasil dihapus! </div>');
        redirect('poliklinik');
    }
}
