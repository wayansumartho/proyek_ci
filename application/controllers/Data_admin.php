<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Madmin');
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
        $this->Madmin->update('admin', $dataUpdate, 'id_admin', $id);
        redirect('Admin/data_admin');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('aktif' => '0');
        $this->Madmin->update('admin', $dataUpdate, 'id_admin', $id);
        redirect('Admin/data_admin');
    }
    public function add_admin()
    {

        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'admin/add_admin', $data);
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

        $this->Madmin->insert('admin', $dataInsert);
        redirect('Admin/data_admin');
    }
    public function edit_admin($id)
    {
        $datawhere = array('id_admin' => $id);
        $data['admin'] = $this->Madmin->get_by_id('admin', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'admin/edit_admin', $data);
    }
    public function aksi_update()
    {
        $id_admin = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $dataUpdate = array(
            'nama' => $nama,
            'username' => $username
        );

        $this->Madmin->update('admin', $dataUpdate, 'id_admin', $id_admin);
        redirect('Admin/data_admin');
    }

    public function delete($id)
    {
        $cek = $this->Madmin->cek_admin($id)->row_object();
        if ($cek->Admin > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/data_admin');
        } else {
            $this->db->where('id_admin', $id);
            if ($this->db->delete('admin')) {
                $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                redirect('Admin/data_admin');
            } else {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/data_admin');
            }
        }
    }
}
