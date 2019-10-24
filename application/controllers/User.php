<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("UserModel");
    }

	public function index() {
		$this->load->view('login');
    }
    
    public function register() {
        $this->load->view('register');
    }

    public function add() {
        $user = $this->UserModel;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->create();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('User');
        } else {
            $this->session->set_flashdata('fail', 'Gagal disimpan');
            $this->load->view('register');
        }
        
    }

    public function login() {
        $user = $this->input->post('username'); 
        $pass = $this->input->post('password'); 

        $login = $this->UserModel->cekLogin($user, $pass);

        if (!empty($login)) { 
            // login berhasil
            $this->session->set_userdata($login);
            if ($this->session->userdata('is_admin') != null) {
                redirect('Dashboard/admin');
            } else {
                redirect('Dashboard');
            }
        } else { 
            // login gagal
            $this->session->set_flashdata('fail', 'Username atau Password Salah!');
            redirect('User');
        }
    }

    public function logout() {
		$this->session->sess_destroy();
		redirect('User');
	}
}
