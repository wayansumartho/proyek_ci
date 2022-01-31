<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpasien extends CI_Model
{

    public function getAllPasien()
    {
        return $this->db->query('SELECT *
		 FROM  `pasien` ORDER BY id_pasien DESC');
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
    public function cek_pasien($id)
    {
        $q = $this->db->query("SELECT COUNT(kunjungan.id_pasien) AS Pasien
        FROM kunjungan
        WHERE kunjungan.id_pasien = '$id'");
        return $q;
    }
}
