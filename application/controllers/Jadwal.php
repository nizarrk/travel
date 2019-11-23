<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("JadwalModel");
        $this->load->model("PembayaranModel");
        $this->load->model("KotaModel");

        $this->load->model("NotifikasiModel");
        $this->load->helper('time');

        $this->NotifikasiModel->deleteOldNotif();

        $data['countnotif'] = $this->NotifikasiModel->notifCountUser($this->session->userdata('id_user'));
        $data['notif'] = $this->NotifikasiModel->getNotifUser($this->session->userdata('id_user'));
        
        $this->load->vars($data);
    }

	public function index()
	{
        $id = $this->input->post('kota');
        $nama = $this->input->post('namakota');
        $harga = $this->input->post('hargakota');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');

        if ($tgl1 == null || $tgl2 == null) {
            $tgl1 = date('Y-m-d');
            $tgl2 = date('Y-m-d');
        }

        $date1=date_create($tgl1);
        $date2=date_create($tgl2);
        $diff=date_diff($date1,$date2)->format("%a");

        $data['tittle'] = "Jadwal";
        $data["schedules"] = $this->JadwalModel->check($tgl1, $tgl2);
        $data["cities"] = $this->KotaModel->getAll();
        $data["post"] = [$id, $nama, $harga, $tgl1, $tgl2, $diff];

        $this->load->view('booking', $data);
    }

    public function booking() {
        if ($this->session->userdata('id_user')) {
            $jadwal = $this->JadwalModel;

            $jadwal->create();
            $data['tittle'] = "Success";
            $this->load->view('_partials/sukses', $data);
            
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function bookingOffline() {
        if ($this->session->userdata('is_admin') == 'yes') {
            $this->load->model("UserModel");

            //create new user
            $user = $this->UserModel;
            $idNewUser = $user->createOffline();
            
            //insert jadwal
            $jadwal = $this->JadwalModel;
            $idNewJadwal = $jadwal->createOffline($idNewUser);

            //insert pembayaran
            $pembayaran = $this->PembayaranModel;
            $pembayaran->createOffline($idNewUser, $idNewJadwal);

            $this->session->set_flashdata('success', 'Berhasil menambahkan booking!');
            redirect('admin/Booking');
            
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function history() {
        if ($this->session->userdata('id_user')) {
            $data['tittle'] = "History";
            $data["histories"] = $this->JadwalModel->getAll();
            $this->load->view('user/history', $data);
            
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function bayar() {
        if ($this->session->userdata('id_user')) {
            $pembayaran = $this->PembayaranModel;

            $pembayaran->create();
            $data['tittle'] = "Success";
            $this->load->view('_partials/sukses', $data);
            
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }


}
