<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapoteker extends CI_Model
{

    public function getAllApoteker()
    {
        return $this->db->query('SELECT *
		 FROM  `apoteker` ORDER BY id_apo DESC');
    }
    public function getAllObat()
    {
        $q = $this->db->query("SELECT *
		 FROM `obat` ORDER BY kd_obat DESC");
        return $q;
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
    public function get_obatMasuk_by_apo()
    {
        $id = $this->session->userdata('id');
        $q = $this->db->get_where('obat_masuk', array('id_apo' => $id));
        return $q;
    }
    public function cek_apoteker($id)
    {
        $q = $this->db->query("SELECT COUNT(obat_masuk.id_apo) AS Apo
        FROM obat_masuk
        WHERE obat_masuk.id_apo = '$id'");
        return $q;
    }
    public function cek_obat1($id)
    {
        $q = $this->db->query("SELECT COUNT(detail_resep.kd_obat) AS Obat1
        FROM detail_resep
        JOIN obat ON detail_resep.kd_obat=obat.kd_obat
        WHERE obat.kd_obat = '$id'");
        return $q;
    }
    public function cek_obat2($id)
    {
        $q = $this->db->query("SELECT COUNT(detail_masuk.kd_obat) AS Obat2
        FROM detail_masuk
        JOIN obat ON detail_masuk.kd_obat=obat.kd_obat
        WHERE obat.kd_obat = '$id'");
        return $q;
    }
    public function cek_obat_masuk($id)
    {
        $q = $this->db->query("SELECT COUNT(detail_masuk.kd_masuk) As Masuk
        FROM detail_masuk
        WHERE detail_masuk.kd_masuk = '$id'");
        return $q;
    }
    public function get_all_laporan_obat_masuk()
    {
        $q = $this->db->query("SELECT *
        FROM obat_masuk
        JOIN apoteker ON obat_masuk.id_apo=apoteker.id_apo");
        return $q;
    }
}
