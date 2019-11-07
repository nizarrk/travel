<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

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

	public function index()
	{
		if ($this->session->userdata('id_user')) {
            if ($this->session->userdata('id_user') == 1) {
                $data['notifications'] = $this->NotifikasiModel->getNotifAdminAll();
                $this->load->view('notifikasi',  $data);
            } else {
                $data['notifications'] = $this->NotifikasiModel->getNotifUserAll($this->session->userdata('id_user'));
                $this->load->view('notifikasi', $data);
            }
        } else {
            $this->load->view('login');
        }
    }
    
    public function countRowAdmin() {
        return $this->NotifikasiModel->notifCountAdmin();
    }

    public function countRowUser() {
        return $this->NotifikasiModel->notifCountUser($this->session->userdata('id_user'));
    }

    public function editStatus($id) {
        $data = $this->NotifikasiModel->updateStatus($id);

        echo json_encode($data);
    }
}
