<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_apoteker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mapoteker');
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
        $this->Mapoteker->update('apoteker', $dataUpdate, 'id_apo', $id);
        redirect('Admin/apoteker');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('aktif' => '0');
        $this->Mapoteker->update('apoteker', $dataUpdate, 'id_apo', $id);
        redirect('Admin/apoteker');
    }
    public function add_apo()
    {

        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'apoteker/add_apoteker', $data);
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

        $this->Mapoteker->insert('apoteker', $dataInsert);
        redirect('Admin/apoteker');
    }
    public function edit_apo($id)
    {
        $datawhere = array('id_apo' => $id);
        $data['apoteker'] = $this->Mapoteker->get_by_id('apoteker', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'apoteker/edit_apoteker', $data);
    }
    public function aksi_update()
    {
        $id_apo = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $dataUpdate = array(
            'nama' => $nama,
            'username' => $username
        );

        $this->Mapoteker->update('apoteker', $dataUpdate, 'id_apo', $id_apo);
        redirect('Admin/apoteker');
    }
    public function delete($id)
    {
        $cek = $this->Mapoteker->cek_apoteker($id)->row_object();
        if ($cek->Apo > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/apoteker');
        } else {
            $this->db->where('id_apo', $id);
            if ($this->db->delete('apoteker')) {
                $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                redirect('Admin/apoteker');
            } else {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/apoteker');
            }
        }
    }
}
