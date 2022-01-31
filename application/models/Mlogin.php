<?php
class Mlogin extends CI_Model
{
    public function cek_admin($u, $p)
    {
        $q = $this->db->get_where('admin', array('username' => $u, 'password' => $p));
        return $q;
    }
    public function cek_dokter($u, $p)
    {
        $q = $this->db->get_where('dokter', array('username' => $u, 'password' => $p));
        return $q;
    }
    public function cek_apoteker($u, $p)
    {
        $q = $this->db->get_where('apoteker', array('username' => $u, 'password' => $p));
        return $q;
    }
    public function cek_kasir($u, $p)
    {
        $q = $this->db->get_where('kasir', array('username' => $u, 'password' => $p));
        return $q;
    }
    public function get_all_user($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }
    public function cek_aktif_admin($u)
    {
        $q = $this->db->query("SELECT * FROM admin 
        WHERE username = '$u'");
        return $q;
    }
    public function cek_aktif_dokter($u)
    {
        $q = $this->db->query("SELECT * FROM dokter
        WHERE username = '$u'");
        return $q;
    }
    public function cek_aktif_apoteker($u)
    {
        $q = $this->db->query("SELECT * FROM apoteker
        WHERE username = '$u'");
        return $q;
    }
    public function cek_aktif_kasir($u)
    {
        $q = $this->db->query("SELECT * FROM kasir
        WHERE username = '$u'");
        return $q;
    }
}
