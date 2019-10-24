<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
        if ($this->session->userdata('id_user')) {
            $this->load->view('dashboard');
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
    
    public function admin() {
        if ($this->session->userdata('id_user')) {
            $this->load->view('dashboard_admin');
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
}
