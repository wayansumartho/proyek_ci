<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
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
    public function add_pasien()
    {
        $data['kodeunik'] = $this->Mid->buat_kode_pasien();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'pasien/add_pasien', $data);
    }
    public function aksi_simpan()
    {
        $this->form_validation->set_rules('nama', 'Isi Nama !', 'trim|required');
        $this->form_validation->set_rules('jenkel', 'Isi Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Isi Tempat Lahir!', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Isi Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Isi Alamat !', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('pengobatan', 'Isi Pengobatan', 'trim|required');
        $this->form_validation->set_rules('no_bpjs', 'Isi No BPJS !', 'trim|required|numeric');
        $this->form_validation->set_rules('telp', 'Isi No Telepon', 'trim|required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan2', validation_errors());
            redirect('Pasien/add_pasien');
        } else {
            $id_pasien = $this->input->post('id_pasien');
            $nama_pasien = $this->input->post('nama');
            $jenkel = $this->input->post('jenkel');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $pengobatan = $this->input->post('pengobatan');
            $no_bpjs = $this->input->post('no_bpjs');
            $telp = $this->input->post('telp');


            $dataInsert = array(
                'id_pasien' => $id_pasien,
                'nama_pasien' => $nama_pasien,
                'jenkel' => $jenkel,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
                'pengobatan' => $pengobatan,
                'no_bpjs' => $no_bpjs
            );
            $this->Mpasien->insert('pasien', $dataInsert);
            $this->session->set_flashdata('pesan1', 'Berhasil Menambahkan Data');
            redirect('Admin/pasien');
        }
    }

    public function edit_pasien($id)
    {
        $datawhere = array('id_pasien' => $id);
        $data['pasien'] = $this->Mpasien->get_by_id('pasien', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
        $this->template->load('layout/layout_admin', 'pasien/edit_pasien', $data);
    }
    public function aksi_update()
    {
        $this->form_validation->set_rules('nama', 'Isi Nama !', 'trim|required');
        $this->form_validation->set_rules('jenkel', 'Isi Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Isi Tempat Lahir!', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Isi Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Isi Alamat !', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('pengobatan', 'Isi Pengobatan', 'trim|required');
        $this->form_validation->set_rules('no_bpjs', 'Isi No BPJS !', 'trim|required|numeric');
        $this->form_validation->set_rules('telp', 'Isi No Telepon', 'trim|required|numeric');

        $id_pasien = $this->input->post('id_pasien');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan2', validation_errors());
            redirect('Pasien/edit_pasien/' . $id_pasien);
        } else {

            $nama_pasien = $this->input->post('nama');
            $jenkel = $this->input->post('jenkel');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $pengobatan = $this->input->post('pengobatan');
            $no_bpjs = $this->input->post('no_bpjs');
            $telp = $this->input->post('telp');


            $dataUpdate = array(
                'nama_pasien' => $nama_pasien,
                'jenkel' => $jenkel,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
                'pengobatan' => $pengobatan,
                'no_bpjs' => $no_bpjs
            );

            $this->Mpasien->update('pasien', $dataUpdate, 'id_pasien', $id_pasien);
            $this->session->set_flashdata('pesan2', 'Berhasil Update Data');
            redirect('Admin/pasien');
        }
    }
    public function delete($id)
    {
        $cek = $this->Mpasien->cek_pasien($id)->row_object();
        if ($cek->Pasien > 0) {
            $this->session->set_flashdata('pesan3', 'Gagal menghapus data (Data Terpakai)');
            redirect('Admin/pasien');
        } else {
            $this->db->where('id_pasien', $id);
            if ($this->db->delete('pasien')) {
                $this->session->set_flashdata('pesan2', 'Berhasil Menghapus Data');
                redirect('Admin/pasien');
            } else {
                $this->session->set_flashdata('pesan3', 'Gagal menghapus data (Data Terpakai)');
                redirect('Admin/pasien');
            }
        }
    }
}
