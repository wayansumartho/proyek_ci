<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        if (empty($this->session->userdata('status') == 'Kasir')) {
            $this->session->set_flashdata('pesan2', 'Anda Bukan Kasir !!');
            redirect('Auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->Mlogin->get_all_user('kasir')->row_object();
        $data['pembayaran'] = $this->Mkasir->get_all_pembayaran()->result();
        $this->template->load('layout/layout_kasir', 'kasir/pembayaran', $data);
    }

    public function bayar()
    {
        $data['user'] = $this->Mlogin->get_all_user('kasir')->row_object();
        $data['pasien'] = $this->Mkasir->get_all_pembayaran()->row_object();
        $data['pel'] = $this->Mkasir->get_all_pelayanan()->result();
        $data['kode_bayar'] = $this->Mid->buat_kode_bayar();
        $this->template->load('layout/layout_kasir', 'kasir/add_pembayaran', $data);
    }
    public function simpan()
    {

        $kd_bayar = $this->input->post('kd_bayar');
        $id_periksa = $this->input->post('id_periksa');
        $kd_resep = $this->input->post('kd_resep');
        $total = $this->input->post('harga');
        $id_kasir = $this->session->userdata('id');
        $date = $this->input->post('tanggal');

        $id_pel = $this->input->post('id_pel');


        $dataInsert1 = array(
            'kd_bayar' => $kd_bayar,
            'id_periksa' => $id_periksa,
            'kd_resep' => $kd_resep,
            'totalbayar' => $total,
            'id_kasir' => $id_kasir,
            'tanggal_bayar' => $date
        );

        $dataInsert2 = array(
            'kd_bayar' => $kd_bayar,
            'total' => $total,
            'id_pel' => $id_pel
        );
        $this->Mkasir->insert('pembayaran', $dataInsert1);
        $this->Mkasir->insert('detail_bayar', $dataInsert2);

        $data['pasien'] = $this->Mkasir->get_data_for_detail($id_periksa)->row_object();
        $data['detail_bayar'] = $this->Mkasir->get_data_detail_bayar_by_id($id_periksa)->result();
        $data['user'] = $this->Mlogin->get_all_user('kasir')->row_object();
        $this->template->load('layout/layout_kasir', 'kasir/detail_pembayaran', $data);
    }

    public function detail_bayar($id)
    {
        $data['pasien'] = $this->Mkasir->get_data_for_detail($id)->row_object();
        $data['detail_bayar'] = $this->Mkasir->get_data_detail_bayar_by_id($id)->result();
        $data['user'] = $this->Mlogin->get_all_user('kasir')->row_object();
        $this->template->load('layout/layout_kasir', 'kasir/detail_pembayaran', $data);
    }
}
