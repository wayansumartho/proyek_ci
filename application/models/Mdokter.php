<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdokter extends CI_Model
{

    public function getAllDokter()
    {
        return $this->db->query('SELECT *
		 FROM  `dokter` ORDER BY id_dokter DESC');
    }
    public function getAllPelayanan()
    {
        return $this->db->query('SELECT *
		 FROM  `pelayanan` ORDER BY id_pel DESC');
    }
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }
    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    public function get_data_for_record()
    {
        $q = $this->db->query("SELECT kunjungan.kd_rm, pasien.nama_pasien, pasien.tanggal_lahir
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        ORDER BY kunjungan.kd_rm DESC");
        return $q;
    }
    public function get_data_for_inspection($kd_rm)
    {
        $q = $this->db->query("SELECT kunjungan.kd_rm, pasien.jenkel, pasien.alamat, pasien.nama_pasien, pasien.tempat_lahir, pasien.tanggal_lahir, pasien.telp
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        WHERE kunjungan.kd_rm ='$kd_rm'");
        return $q;
    }
    public function getAllTindakan()
    {
        return $this->db->query('SELECT *
		 FROM `pelayanan`');
    }
    public function getAllAturan()
    {
        $q = $this->db->query("SELECT * FROM `aturan_pakai`");
        return $q;
    }
    public function getAllObat()
    {
        $q = $this->db->query("SELECT * FROM `obat`");
        return $q;
    }
    public function getAllPemeriksaan_by_id()
    {
        $id = $this->session->userdata('id');
        $q = $this->db->query("SELECT pemeriksaan.tanggal, pemeriksaan.id_periksa, pasien.nama_pasien, pemeriksaan.keluhan, pemeriksaan.diagnosa, pemeriksaan.tindakan
        FROM pasien
        JOIN kunjungan on pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        WHERE id_dokter = '$id'");
        return $q;
    }
    public function get_data_for_resep_by_id($id)
    {
        $q = $this->db->query("SELECT pemeriksaan.id_periksa, pemeriksaan.kd_rm, pasien.nama_pasien, pasien.pengobatan
        FROM pasien
        JOIN kunjungan on pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        WHERE pemeriksaan.id_periksa = '$id'");
        return $q;
    }
    public function get_data_resep_by_id($id)
    {
        $q = $this->db->query("SELECT obat.nama_obat, aturan_pakai.nama_aturan, resep.subtotal, obat.stok, detail_resep.stok_out, detail_resep.stok_tot, detail_resep.total
        FROM resep
        JOIN detail_resep ON resep.kd_resep=detail_resep.kd_resep
        JOIN aturan_pakai ON detail_resep.id=aturan_pakai.id
        JOIN obat ON detail_resep.kd_obat=obat.kd_obat
        WHERE resep.id_periksa='$id'");
        return $q;
    }
    public function get_data_for_detail($id)
    {
        $q = $this->db->query("SELECT pemeriksaan.kd_rm, pasien.nama_pasien, pemeriksaan.id_periksa
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        WHERE pemeriksaan.id_periksa = '$id'");
        return $q;
    }
    public function get_data_detail_resep_by_id($id)
    {
        $q = $this->db->query("SELECT detail_resep.kd_resep, obat.nama_obat, aturan_pakai.nama_aturan, detail_resep.stok_out
        FROM detail_resep
        JOIN aturan_pakai ON detail_resep.id=aturan_pakai.id
        JOIN obat ON detail_resep.kd_obat=obat.kd_obat
        JOIN resep ON detail_resep.kd_resep=resep.kd_resep
        JOIN pemeriksaan ON resep.id_periksa=pemeriksaan.id_periksa
        WHERE pemeriksaan.id_periksa = '$id'");
        return $q;
    }
    public function cek_dokter($id)
    {
        $q = $this->db->query("SELECT COUNT(pemeriksaan.id_dokter) AS Dokter
        FROM pemeriksaan
        WHERE pemeriksaan.id_dokter = '$id'");
        return $q;
    }
    public function cek_pemeriksaan($id)
    {
        $q = $this->db->query("SELECT COUNT(resep.id_periksa) AS Periksa
        FROM resep
        WHERE resep.id_periksa = '$id'");
        return $q;
    }
    public function get_all_laporan_resep()
    {
        $q = $this->db->query("SELECT resep.tanggal_resep, pemeriksaan.kd_rm, resep.kd_resep, pasien.nama_pasien, pemeriksaan.keluhan, resep.subtotal
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        JOIN resep ON pemeriksaan.id_periksa=resep.id_periksa");
        return $q;
    }
}
