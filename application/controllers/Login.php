<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index() {
        $this->load->view('v_login');
    }

    function aksi() {
        // Validasi form login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() !== FALSE) {
            // Ambil data dari input POST
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Membuat array untuk kondisi WHERE query
            $where = array(
                'pengguna_username' => $username,
                'pengguna_password' => md5($password),
                'pengguna_status'   => 1
            );

            // Cek kecocokan data pengguna di database
            $cek = $this->m_login->cek_login('pengguna', $where);

            // Jika cocok (login berhasil)
            if ($cek->num_rows() > 0) {
                $data_pengguna = $this->m_login->cek_login('pengguna', $where)->row();

                // Buat session pengguna
                $data_session = array(
                    'id'       => $data_pengguna->pengguna_id,
                    'username' => $data_pengguna->pengguna_username,
                    'level'    => $data_pengguna->pengguna_level,
                    'status'   => 'telah_login'
                );

                $this->session->set_userdata($data_session);

                // Redirect ke dashboard
                redirect('dashboard');
            } else {
                // Login gagal, redirect kembali ke halaman login dengan alert
                redirect('login?alert=gagal');
            }
        } else {
            // Validasi form gagal, tampilkan kembali form login
            $this->load->view('v_login');
        }
    }
}