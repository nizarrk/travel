<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("NotifikasiModel");
    }

	public function index()
	{
		
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
