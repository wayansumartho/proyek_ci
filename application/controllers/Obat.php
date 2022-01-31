<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
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
        if (empty($this->session->userdata('status') == 'Apoteker')) {
            $this->session->set_flashdata('pesan2', 'Anda Bukan Apoteker !!');
            redirect('Auth');
        }
    }
    public function obat()
    {
        $data['user'] = $this->Mlogin->get_all_user('apoteker')->row_object();
        $data['obat'] = $this->Mapoteker->getAllObat()->result();
        $this->template->load('layout/layout_apoteker', 'apoteker/data_obat', $data);
    }
    public function obat_masuk()
    {
        $data['user'] = $this->Mlogin->get_all_user('apoteker')->row_object();
        $data['obat'] = $this->Mapoteker->get_obatMasuk_by_apo()->result();
        $this->template->load('layout/layout_apoteker', 'apoteker/obat_masuk', $data);
    }
    public function add_obat()
    {
        $data['user'] = $this->Mlogin->get_all_user('apoteker')->row_object();
        $data['kode_obat'] = $this->Mid->buat_kode_obat();
        $this->template->load('layout/layout_apoteker', 'apoteker/add_obat', $data);
    }
    public function aksi_simpan()
    {
        $kd = $this->input->post('kd_obat');
        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');

        $dataInsert = array(
            'kd_obat' => $kd,
            'nama_obat' => $nama,
            'stok' => $stok,
            'harga' => $harga
        );

        $this->Mapoteker->insert('obat', $dataInsert);
        redirect('Obat/obat');
    }
    public function edit_obat($id)
    {
        $datawhere = array('kd_obat' => $id);
        $data['obat'] = $this->Mapoteker->get_by_id('obat', $datawhere)->row_object();
        $data['user'] = $this->Mlogin->get_all_user('apoteker')->row_object();
        $this->template->load('layout/layout_apoteker', 'apoteker/edit_obat', $data);
    }
    public function aksi_update()
    {
        $kd_obat = $this->input->post('id');
        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');

        $dataUpdate = array(
            'nama_obat' => $nama,
            'stok' => $stok,
            'harga' => $harga
        );

        $this->Mapoteker->update('obat', $dataUpdate, 'kd_obat', $kd_obat);
        redirect('Obat/obat');
    }
    public function delete($id)
    {
        $cek1 = $this->Mapoteker->cek_obat1($id)->row_object();
        $cek2 = $this->Mapoteker->cek_obat2($id)->row_object();
        if ($cek1->Obat1 > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Obat/obat');
        } else {
            if ($cek2->Obat2 > 0) {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Obat/obat');
            } else {
                $this->db->where('kd_obat', $id);
                if ($this->db->delete('obat')) {
                    $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                    redirect('Obat/obat');
                } else {
                    $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                    redirect('Obat/obat');
                }
            }
        }
    }

    public function add_obat_masuk()
    {
        $data['user'] = $this->Mlogin->get_all_user('apoteker')->row_object();
        $data['kode_baru'] = $this->Mid->buat_kodeObat_masuk();
        $this->template->load('layout/layout_apoteker', 'apoteker/add_obat_masuk', $data);
    }
    public function aksi_obat_masuk()
    {
        $kd = $this->input->post('kode');
        $tgl = $this->input->post('tgl');
        $id = $this->session->userdata('id');
        $harga = $this->input->post('harga');

        $dataInsert = array(
            'kd_masuk' => $kd,
            'subtotal' => $harga,
            'id_apo' => $id,
            'tanggal' => $tgl
        );
        $this->Mapoteker->insert('obat_masuk', $dataInsert);
        redirect('Obat/obat_masuk');
    }
    public function delete_obat_masuk($id)
    {
        $cek = $this->Mapoteker->cek_obat_masuk($id)->row_object();
        if ($cek->Masuk > 0) {
            $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
            redirect('Obat/obat_masuk');
        } else {
            $this->db->where('kd_masuk', $id);
            if ($this->db->delete('obat_masuk')) {
                $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data');
                redirect('Obat/obat_masuk');
            } else {
                $this->session->set_flashdata('pesan2', 'Gagal menghapus data (Data Terpakai)');
                redirect('Obat/obat_masuk');
            }
        }
    }
}
