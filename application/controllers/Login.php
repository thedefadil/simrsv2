<?php
class Login extends CI_Controller {
    public function index() { 
        $this->load->view(‘halaman_login’); 
    } 

    public function proses_login() { 
        $user = $this->input->post(‘NIP’); 
        $pass = $this->input->post(‘PWD’); 

        $login = $this->user->cek_user($user, $pass); 

        if (!empty($login)) { 
            // login berhasil 
            $this->session->set_userdata($login); 
            redirect(base_url()); 
        } else { 
            // login gagal 
            $this->session->set_flashdata(‘gagal’, ‘Username atau Password Salah!’); 
            redirect(base_url(‘login’)); 
        } 
    } 
}