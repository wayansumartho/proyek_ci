<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
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
        if (empty($this->session->userdata('status') == 'Dokter')) {
            $this->session->set_flashdata('pesan2', 'Anda Bukan Dokter !!');
            redirect('Auth');
        }
    }

    public function pemeriksaan()
    {
        $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
        $data['pasien'] = $this->Mdokter->get_data_for_record()->result();
        $this->template->load('layout/layout_dokter', 'dokter/pemeriksaan', $data);
    }
    public function add_pemeriksaan($id)
    {
        $datawhere = array('kd_rm' => $id);
        $data['pasien'] = $this->Mdokter->get_data_for_inspection($id)->row_object();
        $data['periksa'] = $this->Mdokter->get_by_id('pemeriksaan', $datawhere)->result();
        $data['kode_periksa'] = $this->Mid->buat_kode_periksa();
        $data['tindakan'] = $this->Mdokter->getAllTindakan()->result();
        $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
        $this->template->load('layout/layout_dokter', 'dokter/add_pemeriksaan', $data);
    }
    public function aksi_periksa()
    {
        $id_periksa = $this->input->post('id_periksa');
        $kd_rm = $this->input->post('kd_rm');
        $id = $this->session->userdata('id');
        $keluhan = $this->input->post('keluhan');
        $diagnosa = $this->input->post('diagnosa');
        $tindakan = $this->input->post('tindakan');
        $tanggal = $this->input->post('tanggal');

        $dataInsert = array(
            'id_periksa' => $id_periksa,
            'kd_rm' => $kd_rm,
            'id_dokter' => $id,
            'keluhan' => $keluhan,
            'diagnosa' => $diagnosa,
            'tindakan' => $tindakan,
            'tanggal' => $tanggal
        );

        $this->Mdokter->insert('pemeriksaan', $dataInsert);
        $this->session->set_flashdata('pesan1', 'Data Berhasil Ditambahkan');
        redirect('Dokter/add_pemeriksaan/' . $kd_rm);
    }
    public function delete_periksa($id, $kd_rm)
    {
        $cek = $this->Mdokter->cek_pemeriksaan($id)->row_object();
        if ($cek->Periksa > 0) {
            $this->session->set_flashdata('pesan3', 'Data Gagal di Hapus !! (data terpakai)');
            redirect('Dokter/add_pemeriksaan/' . $kd_rm);
        } else {
            $this->db->where('id_periksa', $id);
            if ($this->db->delete('pemeriksaan')) {
                $this->session->set_flashdata('pesan2', 'Data Berhasil di Hapus ');
                redirect('Dokter/add_pemeriksaan/' . $kd_rm);
            } else {
                $this->session->set_flashdata('pesan3', 'Data Gagal di Hapus !! (data terpakai)');
                redirect('Dokter/add_pemeriksaan/' . $kd_rm);
            }
        }
    }

    public function resep_obat()
    {
        $data['periksa'] = $this->Mdokter->getAllPemeriksaan_by_id()->result();
        $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
        $this->template->load('layout/layout_dokter', 'dokter/resep_obat', $data);
    }
    public function add_resep_pasien($id)
    {
        $data['resep'] = $this->Mdokter->get_data_for_resep_by_id($id)->row_object();
        $data['data_resep'] = $this->Mdokter->get_data_resep_by_id($id)->result();
        $data['kode_resep'] = $this->Mid->buat_kode_resep();
        $data['aturan'] = $this->Mdokter->getAllAturan()->result();
        $data['obat'] = $this->Mdokter->getAllObat()->result();
        $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
        $this->template->load('layout/layout_dokter', 'dokter/add_resep_obat', $data);
    }
    public function detail_resep($id)
    {
        $data['pasien'] = $this->Mdokter->get_data_for_detail($id)->row_object();
        $data['detail'] = $this->Mdokter->get_data_detail_resep_by_id($id)->result();
        $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
        $this->template->load('layout/layout_dokter', 'dokter/detail_resep', $data);
    }
    public function aksi_resep()
    {

        $stok_out = $this->input->post('stok_out');
        $harga = $this->input->post('harga');
        $hargatotal = $stok_out * $harga;

        $kd_resep = $this->input->post('kd_resep');
        $periksa = $this->input->post('id_periksa');
        $dokter = $this->session->userdata('id');
        $tanggal = $this->input->post('tanggal');

        $kd_obat = $this->input->post('obat');
        $id_aturan = $this->input->post('aturan');
        $stok = $this->input->post('stok');
        $total_stok = $stok - $stok_out;

        $dataInsert1 = array(
            'kd_resep' => $kd_resep,
            'subtotal' => $harga,
            'id_periksa' => $periksa,
            'id_dokter' => $dokter,
            'tanggal_resep' => $tanggal
        );

        $dataInsert2 = array(
            'kd_resep' => $kd_resep,
            'kd_obat' => $kd_obat,
            'id' => $id_aturan,
            'stok_out' => $stok_out,
            'stok_tot' => $total_stok,
            'total' => $hargatotal
        );

        $this->Mdokter->insert('resep', $dataInsert1);
        $this->Mdokter->insert('detail_resep', $dataInsert2);

        $data['pasien'] = $this->Mdokter->get_data_for_detail($periksa)->row_object();
        $data['detail'] = $this->Mdokter->get_data_detail_resep_by_id($periksa)->result();
        $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
        $this->template->load('layout/layout_dokter', 'dokter/detail_resep', $data);
    }
}
