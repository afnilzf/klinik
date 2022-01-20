<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eksekusi_model extends CI_Model
{
    public function get_data($table)
    {
        $query = $this->db->get($table)->result_array();
        return $query;
    }
    public function get_rowdata($table, $id, $kondisi)
    {
        $where = "$id = '$kondisi'";
        $query = $this->db->where($where)
            ->get($table)->row_array();
        return $query;
    }
    public function get_rowdataDuaKondisi($table, $id1, $id2, $kondisi1, $kondisi2)
    {
        $where = "$id1 = '$kondisi1' AND $id2 = '$kondisi2'";
        $query = $this->db->where($where)
            ->get($table)->last_row('array');
        return $query;
    }

    public function insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }
    public function update($table, $data, $kondisi, $id)
    {
        $query = $this->db->where($kondisi, $id)->update($table, $data);
        return $query;
    }


    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        if (!empty($keyword)) {
            $this->db->like('no_berobat', $keyword);
        }
        return $this->db->get()->result_array();
    }
    public function data_berobat()
    {
        // $where = "tanggal_berobat = $date AND status = Proses AND berobat.id_poli = $poli";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->order_by('tanggal_berobat', 'asc');
        return $this->db->get()->result_array();
    }
    public function data_dokter()
    {
        // $where = "tanggal_berobat = $date AND status = Proses AND berobat.id_poli = $poli";
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->join('user', 'user.id=dokter.id_user');
        $this->db->join('poliklinik', 'poliklinik.id_poli=dokter.id_poli');
        return $this->db->get()->result_array();
    }
    public function berobatSatuKondisi($id)
    {
        $where = "id_berobat = $id ";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }
    public function data_berobatDokter($date, $poli)
    {
        $where = "tanggal_berobat = '$date' AND status = 'Proses' AND berobat.id_poli = $poli";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function pasienHariIni($date)
    {
        $where = "tanggal_berobat = '$date'";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function pasienSelesai($date)
    {
        $where = "tanggal_berobat = '$date' AND status = 'Selesai'";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function pasienPoli($date, $poli)
    {
        $where = "tanggal_berobat = '$date' AND berobat.id_poli = $poli";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function dataPasien()
    {
        // $where = "tanggal_berobat = '$date' AND berobat.id_poli = $poli";
        $query = $this->db->query("SELECT * FROM pasien WHERE id_pasien IN(SELECT MAX(id_pasien)FROM pasien GROUP BY nama_pasien)");
        // $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        // $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $result = $query->result_array();
        return $result;
    }
    public function data_berobatSatuKondisi($id)
    {
        $where = "pasien.id_pasien = '$id' ";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->first_row('array');
    }
    public function data_berobatApteker($date)
    {
        $where = "tanggal_berobat = '$date' AND status = 'Transaksi'";
        $this->db->select('*');
        $this->db->from('berobat');
        $this->db->join('pasien', 'pasien.id_pasien=berobat.id_pasien');
        $this->db->join('poliklinik', 'poliklinik.id_poli=berobat.id_poli');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function resep($id)
    {
        $where = "resep.id_berobat = '$id'";
        $this->db->select('*');
        $this->db->from('resep');
        $this->db->join('berobat', 'berobat.id_berobat=resep.id_berobat');
        $this->db->join('obat', 'obat.id_obat=resep.id_obat');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function transaksi($id)
    {
        $where = "transaksi.id_berobat = '$id'";
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('berobat', 'berobat.id_berobat=transaksi.id_berobat');
        $this->db->join('obat', 'obat.id_obat=transaksi.id_obat');
        $this->db->join('resep', 'resep.id_obat=transaksi.id_obat');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function stok_keluar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('berobat', 'berobat.id_berobat=transaksi.id_berobat');
        $this->db->join('obat', 'obat.id_obat=transaksi.id_obat');
        $this->db->join('resep', 'resep.id_obat=transaksi.id_obat');
        return $this->db->get()->result_array();
    }
    public function stok_masuk()
    {
        $this->db->select('*');
        $this->db->from('stok_masuk');
        $this->db->join('obat', 'obat.id_obat=stok_masuk.id_obat');
        return $this->db->get()->result_array();
    }
    public function transaksi_masuk()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('berobat', 'berobat.id_berobat=transaksi.id_berobat');
        $this->db->join('obat', 'obat.id_obat=transaksi.id_obat');
        $this->db->join('resep', 'resep.id_obat=transaksi.id_obat');
        $this->db->group_by('transaksi.id_berobat');
        return $this->db->get()->result_array();
    }
    public function sum_total($id)
    {
        $where = "transaksi.id_berobat = '$id'";
        $query = $this->db->select_sum('sub_total', 'hasil')
            ->from('transaksi')
            ->where($where);
        return $query->get()->row_array();
    }

    // public function resepApoteker($id)
    // {
    //     $where = "resep.id_berobat = '$id'";
    //     $this->db->select('*');
    //     $this->db->from('resep');
    //     $this->db->join('berobat', 'berobat.id_berobat=resep.id_berobat');
    //     $this->db->join('obat', 'obat.id_obat=resep.id_obat');
    //     $this->db->where($where);
    //     return $this->db->get()->first_row('array');
    // }
}
