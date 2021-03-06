<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("JadwalModel");
        $this->load->model("PembayaranModel");
        $this->load->model("NotifikasiModel");
        $this->load->helper('time');
        $this->load->helper('rupiah');

        $this->NotifikasiModel->deleteOldNotif();

        $data['countnotif'] = $this->NotifikasiModel->notifCountAdmin();
        $data['notif'] = $this->NotifikasiModel->getNotifAdmin();
        
        $this->load->vars($data);
    }

	public function index() {
        if ($this->session->userdata('id_user')) {
            $data["bookings"] = $this->JadwalModel->getAllByAdmin();
            $data['tittle'] = "Booking";
            $this->load->view('admin/booking-admin', $data);
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function pembayaran() {
        if ($this->session->userdata('id_user')) {
            $data["payments"] = $this->JadwalModel->getAllPembayaranByAdmin();
            $data['tittle'] = "Pembayaran";
            $this->load->view('admin/pembayaran-admin', $data);

        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function konfirmasiBooking() {
        $id = $this->input->post('id');
        $user = $this->input->post('user');
        $kode = $this->input->post('kode');
        if ($this->session->userdata('id_user')) {
            $jadwal = $this->JadwalModel;
            $jadwal->updateStatus($id, $kode, "Dibatalkan", $user);
            redirect('admin/Booking');
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function tolakPembayaran() {
        $idjadwal = $this->input->post('jadwal');
        $idpembayaran = $this->input->post('pembayaran');
        $user = $this->input->post('user');
        $kode = $this->input->post('kode');
        $kodebooking = $this->input->post('booking');
        if ($this->session->userdata('id_user')) {
            $jadwal = $this->JadwalModel;
            $jadwal->updateStatus($idjadwal, $kodebooking, "Dibatalkan", $user);
            $pembayaran = $this->PembayaranModel;
            $pembayaran->updateStatus($idpembayaran, $kode, "Ditolak", $user);
            redirect('admin/Booking/pembayaran');
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function terimaPembayaran() {
        $idjadwal = $this->input->post('jadwal');
        $idpembayaran = $this->input->post('pembayaran');
        $user = $this->input->post('user');
        $kode = $this->input->post('kode');
        $kodebooking = $this->input->post('booking');
        if ($this->session->userdata('id_user')) {
            $jadwal = $this->JadwalModel;
            $jadwal->updateStatus($idjadwal, $kodebooking, "Selesai", $user);
            $pembayaran = $this->PembayaranModel;
            $pembayaran->updateStatus($idpembayaran, $kode, "Diterima", $user);
            redirect('admin/Booking/pembayaran');
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
}
