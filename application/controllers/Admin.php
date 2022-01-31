<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mpasien');
        $this->load->model('Madmin');
        $this->load->model('Mdokter');
        $this->load->model('Mapoteker');
        $this->load->model('Mkasir');
        $this->load->model('Mlaporan');
        $this->load->model('Mid');
        $this->cek_login();
    }
    private function cek_login()
    {
        if (empty($this->session->userdata('status') == 'Admin')) {
            $this->session->set_flashdata('pesan2', 'Anda Bukan Admin !!');
            redirect('Auth');
        }
    }
    public function pasien()
    {
        $data['pasien'] = $this->Mpasien->getAllPasien()->result();
        $kodeunik = $this->Mid->buat_kode();
        $cek = $this->db->query("SELECT tanggal_lahir FROM pasien where id_pasien = '$kodeunik'")->row_array();
        $awal = strtotime($cek);
        $ayena = time();
        $data['umur'] = timespan($awal, $ayena, 1);
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'admin/data_pasien', $data);
    }
    public function kunjungan()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['kunjungan'] = $this->Madmin->get_kunjungan_by_admin()->result();
        $this->template->load('layout/layout_admin', 'admin/data_kunjungan', $data);
    }
    public function data_admin()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['admin'] = $this->Madmin->getAllAdmin()->result();
        $this->template->load('layout/layout_admin', 'admin/data_admin', $data);
    }
    public function dokter()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['dokter'] = $this->Mdokter->getAllDokter()->result();
        $this->template->load('layout/layout_admin', 'admin/data_dokter', $data);
    }
    public function apoteker()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['apoteker'] = $this->Mapoteker->getAllApoteker()->result();
        $this->template->load('layout/layout_admin', 'admin/data_apoteker', $data);
    }
    public function kasir()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['kasir'] = $this->Mkasir->getAllKasir()->result();
        $this->template->load('layout/layout_admin', 'admin/data_kasir', $data);
    }
    public function pelayanan()
    {
        $data['pelayanan'] = $this->Mdokter->getAllPelayanan()->result();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'admin/pelayanan', $data);
    }
    public function laporan_pemeriksaan()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['periksa'] = $this->Mlaporan->laporan_pemeriksaan()->result();
        $this->template->load('layout/layout_admin', 'laporan/laporan_pemeriksaan', $data);
    }
    public function laporan_pasien()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['pasien'] = $this->Mlaporan->laporan_pasien()->result();
        $this->template->load('layout/layout_admin', 'laporan/laporan_pasien', $data);
    }
    public function laporan_obat()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['obat'] = $this->Mapoteker->getAllObat()->result();
        $this->template->load('layout/layout_admin', 'laporan/laporan_obat', $data);
    }
    public function laporan_resep_obat()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['resep_obat'] = $this->Mdokter->get_all_laporan_resep()->result();
        $this->template->load('layout/layout_admin', 'laporan/laporan_resep_obat', $data);
    }
    public function laporan_pembayaran()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['pembayaran'] = $this->Mkasir->get_all_laporan_pembayaran()->result();
        $this->template->load('layout/layout_admin', 'laporan/laporan_pembayaran', $data);
    }
    public function laporan_obat_masuk()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['obat_masuk'] = $this->Mapoteker->get_all_laporan_obat_masuk()->result();
        $this->template->load('layout/layout_admin', 'laporan/laporan_obat_masuk', $data);
    }
}
