<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("KotaModel");
        $this->load->model("NotifikasiModel");
        $this->load->helper('time');

        $this->NotifikasiModel->deleteOldNotif();

        $data['countnotif'] = $this->NotifikasiModel->notifCountAdmin();
        $data['notif'] = $this->NotifikasiModel->getNotifAdmin();
        
        $this->load->vars($data);
    }

	public function index() {
        if ($this->session->userdata('id_user')) {
            $data["cities"] = $this->KotaModel->getAll();
            $this->load->view('admin/kota', $data);
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
    
    public function add() {
        if ($this->session->userdata('id_user')) {
            $kota = $this->KotaModel;
            $validation = $this->form_validation;
            $validation->set_rules($kota->rules());

            if ($validation->run()) {
                $kota->create();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('admin/Kota');
            } else {
                $this->session->set_flashdata('fail', 'Gagal disimpan');
                redirect('admin/Kota');
            }
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function edit() {
        $kota = $this->KotaModel;
        $validation = $this->form_validation;
        $validation->set_rules($kota->rules());

        if ($validation->run()) {
            $kota->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Kota');
        } else {
            $this->session->set_flashdata('fail', 'Gagal disimpan');
            redirect('admin/Kota');
        }
    }

    public function delete() {
        $id = $this->input->post('id');
            
        if ($this->KotaModel->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/Kota');
        }
    }
}
