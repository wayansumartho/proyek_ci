<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function aksi_login()
    {
        $this->load->model('Mlogin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        $user = $this->input->post('user');

        if ($user == "admin") {
            $cek = $this->Mlogin->cek_admin($u, $p)->num_rows();
            $result = $this->Mlogin->cek_admin($u, $p)->result();

            if ($cek == 1) {
                $aktif = $this->Mlogin->cek_aktif_admin($u)->row_object();
                if ($aktif->aktif == 1) {

                    $data_session = array(
                        'userName' => $u,
                        'id' => $result[0]->id_admin,
                        'status' => 'Admin'
                    );

                    $this->session->set_userdata($data_session);
                    redirect('Auth/admin');
                } else {
                    $this->session->set_flashdata('pesan', 'User Sudah Tidak Aktif !!');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password salah !');
                redirect('Auth');
            }
        } elseif ($user == "dokter") {
            $cek = $this->Mlogin->cek_dokter($u, $p)->num_rows();
            $result = $this->Mlogin->cek_dokter($u, $p)->result();

            if ($cek == 1) {
                $aktif = $this->Mlogin->cek_aktif_dokter($u)->row_object();
                if ($aktif->aktif == 1) {
                    $data_session = array(
                        'userName' => $u,
                        'id' => $result[0]->id_dokter,
                        'status' => 'Dokter'
                    );

                    $this->session->set_userdata($data_session);
                    redirect('Auth/dokter');
                } else {
                    $this->session->set_flashdata('pesan', 'User Sudah Tidak Aktif !!');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password salah !');
                redirect('Auth');
            }
        } elseif ($user == "apoteker") {
            $cek = $this->Mlogin->cek_apoteker($u, $p)->num_rows();
            $result = $this->Mlogin->cek_apoteker($u, $p)->result();

            if ($cek == 1) {
                $aktif = $this->Mlogin->cek_aktif_apoteker($u)->row_object();
                if ($aktif->aktif == 1) {
                    $data_session = array(
                        'userName' => $u,
                        'id' => $result[0]->id_apo,
                        'status' => 'Apoteker'
                    );

                    $this->session->set_userdata($data_session);
                    redirect('Auth/apoteker');
                } else {
                    $this->session->set_flashdata('pesan', 'User Sudah Tidak Aktif !!');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password salah !');
                redirect('Auth');
            }
        } elseif ($user == "kasir") {
            $cek = $this->Mlogin->cek_kasir($u, $p)->num_rows();
            $result = $this->Mlogin->cek_kasir($u, $p)->result();

            if ($cek == 1) {
                $aktif = $this->Mlogin->cek_aktif_kasir($u)->row_object();
                if ($aktif->aktif == 1) {
                    $data_session = array(
                        'userName' => $u,
                        'id' => $result[0]->id_kasir,
                        'status' => 'Kasir'
                    );

                    $this->session->set_userdata($data_session);
                    redirect('Auth/kasir');
                } else {
                    $this->session->set_flashdata('pesan', 'User Sudah Tidak Aktif !!');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password salah !');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Silahkan Pilih User ! ( Harus Di Isi! )');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
