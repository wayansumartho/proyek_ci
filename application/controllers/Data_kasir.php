<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kasir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mkasir');
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
        $this->Mkasir->update('kasir', $dataUpdate, 'id_kasir', $id);
        redirect('Admin/kasir');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('aktif' => '0');
        $this->Mkasir->update('kasir', $dataUpdate, 'id_kasir', $id);
        redirect('Admin/kasir');
    }
    public function add_kasir()
    {

        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'kasir/add_kasir', $data);
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

        $this->Mkasir->insert('kasir', $dataInsert);
        redirect('Admin/kasir');
    }
    public function edit_kasir($id)
    {
        $datawhere = array('id_kasir' => $id);
        $data['kasir'] = $this->Mkasir->get_by_id('kasir', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'kasir/edit_kasir', $data);
    }
    public function aksi_update()
    {
        $id_kasir = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $dataUpdate = array(
            'nama' => $nama,
            'username' => $username
        );

        $this->Mkasir->update('kasir', $dataUpdate, 'id_kasir', $id_kasir);
        redirect('Admin/kasir');
    }
    public function delete($id)
    {
        $cek = $this->Mkasir->cek_kasir($id)->row_object();
        if ($cek->Kasir > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/kasir');
        } else {
            $this->db->where('id_kasir', $id);
            if ($this->db->delete('kasir')) {
                $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                redirect('Admin/kasir');
            } else {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/kasir');
            }
        }
    }
}
