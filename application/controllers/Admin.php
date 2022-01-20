<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard ';
        $session = $this->session->userdata();
        $this->load->model('Eksekusi_model', 'model');
        $date = date('Y-m-d');
        // var_dump($date);
        // die();  
        // var_dump($session);
        // die();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['count_pasien_sekarang'] = count($this->model->pasienHariIni($date));
        $data['count_pasien_sekarang_umum'] = count($this->model->pasienPoli($date, 2));
        $data['count_pasien_sekarang_gigi'] = count($this->model->pasienPoli($date, 1));
        $data['count_pasien_selesai'] = count($this->model->pasienSelesai($date));
        $data['data_pasien'] = $this->model->dataPasien();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function add_role()
    {
        $data = [
            'role' => $this->input->post('role'),
        ];
        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New role added! </div>');
        redirect('admin/role');
    }
    public function edit_role()
    {
        $ambil = $this->input->post();
        $id = $ambil['id'];

        $update = [
            'role' => $ambil['role'],

        ];
        $this->db->where('id', $id)->update('user_role', $update);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Role has been updated! </div>');
        redirect('admin/role');
    }
    public function hapus_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Role berhasil dihapus! </div>');
        redirect('admin/role');
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
    }
}
