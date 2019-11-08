<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function __construct() {
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
        $data['tittle'] = "Help";
		$this->load->view('help', $data);
	}
}
