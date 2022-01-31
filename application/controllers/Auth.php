<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
    }

    public function index()
    {
        $this->load->view('auth/form_login1');
    }
    public function admin()
    {
        if ($this->session->userdata('status') == 'Admin') {
            $data['user'] = $this->Mlogin->get_all_user('admin')->row_object();
            $this->template->load('layout/layout_admin', 'auth/dashboard', $data);
        } else {
            $this->session->set_flashdata('pesan2', 'Silahkan Login Terlebih Dahulu !');
            redirect('Auth');
        }
    }
    public function dokter()
    {
        if ($this->session->userdata('status') == 'Dokter') {
            $data['user'] = $this->Mlogin->get_all_user('dokter')->row_object();
            $this->template->load('layout/layout_dokter', 'auth/dashboard', $data);
        } else {
            $this->session->set_flashdata('pesan2', 'Silahkan Login Terlebih Dahulu !');
            redirect('Auth');
        }
    }
    public function apoteker()
    {
        if ($this->session->userdata('status') == 'Apoteker') {
            $data['user'] = $this->Mlogin->get_all_user('apoteker')->row_object();
            $this->template->load('layout/layout_apoteker', 'auth/dashboard', $data);
        } else {
            $this->session->set_flashdata('pesan2', 'Silahkan Login Terlebih Dahulu !');
            redirect('Auth');
        }
    }
    public function kasir()
    {
        if ($this->session->userdata('status') == 'Kasir') {
            $data['user'] = $this->Mlogin->get_all_user('kasir')->row_object();
            $this->template->load('layout/layout_kasir', 'auth/dashboard', $data);
        } else {
            $this->session->set_flashdata('pesan2', 'Silahkan Login Terlebih Dahulu !');
            redirect('Auth');
        }
    }
}
