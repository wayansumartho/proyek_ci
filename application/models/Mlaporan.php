<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{
    public function laporan_pemeriksaan()
    {
        $q = $this->db->query("SELECT pemeriksaan.kd_rm, pasien.nama_pasien, pasien.pengobatan, pemeriksaan.keluhan, pemeriksaan.diagnosa, pemeriksaan.tindakan, pemeriksaan.tanggal, pemeriksaan.id_periksa
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        ORDER BY pemeriksaan.tanggal ASC");
        return $q;
    }
    public function laporan_pasien()
    {
        $q = $this->db->query("SELECT pemeriksaan.kd_rm, pasien.nama_pasien, pasien.jenkel, pasien.tempat_lahir, pasien.tanggal_lahir, pasien.alamat
        FROM pasien
        JOIN kunjungan ON pasien.id_pasien=kunjungan.id_pasien
        JOIN pemeriksaan ON kunjungan.kd_rm=pemeriksaan.kd_rm
        ORDER BY pemeriksaan.kd_rm DESC");
        return $q;
    }
}
