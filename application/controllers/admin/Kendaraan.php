<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("KategoriModel");
        $this->load->model("KendaraanModel");
        $this->load->model("NotifikasiModel");
        $this->load->helper('time');

        $this->NotifikasiModel->deleteOldNotif();

        $data['countnotif'] = $this->NotifikasiModel->notifCountAdmin();
        $data['notif'] = $this->NotifikasiModel->getNotifAdmin();
        
        $this->load->vars($data);
    }

	public function index() {
        if ($this->session->userdata('id_user')) {
            $data["categories"] = $this->KategoriModel->getAll();
            $data["vehicles"] = $this->KendaraanModel->getAll();
            $data['tittle'] = "Kendaraan";
            $this->load->view('admin/kendaraan', $data);
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function addKategori() {
        if ($this->session->userdata('id_user')) {
            $kategori = $this->KategoriModel;
            $validation = $this->form_validation;
            $validation->set_rules($kategori->rules());

            if ($validation->run()) {
                $kategori->create();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('admin/Kendaraan');
            } else {
                $this->session->set_flashdata('fail', 'Gagal disimpan');
                redirect('admin/Kendaraan');
            }
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }
    
    public function add() {
        if ($this->session->userdata('id_user')) {
            $kendaraan = $this->KendaraanModel;
            $validation = $this->form_validation;
            $validation->set_rules($kendaraan->rules());

            if ($validation->run()) {
                $kendaraan->create();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('admin/Kendaraan');
            } else {
                $this->session->set_flashdata('fail', 'Gagal disimpan');
                redirect('admin/Kendaraan');
            }
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function editKategori() {
        $kategori = $this->KategoriModel;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Kendaraan');
        } else {
            $this->session->set_flashdata('fail', 'Gagal disimpan');
            redirect('admin/Kendaraan');
        }
    }

    public function edit() {
        $kendaraan = $this->KendaraanModel;
        $validation = $this->form_validation;
        $validation->set_rules($kendaraan->rules());

        if ($validation->run()) {
            $kendaraan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Kendaraan');
        } else {
            $this->session->set_flashdata('fail', 'Gagal disimpan');
            redirect('admin/Kendaraan');
        }
    }

    public function deleteKategori() {
        $id = $this->input->post('id');
            
        if ($this->KategoriModel->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/Kendaraan');
        }
    }

    public function delete() {
        $id = $this->input->post('id');
            
        if ($this->KendaraanModel->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/Kendaraan');
        }
    }
}
