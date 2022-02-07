<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berobat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $date = date('Y-m-d');
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Berobat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        if ($this->session->userdata('role_id') == 1) {
            $data['berobat'] = $this->model->data_berobat();
        } elseif ($this->session->userdata('role_id') == 3) {
            $poli_dokter =
                $this->db->get_where('dokter', ['nama' => $this->session->userdata('name')])->row_array();
            // var_dump($poli_dokter['id_poli']);
            // die();
            $data['berobat'] = $this->model->data_berobatDokter($date, $poli_dokter['id_poli']);
        } elseif ($this->session->userdata('role_id') == 4) {
            $data['berobat'] = $this->model->data_berobatApteker($date);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berobat/index', $data);
        $this->load->view('templates/footer');
    }

    public function resep($id)
    {
        // var_dump($id);
        // die();
        $date = date('Y-m-d');
        $this->load->model('Eksekusi_model', 'model');
        $data['title'] = 'Resep Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['obat'] = $this->model->get_data('obat');
        $data['resep'] = $this->model->resep($id);
        // var_dump($data['resep']);
        // die();
        if (!$data['resep'] == 0) {
            $id_pasien = $data['resep'][0]['id_pasien'];
            $data['berobat'] = $this->model->data_berobatSatuKondisi($id_pasien);
        }
        $data['transaksi'] = $this->model->transaksi($id);
        // var_dump(($data['transaksi']));
        // die();
        $data['jumlah'] = $this->model->get_rowdata('transaksi', 'id_berobat', $id);
        // var_dump($data['transaksi']);
        // die();
        // $COUNT = count($data['resep']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berobat/data_berobat', $data);
        $this->load->view('templates/footer');
    }
    public function simpan_resep()
    {
        // var_dump($id);
        // die();
        $date = date('Y-m-d');
        $id = $this->input->post('id_berobat');
        $this->load->model('Eksekusi_model', 'model');
        $cekResep = $this->model->get_rowdata('resep', 'id_berobat', $id);
        if ($cekResep != 0) {
            $data = [
                'status' => 'Transaksi'
            ];
            $this->model->update('berobat', $data, 'id_berobat', $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">resep berhasil dikirim! </div>');
            redirect('berobat');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon isi resep terlebih dahulu! </div>');
            redirect('berobat/resep/' . $id);
        }
    }
    public function add_resep()
    {
        $id = $this->input->post('id_berobat');
        $data = [
            'id_berobat' => $this->input->post('id_berobat'),
            'id_obat' => $this->input->post('obat'),
            'keterangan_pakai' => $this->input->post('keterangan'),
        ];
        $this->db->insert('resep', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New resep added! </div>');
        redirect('berobat/resep/' . $id);
    }
    public function edit_resep()
    {
        $this->load->model('Eksekusi_model', 'model');
        $id = $this->input->post('id_resep');
        $id_berobat = $this->input->post('id_berobat');
        // var_dump($id_berobat);
        // die();
        $data = [
            'id_obat' => $this->input->post('obat'),
            'keterangan_pakai' => $this->input->post('keterangan'),
        ];
        $this->model->update('resep', $data, 'id_resep', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New resep added! </div>');
        redirect('berobat/resep/' . $id_berobat);
    }
    public function simpan_transaksi()
    {
        $this->load->model('Eksekusi_model', 'model');
        $id = $this->input->post('id_berobat');
        $resep = $this->model->resep($id);
        $id_pasien = $resep[0]['id_pasien'];
        $berobat = $this->model->data_berobatSatuKondisi($id_pasien);
        // var_dump($berobat);
        // die();
        $kode_transaksi = rand(10000, 100000);
        $i = 1;
        foreach ($resep as $key) {
            $qty = $this->input->post('jumlah' . $i);
            $sub = $qty * $key['harga_jual'];
            $data = [
                'id_obat' => $key['id_obat'],
                'id_berobat' => $key['id_berobat'],
                'qty' => $qty,
                'sub_total' => $sub,
            ];
            $this->db->insert('transaksi', $data);
            $stokawal = $this->model->get_rowdata('obat', 'id_obat', $key['id_obat']);
            $stok = [
                'stok_obat' => (int)$stokawal['stok_obat'] - $qty,
            ];
            $this->model->update('obat', $stok, 'id_obat', $key['id_obat']);
            $i++;
        }
        if ($berobat['status_bpjs'] == 'Tidak') {
            $total = $this->model->sum_total($id);
            $update = [
                'total' => $total['hasil'],
            ];
            $this->model->update('transaksi', $update, 'id_berobat', $id);
        } elseif ($berobat['status_bpjs == Ada']) {
            $total = $this->model->sum_total($id);
            $update = [
                'total' => 0,
            ];
            $this->model->update('transaksi', $update, 'id_berobat', $id);
        }
        $selesai = [
            'status' => 'Selesai',
        ];
        $this->model->update('berobat', $selesai, 'id_berobat', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New resep added! </div>');
        redirect('berobat/resep/' . $id);
    }
    public function hapus_resep($id)
    {
        $ambil = $this->input->post();
        $this->load->model('Eksekusi_model', 'model');
        // var_dump($ambil_user);
        // die();
        $this->db->where('id_resep', $id);
        $this->db->delete('resep');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> resep berhasil dihapus! </div>');
        redirect('berobat/resep/' . $ambil['id_berobat']);
    }
}
