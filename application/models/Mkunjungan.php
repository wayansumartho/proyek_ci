<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkunjungan extends CI_Model
{
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
    public function cek_kunjungan($id)
    {
        $q = $this->db->query("SELECT COUNT(pemeriksaan.kd_rm) AS RM 
        FROM pemeriksaan 
        WHERE pemeriksaan.kd_rm = '$id'");
        return $q;
    }
}
