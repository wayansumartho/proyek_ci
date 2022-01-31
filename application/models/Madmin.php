<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{

    public function getAllAdmin()
    {
        return $this->db->query('SELECT *
		 FROM  `admin` ORDER BY id_admin DESC');
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
    public function cek_admin($id)
    {
        $q = $this->db->query("SELECT COUNT(kunjungan.id_admin) AS Admin
        FROM kunjungan
        WHERE kunjungan.id_admin = '$id'");
        return $q;
    }
    public function get_kunjungan_by_admin()
    {
        $id = $this->session->userdata('id');
        $q = $this->db->query("SELECT kunjungan.kd_rm, kunjungan.id_pasien, pasien.nama_pasien
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        WHERE kunjungan.id_admin ='$id'
        ORDER BY kunjungan.kd_rm DESC");
        return $q;
    }
}
