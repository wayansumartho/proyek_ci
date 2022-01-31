<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mpelayanan');
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

    public function add_pel()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'pelayanan/add_pel', $data);
    }
    public function aksi_simpan()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $dataInsert = array(
            'nama_pel' => $nama,
            'harga' => $harga
        );
        $this->Mpelayanan->insert('pelayanan', $dataInsert);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        redirect('Admin/pelayanan');
    }
    public function edit_pel($id)
    {
        $datawhere = array('id_pel' => $id);
        $data['pelayanan'] = $this->Mpelayanan->get_by_id('pelayanan', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'pelayanan/edit_pel', $data);
    }
    public function aksi_update()
    {
        $id_pel = $this->input->post('id_pel');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $dataUpdate = array(
            'nama_pel' => $nama,
            'harga' => $harga
        );

        $this->Mpelayanan->update('pelayanan', $dataUpdate, 'id_pel', $id_pel);
        $this->session->set_flashdata('pesan2', 'Data Berhasil Diubah');
        redirect('Admin/pelayanan');
    }

    public function delete_pel($id)
    {
        $cek = $this->Mpelayanan->cek_pel($id)->row_object();
        if ($cek->Pel > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/pelayanan');
        } else {
            $this->db->where('id_pel', $id);
            if ($this->db->delete('pelayanan')) {
                $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                redirect('Admin/pelayanan');
            } else {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/pelayanan');
            }
        }
    }
}
