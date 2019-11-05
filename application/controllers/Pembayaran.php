<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("PembayaranModel");
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
            $pembayaran = $this->PembayaranModel;

            $pembayaran->create();
            redirect('Jadwal/history');
            
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

}
