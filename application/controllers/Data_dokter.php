<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_dokter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mdokter');
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
    public function aktif($id)
    {
        $dataUpdate = array('aktif' => '1');
        $this->Mdokter->update('dokter', $dataUpdate, 'id_dokter', $id);
        redirect('Admin/dokter');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('aktif' => '0');
        $this->Mdokter->update('dokter', $dataUpdate, 'id_dokter', $id);
        redirect('Admin/dokter');
    }
    public function add_dokter()
    {

        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'dokter/add_dokter', $data);
    }
    public function aksi_simpan()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dataInsert = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password
        );

        $this->Mdokter->insert('dokter', $dataInsert);
        redirect('Admin/dokter');
    }
    public function edit_dokter($id)
    {
        $datawhere = array('id_dokter' => $id);
        $data['dokter'] = $this->Mdokter->get_by_id('dokter', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'dokter/edit_dokter', $data);
    }
    public function aksi_update()
    {
        $id_dokter = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $dataUpdate = array(
            'nama' => $nama,
            'username' => $username
        );

        $this->Mdokter->update('dokter', $dataUpdate, 'id_dokter', $id_dokter);
        redirect('Admin/dokter');
    }
    public function delete($id)
    {
        $cek = $this->Mdokter->cek_dokter($id)->row_object();
        if ($cek->Dokter > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/dokter');
        } else {
            $this->db->where('id_dokter', $id);
            if ($this->db->delete('dokter')) {
                $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                redirect('Admin/dokter');
            } else {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/dokter');
            }
        }
    }
}
