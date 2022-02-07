<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'SiKlinik ';
        $this->load->model('Eksekusi_model', 'model');
        $data['poli'] = $this->model->get_data('poliklinik');
        $data['info'] = $this->model->get_data('info');
        $data['dokter'] = $this->model->data_dokter();
        $data['cari'] = 0;

        $this->load->view('landing-page/header', $data);
        $this->load->view('landing-page/body', $data);
        $this->load->view('landing-page/footer');
    }
    public function pendaftaran()
    {
        $this->load->model('Eksekusi_model', 'model');
        // var_dump($this->input->post());
        // die();
        $hariIni = date('Y-m-d');
        $tanggal = $this->input->post('date');
        if ($tanggal < $hariIni) {
            $this->session->set_flashdata('message', '<div class="alert alert-dark swalDefaultSuccess" role="alert"> Mohon masukan tanggal yang sesuai </div>');
            redirect('home');
        } else {
            $pasien = [
                'nama_pasien' => $this->input->post('name'),
                'alamat_pasien' => $this->input->post('address'),
                'status_bpjs' => $this->input->post('bpjs'),
            ];
            $this->db->insert('pasien', $pasien);
            $nama_pasien = $this->input->post('name');
            $ambil_pasien = $this->model->get_rowdata('pasien', 'nama_pasien', $nama_pasien);
            $cek_antrian = $this->model->get_rowdataTigaKondisi('berobat', 'tanggal_berobat', 'status', 'id_poli', $tanggal, 'Proses', $this->input->post('poli'));
            // var_dump($cek_antrian);
            // die();
            if ($cek_antrian == null) {
                $berobat = [
                    'id_pasien' => $ambil_pasien['id_pasien'],
                    'id_poli' => $this->input->post('poli'),
                    'no_berobat' => $this->input->post('no_berobat'),
                    'tanggal_berobat' => $this->input->post('date'),
                    'antrian' => 1,
                    'keluhan' => $this->input->post('message'),
                    'status' => 'Proses',
                ];
                $this->db->insert('berobat', $berobat);
            } else {
                $berobat = [
                    'id_pasien' => $ambil_pasien['id_pasien'],
                    'id_poli' => $this->input->post('poli'),
                    'no_berobat' => $this->input->post('no_berobat'),
                    'tanggal_berobat' => $this->input->post('date'),
                    'antrian' => (int)$cek_antrian['antrian'] + 1,
                    'keluhan' => $this->input->post('message'),
                    'status' => 'Proses',
                ];
                $this->db->insert('berobat', $berobat);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-dark swalDefaultSuccess" role="alert"> Pendaftaran berhasil dilakukan, silahkan lihat nomor antrian! </div>');
            redirect('home');
        }
    }
    public function cari()
    {
        $data['title'] = 'SiKlinik ';
        $this->load->model('Eksekusi_model', 'model');

        $data['poli'] = $this->model->get_data('poliklinik');
        $keyword = $this->input->post('keyword');
        $data['cari'] = $this->model->ambil_data($keyword);
        $data['dokter'] = $this->model->data_dokter();
        $data['info'] = $this->model->get_data('info');
        // var_dump($data['cari']);
        // die();

        $this->load->view('landing-page/header', $data);
        $this->load->view('landing-page/body', $data);
        $this->load->view('landing-page/footer');
    }
    public function ubah_jadwal($id)
    {
        $data['title'] = 'SiKlinik ';
        $this->load->model('Eksekusi_model', 'model');

        $data['poli'] = $this->model->get_data('poliklinik');
        $data['berobat'] = $this->model->berobatSatuKondisi($id);
        // var_dump($data['berobat']);
        // die();
        // $keyword = $this->input->post('keyword');
        // $data['cari'] = $this->model->ambil_data($keyword);
        // var_dump($data['cari']);
        // die();

        $this->load->view('landing-page/header', $data);
        $this->load->view('landing-page/body_ubah', $data);
        $this->load->view('landing-page/footer');
    }
    public function update($id)
    {
        $tanggal = $this->input->post('date');
        $data['title'] = 'SiKlinik ';
        $this->load->model('Eksekusi_model', 'model');
        $cek_antrian = $this->model->get_rowdataDuaKondisi('berobat', 'tanggal_berobat', 'status', $tanggal, 'Proses');
        // var_dump($cek_antrian);
        // die();
        if ($cek_antrian == null) {
            $update = [
                'tanggal_berobat' => $this->input->post('date'),
                'antrian' => 1,
            ];
        } else {
            $update = [
                'tanggal_berobat' => $this->input->post('date'),
                'antrian' => (int)$cek_antrian['antrian'] + 1,
            ];
        }
        $this->model->update('berobat', $update, 'id_berobat', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Schedule has been updated! </div>');
        redirect('home/ubah_jadwal/' . $id);
    }
}
