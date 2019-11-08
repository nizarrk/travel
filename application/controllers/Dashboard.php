<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("NotifikasiModel");
        $this->load->helper('time');

        $this->NotifikasiModel->deleteOldNotif();

        $data['countnotif'] = $this->NotifikasiModel->notifCountUser($this->session->userdata('id_user'));
        $data['notif'] = $this->NotifikasiModel->getNotifUser($this->session->userdata('id_user'));
        
        $this->load->vars($data);
    }

	public function index() {
        if ($this->session->userdata('id_user')) {
            $this->load->view('home');
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
    
    public function admin() {
        if ($this->session->userdata('id_user')) {
            $data['tittle'] = "Admin";
            $this->load->view('admin/dashboard-admin', $data);
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
}
