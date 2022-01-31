<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkasir extends CI_Model
{

    public function getAllKasir()
    {
        return $this->db->query('SELECT *
		 FROM  `kasir` ORDER BY id_kasir DESC');
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
    public function cek_kasir($id)
    {
        $q = $this->db->query("SELECT COUNT(pembayaran.id_kasir) AS Kasir
        FROM pembayaran
        WHERE pembayaran.id_kasir = '$id'");
        return $q;
    }
    public function get_all_laporan_pembayaran()
    {
        $q = $this->db->query("SELECT pembayaran.tanggal_bayar, pembayaran.kd_bayar, pemeriksaan.kd_rm, pasien.nama_pasien, pemeriksaan.id_periksa, pemeriksaan.keluhan, pemeriksaan.diagnosa, pembayaran.totalbayar, kasir.nama
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        JOIN resep ON pemeriksaan.id_periksa=resep.id_periksa
        JOIN pembayaran ON pemeriksaan.id_periksa=pembayaran.id_periksa
        JOIN kasir ON pembayaran.id_kasir=kasir.id_kasir");
        return $q;
    }
    public function get_all_pembayaran()
    {
        $q = $this->db->query("SELECT *
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        JOIN pembayaran ON pemeriksaan.id_periksa=pembayaran.id_periksa
        JOIN resep ON pemeriksaan.id_periksa=resep.id_periksa
        ORDER BY resep.kd_resep DESC");
        return $q;
    }
    public function get_all_pelayanan()
    {
        $q = $this->db->query("SELECT * FROM pelayanan");
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
    public function get_data_detail_bayar_by_id($id)
    {
        $q = $this->db->query("SELECT * FROM pembayaran
        WHERE pembayaran.id_periksa = '$id'");
        return $q;
    }
}
