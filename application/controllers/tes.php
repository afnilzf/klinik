<?php

class Dosen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['dupak'] = $this->db->query("select * from dupak where id_dupak = 1 ")->row_array();
        $data['pengumuman'] = $this->db->query("select * from pengumuman order by tanggal_upload desc")->result_array();
        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('template/footer', $data);
    }
    public function pengumuman_list()
    {

        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['pengumuman'] = $this->db->get('pengumuman')->result_array();
        $data['title'] = 'Pengumuman';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('Dosen/pengumuman_list', $data);
        $this->load->view('template/footer', $data);
    }
    public function pengumuman_tampil($id)
    {
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['pengumuman'] = $this->db->get_where('pengumuman', ['id' => $id])->row_array();
        $data['title'] = 'Pengumuman';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('Dosen/pengumuman_tampil', $data);
        $this->load->view('template/footer', $data);
    }
    public function jafung()
    {
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['pengajuan'] = $this->Dosen_Model->getPengajuan($id_dosen);
        $data['dosen'] = $this->Dosen_Model->getJafung($id_dosen);
        $data['title'] = 'Jabatan Fungsional';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/jafung', $data);
        $this->load->view('Template/footer', $data);
    }

    public function pend()
    {
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['subunsur'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 6])->result_array();
        $data['subunsur1'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 6])->result_array();
        $data['pend'] = $this->Dosen_Model->getSyarattampilpend($id_dosen);
        $data['pend2'] = $this->Dosen_Model->getSyarattampilpend($id_dosen);
        $data['title'] = 'Pendidikan';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/pend', $data);
        $this->load->view('Template/footer', $data);
    }

    public function pendidikan()
    {
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['subunsur'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 1])->result_array();
        $data['subunsur1'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 1])->result_array();
        $data['pendidikan'] = $this->Dosen_Model->getSyarattampilpendidikan($id_dosen);
        $data['pendidikan2'] = $this->Dosen_Model->getSyarattampilpendidikan($id_dosen);
        $data['title'] = 'Penlaksanaan Pendidikan';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/pendidikan', $data);
        $this->load->view('Template/footer', $data);
    }
    public function penelitian()
    {
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['subunsur'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 2])->result_array();
        $data['subunsur1'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 2])->result_array();
        $data['penelitian'] = $this->Dosen_Model->getSyarattampilpenelitian($id_dosen);
        $data['penelitian2'] = $this->Dosen_Model->getSyarattampilpenelitian($id_dosen);
        $data['title'] = 'Pelaksanaan Penelitian';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/penelitian', $data);
        $this->load->view('Template/footer', $data);
    }
    public function pengabdian()
    {
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['subunsur'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 3])->result_array();
        $data['subunsur1'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 3])->result_array();
        $data['pengabdian'] = $this->Dosen_Model->getSyarattampilpengabdian($id_dosen);
        $data['pengabdian2'] = $this->Dosen_Model->getSyarattampilpengabdian($id_dosen);
        $data['title'] = 'Pelaksanaan pengabdian';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/pengabdian', $data);
        $this->load->view('Template/footer', $data);
    }
    public function penunjang()
    {
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['subunsur'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 4])->result_array();
        $data['subunsur1'] = $this->db->get_where('subunsur', ['id_unsurpenilaian' => 4])->result_array();
        $data['penunjang'] = $this->Dosen_Model->getSyarattampilpenunjang($id_dosen);
        $data['penunjang2'] = $this->Dosen_Model->getSyarattampilpenunjang($id_dosen);
        $data['title'] = 'Pelaksanaan penunjang';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/penunjang_lain', $data);
        $this->load->view('Template/footer', $data);
    }
    public function tambah_syarat()
    {
        $cekUnsur = $this->Dosen_Model->getSubunsur($this->input->post('id_subunsur'));
        if ($cekUnsur['id_unsurpenilaian'] == 1) {
            $this->form_validation->set_rules('id_subunsur', 'id_subunsur', 'required');
            $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');
            $this->form_validation->set_rules('satuan_hasil', 'satuan_hasil', 'required');
            $this->form_validation->set_rules('jumlah_volume', 'jumlah_volume', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/pendidikan');
            } else {
                $id_dosen = $this->input->post('id_dosen');
                $id_subunsur = $this->input->post('id_subunsur');
                $uraian_kegiatan = $this->input->post('uraian_kegiatan');
                $tahun = $this->input->post('tahun');
                $satuan_hasil = $this->input->post('satuan_hasil');
                $jumlah_volume = $this->input->post('jumlah_volume');
                $file = $_FILES['file'];

                if ($file != '') {
                    $config['upload_path'] = './assets/upload/pendidikan';
                    $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                        redirect('Dosen/pendidikan');
                    } else {
                        $file = $this->upload->data('file_name');
                    }
                }

                $data = [
                    'id_dosen' => $id_dosen,
                    'id_subunsur' => $id_subunsur,
                    'uraian' => $uraian_kegiatan,
                    'tanggal' => $tahun,
                    'satuan' => $satuan_hasil,
                    'jumlah' => $jumlah_volume,
                    'file_bukti' => $file
                ];


                $this->db->insert('syarat_pengajuan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/pendidikan');
            }
        } elseif ($cekUnsur['id_unsurpenilaian'] == 2) {
            $this->form_validation->set_rules('id_subunsur', 'id_subunsur', 'required');
            $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');
            $this->form_validation->set_rules('satuan_hasil', 'satuan_hasil', 'required');
            $this->form_validation->set_rules('jumlah_volume', 'jumlah_volume', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/penelitian');
            } else {
                $id_dosen = $this->input->post('id_dosen');
                $id_subunsur = $this->input->post('id_subunsur');
                $uraian_kegiatan = $this->input->post('uraian_kegiatan');
                $tahun = $this->input->post('tahun');
                $satuan_hasil = $this->input->post('satuan_hasil');
                $jumlah_volume = $this->input->post('jumlah_volume');
                $file = $_FILES['file'];

                if ($file != '') {
                    $config['upload_path'] = './assets/upload/penelitian';
                    $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                        redirect('Dosen/penelitian');
                    } else {
                        $file = $this->upload->data('file_name');
                    }
                }

                $data = [
                    'id_dosen' => $id_dosen,
                    'id_subunsur' => $id_subunsur,
                    'uraian' => $uraian_kegiatan,
                    'tanggal' => $tahun,
                    'satuan' => $satuan_hasil,
                    'jumlah' => $jumlah_volume,
                    'file_bukti' => $file
                ];


                $this->db->insert('syarat_pengajuan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/penelitian');
            }
        } elseif ($cekUnsur['id_unsurpenilaian'] == 3) {
            $this->form_validation->set_rules('id_subunsur', 'id_subunsur', 'required');
            $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');
            $this->form_validation->set_rules('satuan_hasil', 'satuan_hasil', 'required');
            $this->form_validation->set_rules('jumlah_volume', 'jumlah_volume', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/pengabdian');
            } else {
                $id_dosen = $this->input->post('id_dosen');
                $id_subunsur = $this->input->post('id_subunsur');
                $uraian_kegiatan = $this->input->post('uraian_kegiatan');
                $tahun = $this->input->post('tahun');
                $satuan_hasil = $this->input->post('satuan_hasil');
                $jumlah_volume = $this->input->post('jumlah_volume');
                $file = $_FILES['file'];

                if ($file != '') {
                    $config['upload_path'] = './assets/upload/pengabdian';
                    $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                        redirect('Dosen/pengabdian');
                    } else {
                        $file = $this->upload->data('file_name');
                    }
                }

                $data = [
                    'id_dosen' => $id_dosen,
                    'id_subunsur' => $id_subunsur,
                    'uraian' => $uraian_kegiatan,
                    'tanggal' => $tahun,
                    'satuan' => $satuan_hasil,
                    'jumlah' => $jumlah_volume,
                    'file_bukti' => $file
                ];


                $this->db->insert('syarat_pengajuan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/pengabdian');
            }
        } elseif ($cekUnsur['id_unsurpenilaian'] == 4) {
            $this->form_validation->set_rules('id_subunsur', 'id_subunsur', 'required');
            $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');
            $this->form_validation->set_rules('satuan_hasil', 'satuan_hasil', 'required');
            $this->form_validation->set_rules('jumlah_volume', 'jumlah_volume', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/penunjang');
            } else {
                $id_dosen = $this->input->post('id_dosen');
                $id_subunsur = $this->input->post('id_subunsur');
                $uraian_kegiatan = $this->input->post('uraian_kegiatan');
                $tahun = $this->input->post('tahun');
                $satuan_hasil = $this->input->post('satuan_hasil');
                $jumlah_volume = $this->input->post('jumlah_volume');
                $file = $_FILES['file'];

                if ($file != '') {
                    $config['upload_path'] = './assets/upload/penunjang_lain';
                    $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                        redirect('Dosen/penunjang');
                    } else {
                        $file = $this->upload->data('file_name');
                    }
                }

                $data = [
                    'id_dosen' => $id_dosen,
                    'id_subunsur' => $id_subunsur,
                    'uraian' => $uraian_kegiatan,
                    'tanggal' => $tahun,
                    'satuan' => $satuan_hasil,
                    'jumlah' => $jumlah_volume,
                    'file_bukti' => $file
                ];


                $this->db->insert('syarat_pengajuan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/penunjang');
            }
        } elseif ($cekUnsur['id_unsurpenilaian'] == 6) {
            $this->form_validation->set_rules('id_subunsur', 'id_subunsur', 'required');
            $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');
            $this->form_validation->set_rules('satuan_hasil', 'satuan_hasil', 'required');
            $this->form_validation->set_rules('jumlah_volume', 'jumlah_volume', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/pend');
            } else {
                $id_dosen = $this->input->post('id_dosen');
                $id_subunsur = $this->input->post('id_subunsur');
                $uraian_kegiatan = $this->input->post('uraian_kegiatan');
                $tahun = $this->input->post('tahun');
                $satuan_hasil = $this->input->post('satuan_hasil');
                $jumlah_volume = $this->input->post('jumlah_volume');
                $file = $_FILES['file'];

                if ($file != '') {
                    $config['upload_path'] = './assets/upload/pend';
                    $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                        redirect('Dosen/pengabdian');
                    } else {
                        $file = $this->upload->data('file_name');
                    }
                }

                $data = [
                    'id_dosen' => $id_dosen,
                    'id_subunsur' => $id_subunsur,
                    'uraian' => $uraian_kegiatan,
                    'tanggal' => $tahun,
                    'satuan' => $satuan_hasil,
                    'jumlah' => $jumlah_volume,
                    'file_bukti' => $file
                ];


                $this->db->insert('syarat_pengajuan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil ditambahkan!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/pend');
            }
        }
    }
    public function edit_syarat()
    {
        $cekUnsur = $this->Dosen_Model->getSubunsur($this->input->post('id_subunsur'));
        if ($cekUnsur['id_unsurpenilaian'] == 1) {
            $id_syaratpengajuan = $this->input->post('id');
            $id_subunsur = $this->input->post('id_subunsur');
            $uraian_kegiatan = $this->input->post('uraian_kegiatan');
            $tahun = $this->input->post('tahun');
            $satuan_hasil = $this->input->post('satuan_hasil');
            $jumlah_volume = $this->input->post('jumlah_volume');
            $file = $_FILES['file']['name'];

            $data = $this->db->get_where('syarat_pengajuan', ['id_syaratpengajuan' => $id_syaratpengajuan])->row_array();

            if ($file) {
                $config['upload_path'] = './assets/upload/pendidikan';
                $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                    redirect('Dosen/pendidikan');
                } else {
                    $file_lama = $data['file_bukti'];

                    if (file_exists("assets/upload/pendidikan/" . $file_lama)) {
                        unlink("assets/upload/pendidikan/" . $file_lama);
                    }

                    $file = $this->upload->data('file_name');
                    $this->db->set('file_bukti', $file);
                }
            }

            $data = [
                'id_subunsur' => $id_subunsur,
                'uraian' => $uraian_kegiatan,
                'tanggal' => $tahun,
                'satuan' => $satuan_hasil,
                'jumlah' => $jumlah_volume,
            ];

            $this->db->set($data);
            $this->db->where('id_syaratpengajuan', $id_syaratpengajuan);
            $this->db->update('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/pendidikan');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 2) {
            $id_syaratpengajuan = $this->input->post('id');
            $id_subunsur = $this->input->post('id_subunsur');
            $uraian_kegiatan = $this->input->post('uraian_kegiatan');
            $tahun = $this->input->post('tahun');
            $satuan_hasil = $this->input->post('satuan_hasil');
            $jumlah_volume = $this->input->post('jumlah_volume');
            $file = $_FILES['file']['name'];

            $data = $this->db->get_where('syarat_pengajuan', ['id_syaratpengajuan' => $id_syaratpengajuan])->row_array();

            if ($file) {
                $config['upload_path'] = './assets/upload/penelitian';
                $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                    redirect('Dosen/penelitian');
                } else {
                    $file_lama = $data['file_bukti'];

                    if (file_exists("assets/upload/penelitian/" . $file_lama)) {
                        unlink("assets/upload/penelitian/" . $file_lama);
                    }

                    $file = $this->upload->data('file_name');
                    $this->db->set('file_bukti', $file);
                }
            }

            $data = [
                'id_subunsur' => $id_subunsur,
                'uraian' => $uraian_kegiatan,
                'tanggal' => $tahun,
                'satuan' => $satuan_hasil,
                'jumlah' => $jumlah_volume,
            ];

            $this->db->set($data);
            $this->db->where('id_syaratpengajuan', $id_syaratpengajuan);
            $this->db->update('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/penelitian');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 3) {
            $id_syaratpengajuan = $this->input->post('id');
            $id_subunsur = $this->input->post('id_subunsur');
            $uraian_kegiatan = $this->input->post('uraian_kegiatan');
            $tahun = $this->input->post('tahun');
            $satuan_hasil = $this->input->post('satuan_hasil');
            $jumlah_volume = $this->input->post('jumlah_volume');
            $file = $_FILES['file']['name'];

            $data = $this->db->get_where('syarat_pengajuan', ['id_syaratpengajuan' => $id_syaratpengajuan])->row_array();

            if ($file) {
                $config['upload_path'] = './assets/upload/pengabdian';
                $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                    redirect('Dosen/pengabdian');
                } else {
                    $file_lama = $data['file_bukti'];

                    if (file_exists("assets/upload/pengabdian/" . $file_lama)) {
                        unlink("assets/upload/pengabdian/" . $file_lama);
                    }

                    $file = $this->upload->data('file_name');
                    $this->db->set('file_bukti', $file);
                }
            }

            $data = [
                'id_subunsur' => $id_subunsur,
                'uraian' => $uraian_kegiatan,
                'tanggal' => $tahun,
                'satuan' => $satuan_hasil,
                'jumlah' => $jumlah_volume,
            ];

            $this->db->set($data);
            $this->db->where('id_syaratpengajuan', $id_syaratpengajuan);
            $this->db->update('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/pengabdian');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 4) {
            $id_syaratpengajuan = $this->input->post('id');
            $id_subunsur = $this->input->post('id_subunsur');
            $uraian_kegiatan = $this->input->post('uraian_kegiatan');
            $tahun = $this->input->post('tahun');
            $satuan_hasil = $this->input->post('satuan_hasil');
            $jumlah_volume = $this->input->post('jumlah_volume');
            $file = $_FILES['file']['name'];

            $data = $this->db->get_where('syarat_pengajuan', ['id_syaratpengajuan' => $id_syaratpengajuan])->row_array();

            if ($file) {
                $config['upload_path'] = './assets/upload/penunjang_lain';
                $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                    redirect('Dosen/penunjang');
                } else {
                    $file_lama = $data['file_bukti'];

                    if (file_exists("assets/upload/penunjang_lain/" . $file_lama)) {
                        unlink("assets/upload/penunjang_lain/" . $file_lama);
                    }

                    $file = $this->upload->data('file_name');
                    $this->db->set('file_bukti', $file);
                }
            }

            $data = [
                'id_subunsur' => $id_subunsur,
                'uraian' => $uraian_kegiatan,
                'tanggal' => $tahun,
                'satuan' => $satuan_hasil,
                'jumlah' => $jumlah_volume,
            ];

            $this->db->set($data);
            $this->db->where('id_syaratpengajuan', $id_syaratpengajuan);
            $this->db->update('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/penunjang');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 6) {
            $id_syaratpengajuan = $this->input->post('id');
            $id_subunsur = $this->input->post('id_subunsur');
            $uraian_kegiatan = $this->input->post('uraian_kegiatan');
            $tahun = $this->input->post('tahun');
            $satuan_hasil = $this->input->post('satuan_hasil');
            $jumlah_volume = $this->input->post('jumlah_volume');
            $file = $_FILES['file']['name'];

            $data = $this->db->get_where('syarat_pengajuan', ['id_syaratpengajuan' => $id_syaratpengajuan])->row_array();

            if ($file) {
                $config['upload_path'] = './assets/upload/pend';
                $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                    redirect('Dosen/pend');
                } else {
                    $file_lama = $data['file_bukti'];

                    if (file_exists("assets/upload/pend/" . $file_lama)) {
                        unlink("assets/upload/pend/" . $file_lama);
                    }

                    $file = $this->upload->data('file_name');
                    $this->db->set('file_bukti', $file);
                }
            }

            $data = [
                'id_subunsur' => $id_subunsur,
                'uraian' => $uraian_kegiatan,
                'tanggal' => $tahun,
                'satuan' => $satuan_hasil,
                'jumlah' => $jumlah_volume,
            ];

            $this->db->set($data);
            $this->db->where('id_syaratpengajuan', $id_syaratpengajuan);
            $this->db->update('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/pend');
        }
    }
    public function hapus_syarat($id)
    {
        $cekSubUnsur = $this->Dosen_Model->getSyarat($id);
        $cekUnsur = $this->Dosen_Model->getSubunsur($cekSubUnsur['id_subunsur']);
        if ($cekUnsur['id_unsurpenilaian'] == 1) {
            $this->db->where('id_syaratpengajuan', $id);
            $this->db->delete('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil dihapus !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/pendidikan');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 2) {
            $this->db->where('id_syaratpengajuan', $id);
            $this->db->delete('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil dihapus !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/penelitian');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 3) {
            $this->db->where('id_syaratpengajuan', $id);
            $this->db->delete('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil dihapus !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/pengabdian');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 4) {
            $this->db->where('id_syaratpengajuan', $id);
            $this->db->delete('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil dihapus !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/penunjang');
        } elseif ($cekUnsur['id_unsurpenilaian'] == 4) {
            $this->db->where('id_syaratpengajuan', $id);
            $this->db->delete('syarat_pengajuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil dihapus !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
            redirect('Dosen/penunjang');
        }
    }
    public function pengajuan()
    {
        $data['ak'] = $this->input->post('ak');
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['pend'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pend1'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pendidikan'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['pendidikan1'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['penelitian'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['penelitian1'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['pengabdian'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['pengabdian1'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['penunjang_lain'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        $data['penunjang_lain1'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        $data['dosen'] = $this->db->query("select * from dosen where id = $id_dosen ")->row_array();

        $data['title'] = 'Pengajuan Jabatan Fungsional';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/pengajuan', $data);
        $this->load->view('Template/footer', $data);
    }

    public function update_ak()
    {
        $id_dosen = $this->session->userdata('id');
        $id_jafung = $this->session->userdata('id_jafung');
        $ambil = $this->input->post();
        $ak = $this->input->post('ak_jafung');
        // var_dump($id_jafung);
        // die();

        $hitungppend = count($this->Dosen_Model->getSyaratpendidikan($id_dosen));
        $hitungpen = count($this->Dosen_Model->getSyaratpenelitian($id_dosen));
        $hitungpengab = count($this->Dosen_Model->getSyaratpengabdian($id_dosen));
        $hitungpenunjang = count($this->Dosen_Model->getSyaratpenunjang($id_dosen));
        $jumlah = $hitungppend + $hitungpen + $hitungpengab + $hitungpenunjang;
        // var_dump($jumlah);
        // die();
        //Kondisi Id  Jafung

        if ($id_jafung == 5) {
            if ($jumlah >= 10 && $ambil['pend'] >= 150 && $ambil['pendidikan'] >= 5.5 && $ambil['penelitian'] >= 2.5 && $ambil['pengabdian'] >= 1  && $ambil['total'] >= 150) {

                //Pendidikan
                $pend = $this->Dosen_Model->getSyaratpend($id_dosen);
                $i = 1;
                foreach ($pend as $pend) {
                    $ajr = [
                        'ak_diajukan' => $this->input->post('pend' . $i),
                    ];

                    $this->db->set($ajr);
                    $this->db->where('id_syaratpengajuan', $this->input->post('pend' . $i));
                    $this->db->update('syarat_pengajuan');
                    $i++;
                }
                // Pelak. Pendidikan
                $pendidikan = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
                $i = 1;
                foreach ($pendidikan as $pendidikan) {
                    $ajr = [
                        'ak_diajukan' => $this->input->post('ppend' . $i),
                    ];

                    $this->db->set($ajr);
                    $this->db->where('id_syaratpengajuan', $this->input->post('pendidikan' . $i));
                    $this->db->update('syarat_pengajuan');
                    $i++;
                }
                // Pelak. Penelitian
                $penelitian = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
                $j = 1;
                foreach ($penelitian as $penelitian) {
                    $pen = [
                        'ak_diajukan' => $this->input->post('pen' . $j),
                    ];
                    $this->db->set($pen);
                    $this->db->where('id_syaratpengajuan', $this->input->post('penelitian' . $j));
                    $this->db->update('syarat_pengajuan');
                    $j++;
                }
                // Pelak. Pengabdian
                $pengabdian = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
                $k = 1;
                foreach ($pengabdian as $pengabdian) {
                    $peng = [
                        'ak_diajukan' => $this->input->post('peng' . $k),
                    ];
                    $this->db->set($peng);
                    $this->db->where('id_syaratpengajuan', $this->input->post('pengabdian' . $k));
                    $this->db->update('syarat_pengajuan');
                    $k++;
                }
                // Pelak. Penunjang
                $penunjang = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
                $l = 1;
                foreach ($penunjang as $penunjang) {
                    $tunj = [
                        'ak_diajukan' => $this->input->post('tunj' . $l),
                    ];
                    $this->db->set($tunj);
                    $this->db->where('id_syaratpengajuan', $this->input->post('penunjang' . $l));
                    $this->db->update('syarat_pengajuan');
                    $l++;
                }

                /////////////////////MASIHHHHHHHHHHHHHHHHH  SALAHHHHHHHHHHHHHHHHH!!!!!!!!!!!!!!!!!!!!!!!

                $data = [
                    'jafung_tujuan' => 'Asisten Ahli',
                    'ak_pend' => $this->input->post('pend'),
                    'ak_pendidikan' => $this->input->post('pendidikan'),
                    'ak_penelitian' => $this->input->post('penelitian'),
                    'ak_pengabdian' => $this->input->post('pengabdian'),
                    'ak_penunjang' =>  $this->input->post('penunjang'),
                    'id_dosen' => $id_dosen,
                    'status' => 'Kepala Jurusan',
                    'total_akdiajukan' =>  $this->input->post('total'),
                ];


                $this->db->insert('pengajuan', $data);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nilai Anda Tidak  Mencukupi (Perhatikan Ketentuan Angka Kredit)<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Dosen/jafung');
            }
        } elseif ($id_jafung == 1) {
            if ($ak == 200) {
                if ($ambil['pendidikan'] >= 22.5 && $ambil['penelitian'] >= 17.5 && $ambil['pengabdian'] >= 0.1 && $ambil['penunjang'] >= 0.1 && $ambil['totalkon'] >= 40) {
                    // Pelak. Pendidikan
                    $pendidikan = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
                    $i = 1;
                    foreach ($pendidikan as $pendidikan) {
                        $ajr = [
                            'ak_diajukan' => $this->input->post('ppend' . $i),
                        ];

                        $this->db->set($ajr);
                        $this->db->where('id_syaratpengajuan', $this->input->post('pendidikan' . $i));
                        $this->db->update('syarat_pengajuan');
                        $i++;
                    }
                    // Pelak. Penelitian
                    $penelitian = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
                    $j = 1;
                    foreach ($penelitian as $penelitian) {
                        $pen = [
                            'ak_diajukan' => $this->input->post('pen' . $j),
                        ];
                        $this->db->set($pen);
                        $this->db->where('id_syaratpengajuan', $this->input->post('penelitian' . $j));
                        $this->db->update('syarat_pengajuan');
                        $j++;
                    }
                    // Pelak. Pengabdian
                    $pengabdian = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
                    $k = 1;
                    foreach ($pengabdian as $pengabdian) {
                        $peng = [
                            'ak_diajukan' => $this->input->post('peng' . $k),
                        ];
                        $this->db->set($peng);
                        $this->db->where('id_syaratpengajuan', $this->input->post('pengabdian' . $k));
                        $this->db->update('syarat_pengajuan');
                        $k++;
                    }
                    // Pelak. Penunjang
                    $penunjang = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
                    $l = 1;
                    foreach ($penunjang as $penunjang) {
                        $tunj = [
                            'ak_diajukan' => $this->input->post('tunj' . $l),
                        ];
                        $this->db->set($tunj);
                        $this->db->where('id_syaratpengajuan', $this->input->post('penunjang' . $l));
                        $this->db->update('syarat_pengajuan');
                        $l++;
                    }


                    $data = [

                        'jafung_tujuan' => 'Lektor (200)',
                        'ak_pendidikan' => $this->input->post('pendidikan'),
                        'ak_penelitian' => $this->input->post('penelitian'),
                        'ak_pengabdian' =>  $this->input->post('pengabdian'),
                        'ak_penunjang' =>  $this->input->post('penunjang'),
                        'id_dosen' => $id_dosen,
                        'status' => 'Kepala Jurusan',
                        'total_akdiajukan' =>  $this->input->post('total'),
                    ];


                    $this->db->insert('pengajuan', $data);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nilai Anda Tidak  Mencukupi (Perhatikan Ketentuan Angka Kredit)<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Dosen/jafung');
                }
            } elseif ($ak == 300) {
                if ($ambil['pendidikan'] >= 67.5 && $ambil['penelitian'] >= 52.5 && $ambil['pengabdian'] >= 0.1 && $ambil['penunjang'] >= 0.1 && $ambil['totalkon'] >= 120) {
                    // Pelak. Pendidikan
                    $pendidikan = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
                    $i = 1;
                    foreach ($pendidikan as $pendidikan) {
                        $ajr = [
                            'ak_diajukan' => $this->input->post('ppend' . $i),
                        ];

                        $this->db->set($ajr);
                        $this->db->where('id_syaratpengajuan', $this->input->post('pendidikan' . $i));
                        $this->db->update('syarat_pengajuan');
                        $i++;
                    }
                    // Pelak. Penelitian
                    $penelitian = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
                    $j = 1;
                    foreach ($penelitian as $penelitian) {
                        $pen = [
                            'ak_diajukan' => $this->input->post('pen' . $j),
                        ];
                        $this->db->set($pen);
                        $this->db->where('id_syaratpengajuan', $this->input->post('penelitian' . $j));
                        $this->db->update('syarat_pengajuan');
                        $j++;
                    }
                    // Pelak. Pengabdian
                    $pengabdian = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
                    $k = 1;
                    foreach ($pengabdian as $pengabdian) {
                        $peng = [
                            'ak_diajukan' => $this->input->post('peng' . $k),
                        ];
                        $this->db->set($peng);
                        $this->db->where('id_syaratpengajuan', $this->input->post('pengabdian' . $k));
                        $this->db->update('syarat_pengajuan');
                        $k++;
                    }
                    // Pelak. Penunjang
                    $penunjang = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
                    $l = 1;
                    foreach ($penunjang as $penunjang) {
                        $tunj = [
                            'ak_diajukan' => $this->input->post('tunj' . $l),
                        ];
                        $this->db->set($tunj);
                        $this->db->where('id_syaratpengajuan', $this->input->post('penunjang' . $l));
                        $this->db->update('syarat_pengajuan');
                        $l++;
                    }


                    $data = [

                        'jafung_tujuan' => 'Lektor (300)',
                        'ak_pendidikan' => $this->input->post('pendidikan'),
                        'ak_penelitian' => $this->input->post('penelitian'),
                        'ak_pengabdian' =>  $this->input->post('pengabdian'),
                        'ak_penunjang' =>  $this->input->post('penunjang'),
                        'id_dosen' => $id_dosen,
                        'status' => 'Kepala Jurusan',
                        'total_akdiajukan' =>  $this->input->post('total'),
                    ];


                    $this->db->insert('pengajuan', $data);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nilai Anda Tidak  Mencukupi (Perhatikan Ketentuan Angka Kredit)<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Dosen/jafung');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda tidak dapat melakukan pengajuan jabtan fungsional!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Dosen/jafung');
            }
        }


        redirect('Dosen/jafung');
    }

    public function data_pribadi($id)
    {
        $nidn = $this->session->userdata('nidn');
        $data2['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['jurusan'] = $this->db->get('jurusan')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['agama'] = $this->db->get('agama')->result_array();
        $data['jafung'] = $this->db->get('jafung')->result_array();
        $data['dosen'] = $this->Dosen_Model->getData($id);
        $data['dosen2'] = $this->Dosen_Model->getDataedit($id);
        // var_dump($data['dosen']);
        // die();
        $data['title'] = 'Data Pribadi';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data2);
        $this->load->view('Dosen/data_pribadi', $data);
        $this->load->view('Template/footer', $data);
    }
    public function dosen_detail_edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nidn = $this->input->post('nidn');
        $email = $this->input->post('email');
        $tmp_lahir = $this->input->post('tmp_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $id_jurusan = $this->input->post('id_jurusan');
        $id_prodi = $this->input->post('id_prodi');
        $id_jafung = $this->input->post('id_jafung');
        $id_agama = $this->input->post('id_agama');
        $tahun = $this->input->post('tahun');
        $nohp = $this->input->post('nohp');;
        $alamat = $this->input->post('alamat');
        $file = $_FILES['file']['name'];

        $data = $this->db->get_where('dosen', ['id' => $id])->row_array();

        if ($file) {
            $config['upload_path'] = './assets/upload/dosenimg';
            $config['allowed_types'] = 'png|jpg|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data gagal diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
                redirect('Dosen/data_pribadi');
            } else {
                $file_lama = $data['foto'];

                $file = $this->upload->data('file_name');
                $this->db->set('foto', $file);
            }
        }

        $data = [

            'nama' => $nama,
            'nidn' => $nidn,
            'email' => $email,
            'tempat_lahir' => $tmp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'id_jurusan' => $id_jurusan,
            'id_prodi' => $id_prodi,
            'id_jafung' => $id_jafung,
            'id_agama' => $id_agama,
            'tahun_masuk' => $tahun,
            'nohp' => $nohp,
            'alamat' => $alamat,
        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('dosen');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data berhasil diubah!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
        redirect('Dosen/data_pribadi/' . $id);
    }
    public function ubah_password()
    {

        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['title'] = 'Ubah Password';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Dosen/ubah_password', $data);
        $this->load->view('Template/footer', $data);
    }

    public function pengajuan_kajur()
    {
        $id_jurusan = $this->session->userdata('id_jurusan');

        $data['pengajuan'] = $this->Dosen_Model->getKajur($id_jurusan);
        $data['pengajuan2'] = $this->Dosen_Model->getKajur($id_jurusan);
        $id_dosen = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $data['title'] = 'Pengajuan Jabatan Fungsional';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('kajur/pengajuan_kajur', $data);
        $this->load->view('Template/footer', $data);
    }
    public function detail_pengajuan($id_dosen)
    {
        $id_jurusan = $this->session->userdata('id_jurusan');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['data'] = $this->Dosen_Model->getPengajuan($id_dosen);
        $data['dosen'] = $this->Dosen_Model->getJafung($id_dosen);
        $data['pengajuan'] = $this->Dosen_Model->getKajur($id_jurusan);
        $data['pend'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pend1'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pendidikan'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['pendidikan1'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['penelitian'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['penelitian1'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['pengabdian'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['pengabdian1'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['penunjang_lain'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        $data['penunjang_lain1'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        $data['title'] = 'Pengajuan Jabatan Fungsional';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('kajur/detail_pengajuan', $data);
        $this->load->view('Template/footer', $data);
    }
    public function verifikasi_kajur($id_dosen)
    {
        $data = [

            'id_dosen' => $id_dosen,
            'status' => 'Pilih Reviewer'
        ];
        $this->db->set($data);
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('pengajuan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Verifikasi berhasil !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
        redirect('Dosen/pengajuan_kajur');
    }
    public function pengajuan_reviewer()
    {
        $id_reviewer = $this->session->userdata('id');

        $data['pengajuan'] = $this->Dosen_Model->getReviewer($id_reviewer);
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        // var_dump($data['pengajuan']);
        // die();
        $data['title'] = 'Pengajuan Jabatan Fungsional';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('reviewer/pengajuan_reviewer', $data);
        $this->load->view('Template/footer', $data);
    }
    public function review($id_dosen)
    {
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $data['data'] = $this->Dosen_Model->getPengajuan($id_dosen);
        $data['pend'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pend1'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pendidikan'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['pendidikan1'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['penelitian'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['penelitian1'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['pengabdian'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['pengabdian1'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['penunjang_lain'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        $data['penunjang_lain1'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        // for ($i = 1; $i <= 20; $i++) {
        // 	$data['ak' . $i] = $this->db->query("select * from angka_kredit  where id_ak = $i  ")->row_array();
        // }
        // var_dump($data);
        // die();
        $data['title'] = 'Review Angka Kredit';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('reviewer/review', $data);
        $this->load->view('template/footer', $data);
    }
    public function review_ak($id_dosen)
    {
        $id_reviewer = $this->session->userdata('id');
        $id_jafung = $this->session->userdata('id_jafung');
        $pengajuan = $this->Dosen_Model->getPengajuan($id_dosen);
        $data['pend'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pend1'] = $this->Dosen_Model->getSyaratpend($id_dosen);
        $data['pendidikan'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['pendidikan1'] = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
        $data['penelitian'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['penelitian1'] = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
        $data['pengabdian'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['pengabdian1'] = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
        $data['penunjang_lain'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
        $data['penunjang_lain1'] = $this->Dosen_Model->getSyaratpenunjang($id_dosen);



        // var_dump($_POST);
        // die();
        if ($pengajuan['id_reviewer1'] == $id_reviewer) {
            // Pendidikan
            $pend = $this->Dosen_Model->getSyaratpend($id_dosen);
            $i = 1;
            foreach ($pend as $pend) {
                $ajr = [
                    'akr1' => $this->input->post('pend' . $i),
                    'komentar1' => $this->input->post('komPend' . $i),
                ];

                $this->db->set($ajr);
                $this->db->where('id_syaratpengajuan', $this->input->post('pendi' . $i));
                $this->db->update('syarat_pengajuan');
                $i++;
            }

            // Pelak. Pendidikan
            $pendidikan = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
            $i = 1;
            foreach ($pendidikan as $pendidikan) {
                $ajr = [
                    'akr1' => $this->input->post('ppend' . $i),
                    'komentar1' => $this->input->post('komPpend' . $i),
                ];

                $this->db->set($ajr);
                $this->db->where('id_syaratpengajuan', $this->input->post('pendidikan' . $i));
                $this->db->update('syarat_pengajuan');
                $i++;
            }
            // Pelak. Penelitian
            $penelitian = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
            $j = 1;
            foreach ($penelitian as $penelitian) {
                $pen = [
                    'akr1' => $this->input->post('pen' . $j),
                    'komentar1' => $this->input->post('komPen' . $j),
                ];
                $this->db->set($pen);
                $this->db->where('id_syaratpengajuan', $this->input->post('penelitian' . $j));
                $this->db->update('syarat_pengajuan');
                $j++;
            }
            // Pelak. Pengabdian
            $pengabdian = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
            $k = 1;
            foreach ($pengabdian as $pengabdian) {
                $peng = [
                    'akr1' => $this->input->post('peng' . $k),
                    'komentar1' => $this->input->post('komPeng' . $k),
                ];
                $this->db->set($peng);
                $this->db->where('id_syaratpengajuan', $this->input->post('pengabdian' . $k));
                $this->db->update('syarat_pengajuan');
                $k++;
            }
            // Pelak. Penunjang
            $penunjang = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
            $l = 1;
            foreach ($penunjang as $penunjang) {
                $tunj = [
                    'akr1' => $this->input->post('tunj' . $l),
                    'komentar1' => $this->input->post('komTunj' . $l),
                ];
                $this->db->set($tunj);
                $this->db->where('id_syaratpengajuan', $this->input->post('penunjang' . $l));
                $this->db->update('syarat_pengajuan');
                $l++;
            }

            $pend1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr1', 'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 6);
            $pendidikan1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr1', 'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 1);
            $penelitian1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr1', 'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 2);
            $pengabdian1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr1',  'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status',  $id_dosen, 3);
            $penunjang1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr1',  'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 4);


            $total_akr1 = (float)$pend1[0]['total_sum'] + (float)$pendidikan1[0]['total_sum'] + (float)$penelitian1[0]['total_sum'] + (float)$pengabdian1[0]['total_sum'] + (float)$penunjang1[0]['total_sum'];
            if (!$pengajuan['total_akr2'] == null) {
                $total_ak_disetujui = ((float)$pengajuan['total_akr2'] + $total_akr1) / 2;
            }
            $data = [
                'ak_pend1' => $pend1[0]['total_sum'],
                'ak_pendidikan1' => $pendidikan1[0]['total_sum'],
                'ak_penelitian1' => $penelitian1[0]['total_sum'],
                'ak_pengabdian1' => $pengabdian1[0]['total_sum'],
                'ak_penunjang1' => $penunjang1[0]['total_sum'],
                'total_akr1' => $total_akr1,
                'total_akdisetujui' => $total_ak_disetujui,
                'status_reviewer1' => 'selesai',
            ];
            // var_dump($data);
            // die();
            $this->db->set($data);
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('pengajuan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Proses review oleh Reviewer 1 selesai !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
        } elseif ($pengajuan['id_reviewer2'] == $id_reviewer) {
            // Pendidikan
            $pend = $this->Dosen_Model->getSyaratpend($id_dosen);
            $i = 1;
            foreach ($pend as $pend) {
                $ajr = [
                    'akr2' => $this->input->post('pend' . $i),
                    'komentar2' => $this->input->post('komPend' . $i),
                ];

                $this->db->set($ajr);
                $this->db->where('id_syaratpengajuan', $this->input->post('pendi' . $i));
                $this->db->update('syarat_pengajuan');
                $i++;
            }
            // Pelak. Pendidikan
            $pendidikan = $this->Dosen_Model->getSyaratpendidikan($id_dosen);
            $i = 1;
            foreach ($pendidikan as $pendidikan) {
                $ajr = [
                    'akr2' => $this->input->post('ppend' . $i),
                    'komentar2' => $this->input->post('komPpend' . $i),
                ];

                $this->db->set($ajr);
                $this->db->where('id_syaratpengajuan', $this->input->post('pendidikan' . $i));
                $this->db->update('syarat_pengajuan');
                $i++;
            }
            // Pelak. Penelitian
            $penelitian = $this->Dosen_Model->getSyaratpenelitian($id_dosen);
            $j = 1;
            foreach ($penelitian as $penelitian) {
                $pen = [
                    'akr2' => $this->input->post('pen' . $j),
                    'komentar2' => $this->input->post('komPen' . $j),
                ];
                $this->db->set($pen);
                $this->db->where('id_syaratpengajuan', $this->input->post('penelitian' . $j));
                $this->db->update('syarat_pengajuan');
                $j++;
            }
            // Pelak. Pengabdian
            $pengabdian = $this->Dosen_Model->getSyaratpengabdian($id_dosen);
            $k = 1;
            foreach ($pengabdian as $pengabdian) {
                $peng = [
                    'akr2' => $this->input->post('peng' . $k),
                    'komentar2' => $this->input->post('komPeng' . $k),
                ];
                $this->db->set($peng);
                $this->db->where('id_syaratpengajuan', $this->input->post('pengabdian' . $k));
                $this->db->update('syarat_pengajuan');
                $k++;
            }
            // Pelak. Penunjang
            $penunjang = $this->Dosen_Model->getSyaratpenunjang($id_dosen);
            $l = 1;
            foreach ($penunjang as $penunjang) {
                $tunj = [
                    'akr2' => $this->input->post('tunj' . $l),
                    'komentar2' => $this->input->post('komTunj' . $l),
                ];
                $this->db->set($tunj);
                $this->db->where('id_syaratpengajuan', $this->input->post('penunjang' . $l));
                $this->db->update('syarat_pengajuan');
                $l++;
            }
            $pend1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr2', 'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 6);
            $pendidikan1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr2', 'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 1);
            $penelitian1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr2', 'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 2);
            $pengabdian1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr2',  'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status',  $id_dosen, 3);
            $penunjang1 = $this->Dosen_Model->getSum('syarat_pengajuan', 'subunsur', 'akr2',  'syarat_pengajuan.id_dosen', 'subunsur.id_unsurpenilaian', 'syarat_pengajuan.status', $id_dosen, 4);


            $total_akr2 = (float)$pend1[0]['total_sum'] + (float)$pendidikan1[0]['total_sum'] + (float)$penelitian1[0]['total_sum'] + (float)$pengabdian1[0]['total_sum'] + (float)$penunjang1[0]['total_sum'];
            if (!$pengajuan['total_akr1'] == null) {
                $total_ak_disetujui = ((float)$pengajuan['total_akr1'] + $total_akr2) / 2;
            }
            $data = [
                'ak_pend2' => $pend1[0]['total_sum'],
                'ak_pendidikan2' => $pendidikan1[0]['total_sum'],
                'ak_penelitian2' => $penelitian1[0]['total_sum'],
                'ak_pengabdian2' => $pengabdian1[0]['total_sum'],
                'ak_penunjang2' => $penunjang1[0]['total_sum'],
                'total_akr2' => $total_akr2,
                'total_akdisetujui' => $total_ak_disetujui,
                'status_reviewer2' => 'selesai',
            ];
            // var_dump($data);
            // die();
            $this->db->set($data);
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('pengajuan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Proses review oleh Reviewer 2 selesai !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
        }




        redirect('Dosen/total_ak/' . $id_dosen);
    }
    public function total_ak($id_dosen)
    {

        $id_reviewer = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $data['pengajuan'] = $this->Dosen_Model->getPengajuan($id_dosen);
        $data['dosen'] = $this->Administrator_Model->getDosendetail($id_dosen);
        // var_dump($data);
        // die();
        $data['title'] = 'Rincian Total Angka Kredit';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('reviewer/total_ak', $data);
        $this->load->view('template/footer', $data);

        $pengajuan = $this->Dosen_Model->getPengajuan($id_dosen);
        if ($pengajuan['status_reviewer1'] == 'selesai' && $pengajuan['status_reviewer2'] == 'selesai') {

            $data = [

                'status' => 'Administrator',
            ];
            $this->db->set($data);
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('pengajuan');
        }
    }
    public function tunda_kajur()
    {
        // var_dump($_POST);
        // die();
        $id = $this->input->post('id');
        $komentar = $this->input->post('komentar');
        $data = [
            'komentar' => $komentar,
            'status' => 'Ditunda'
        ];
        $this->db->set($data);
        $this->db->where('id_pengajuan', $id);
        $this->db->update('pengajuan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Verifikasi berhasil !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
        redirect('Dosen/pengajuan_kajur');
    }
    public function resetpengajuan($id)
    {
        $this->db->where('id_pengajuan', $id);
        $this->db->delete('pengajuan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Proses pengajuan telah dibatalkan, silahkan melakukan pengajuan ulang!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>');
        redirect('Dosen/jafung');
    }
    public function riwayat_pengajuan()
    {

        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $data['riwayat'] =  $this->Dosen_Model->getRiwayat($this->session->userdata('id'));;

        $data['title'] = 'Riwayat Pengajuan Jabatan Fungsional';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dosen/riwayat_pengajuan', $data);
        $this->load->view('template/footer', $data);
    }
    public function detail_riwayat($id_riwayat)
    {
        $data['riwayat'] = $this->Dosen_Model->getRiwayatdetail($id_riwayat);
        $riwayat = $this->Dosen_Model->getRiwayatdetail($id_riwayat);
        $id_pengajuan = $riwayat['id_pengajuan'];
        $data['pend'] = $this->Dosen_Model->getSyaratriwayatpend($id_pengajuan);
        $data['pend1'] = $this->Dosen_Model->getSyaratriwayatpend($id_pengajuan);
        $data['pendidikan'] = $this->Dosen_Model->getSyaratriwayatpendidikan($id_pengajuan);
        $data['pendidikan1'] = $this->Dosen_Model->getSyaratriwayatpendidikan($id_pengajuan);
        $data['penelitian'] = $this->Dosen_Model->getSyaratriwayatpenelitian($id_pengajuan);
        $data['penelitian1'] = $this->Dosen_Model->getSyaratriwayatpenelitian($id_pengajuan);
        $data['pengabdian'] = $this->Dosen_Model->getSyaratriwayatpengabdian($id_pengajuan);
        $data['pengabdian1'] = $this->Dosen_Model->getSyaratriwayatpengabdian($id_pengajuan);
        $data['penunjang_lain'] = $this->Dosen_Model->getSyaratriwayatpenunjang($id_pengajuan);
        $data['penunjang_lain1'] = $this->Dosen_Model->getSyaratriwayatpenunjang($id_pengajuan);
        $riwayat = $this->db->get_where('riwayat_pengajuan', ['id_riwayatpengajuan' => $id_riwayat])->row_array();
        $id_dosen = $riwayat['id_dosen'];
        $data['dosen'] = $this->Administrator_Model->getDosendetail($id_dosen);
        $data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
        // var_dump($id_pengajuan);
        // die();
        $data['title'] = 'Detail Riwayat Pengajuan Jabatan Fungsional';
        $this->load->view('Template/header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('dosen/detail_riwayat', $data);
        $this->load->view('Template/footer', $data);
    }
}
