<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranModel extends CI_Model
{
    private $_table = "pembayaran";

    public  $id_pembayaran,
            $id_jadwal,
            $id_user,
            $kode_pembayaran,
            $no_rek_user,
            $nama_rek_user,
            $nominal_pembayaran,
            $status_pembayaran,
            $bukti_pembayaran;

    public function rules() {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required']
        ];
    }

    public function getAll() {
        return $this->db->query()->result();
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id_pembayaran" => $id])->row();
    }

    public function create() {
        $post = $this->input->post();
        $this->id_jadwal = $post["jadwal"];
        $this->id_user = $post["user"];
        $this->kode_pembayaran = $this->uniqueID('kode_pembayaran', 'BYR-', 5);
        $this->no_rek_user = $post["norek"];
        $this->nama_rek_user = $post["namarek"];
        $this->nominal_pembayaran = $post["nominal"];
        $this->status_pembayaran = "Menunggu Konfirmasi";
        $this->bukti_pembayaran = $this->_uploadImage();

        //update status tabel jadwal
        $this->load->model("JadwalModel");
        $this->JadwalModel->updateStatus($this->id_jadwal, $this->status_pembayaran, $this->status_pembayaran);

        //insert tabel notifikasi
        $this->load->model("NotifikasiModel");
        $this->NotifikasiModel->create($this->kode_pembayaran, "Pembayaran", $this->status_pembayaran);
        
        //insert pembayaran
        $this->db->insert($this->_table, $this);
    }

    public function updateStatus($id, $kode, $status, $user = 1) {
        $this->id_pembayaran = $id;
        $this->status_pembayaran = $status;
        $this->db->update($this->_table, array('status_pembayaran' => $this->status_pembayaran), array('id_pembayaran' => $this->id_pembayaran));
        
        //insert tabel notifikasi
        $this->load->model("NotifikasiModel");
        $this->NotifikasiModel->create($kode, "Pembayaran", $status, $user);
    }

    public function update() {
        $post = $this->input->post();
        $this->id_jadwal = $post["id"];
        // $this->kode_jadwal = uniqid("TRV-");
        $this->id_kendaraan = $post["kendaraan"];
        $this->id_kota = $post["kota"];
        $this->id_user = $post["user"];
        $this->tgl_berangkat = $post["tgl1"];
        $this->tgl_pulang = $post["tgl2"];
        $this->total_biaya = $post["total"];
        $this->db->update($this->_table, $this, array('id_kategori' => $post['id']));
    }

    public function delete($id) {
        return $this->db->delete($this->_table, array("id_kategori" => $id));
    }

    private function _uploadImage() {
        $config['upload_path']          = './upload/pembayaran/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->kode_pembayaran;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function uniqueID($namakolom, $prefix, $digit) {
        $lastCounter = 0;

        $lastId = "";
        $counter = 0;
        $query = $this->db->query("SELECT $namakolom FROM $this->_table WHERE $namakolom lIKE '$prefix%' ORDER BY $namakolom DESC limit 1");
        if ($query->num_rows() == 0) {
            $counter = 1;
        } else{

            foreach ($query->result() as $row) {
                $lastId = $row->$namakolom;
                $lastCounter = intval(str_replace($prefix,"", $lastId));
               
            }
        }

        $counter = $lastCounter +1;
       
        
        $newId = $prefix . str_pad($counter,$digit,"0", STR_PAD_LEFT);
        return $newId ;
    } 

}