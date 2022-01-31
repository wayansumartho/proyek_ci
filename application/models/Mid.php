<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mid extends CI_Model
{
    public function buat_kode()
    {
        $this->db->select('RIGHT(pasien.id_pasien,5) as kode', FALSE);
        $this->db->order_by('id_pasien', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "PS" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kode_pasien()
    {
        $this->db->select('RIGHT(pasien.id_pasien,5) as kode', FALSE);
        $this->db->order_by('id_pasien', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "PS" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kode_RM()
    {
        $this->db->select('RIGHT(kunjungan.kd_rm,5) as kode', FALSE);
        $this->db->order_by('kd_rm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kunjungan');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "RM" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kode_periksa()
    {
        $this->db->select('RIGHT(pemeriksaan.id_periksa,5) as kode', FALSE);
        $this->db->order_by('id_periksa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pemeriksaan');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "PRS" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kode_resep()
    {
        $this->db->select('RIGHT(resep.kd_resep,5) as kode', FALSE);
        $this->db->order_by('kd_resep', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('resep');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "RSP" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kode_obat()
    {
        $this->db->select('RIGHT(obat.kd_obat,5) as kode', FALSE);
        $this->db->order_by('kd_obat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('obat');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "OB" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kodeObat_masuk()
    {
        $this->db->select('RIGHT(obat_masuk.kd_masuk,5) as kode', FALSE);
        $this->db->order_by('kd_masuk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('obat_masuk');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "TRIN" . $tgl . $kodemax;
        return $kodejadi;
    }
    public function buat_kode_bayar()
    {
        $this->db->select('RIGHT(pembayaran.kd_bayar,5) as kode', FALSE);
        $this->db->order_by('kd_bayar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pembayaran');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('y');
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); //angka 3 meunjukan jumlah digit angka 0
        $kodejadi = "TRS" . $tgl . $kodemax;
        return $kodejadi;
    }
}
