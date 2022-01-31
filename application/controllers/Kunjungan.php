<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mkunjungan');
        $this->load->model('Mpasien');
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
    public function add_kunjungan()
    {
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $data['kodeunik'] = $this->Mid->buat_kode_RM();
        $data['pasien'] = $this->Mpasien->getAllPasien()->result();
        $this->template->load('layout/layout_admin', 'admin/add_kunjungan', $data);
    }
    public function aksi_simpan()
    {
        $this->form_validation->set_rules('id_pasien', 'Isi No Pasien', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan2', validation_errors());
            redirect('Kunjungan/add_kunjungan');
        } else {
            $kd_rm = $this->input->post('kd_rm');
            $id_pasien = $this->input->post('id_pasien');
            $id = $this->session->userdata('id');

            $dataInsert = array(
                'kd_rm' => $kd_rm,
                'id_pasien' => $id_pasien,
                'id_admin' => $id
            );
            $this->Mkunjungan->insert('kunjungan', $dataInsert);
            $this->session->set_flashdata('pesan1', 'Data Berhasil Ditambahkan');
            redirect('Admin/kunjungan');
        }
    }

    public function delete($id)
    {
        $cek = $this->Mkunjungan->cek_kunjungan($id)->row_object();
        if ($cek->RM > 0) {
            $this->session->set_flashdata('pesan3', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/kunjungan');
        } else {
            $this->db->where('kd_rm', $id);
            if ($this->db->delete('kunjungan')) {
                $this->session->set_flashdata('pesan2', 'Berhasil Menghapus Data');
                redirect('Admin/kunjungan');
            } else {
                $this->session->set_flashdata('pesan3', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/kunjungan');
            }
        }
    }
}
