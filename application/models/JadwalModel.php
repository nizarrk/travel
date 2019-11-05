<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model
{
    private $_table = "jadwal";

    public  $id_jadwal,
            $kode_jadwal,
            $id_kendaraan,
            $id_kota,
            $id_user,
            $tgl_berangkat,
            $tgl_pulang,
            $total_biaya,
            $status_jadwal;

    public function rules() {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required']
        ];
    }

    public function getAll() {
        return $this->db->query("
                SELECT 
                    * 
                FROM 
                    jadwal a 
                JOIN 
                    kendaraan b 
                ON 
                    a.id_kendaraan = b.id_kendaraan 
                JOIN 
                    kota c 
                ON 
                    a.id_kota = c.id_kota 
                JOIN 
                    user d 
                ON 
                    a.id_user = d.id_user 
                AND 
                    a.id_user = '". $this->session->userdata('id_user') ."'")->result();
    }

    public function getAllByAdmin() {
        return $this->db->query("
                SELECT 
                    * 
                FROM 
                    jadwal a 
                JOIN 
                    kendaraan b 
                ON 
                    a.id_kendaraan = b.id_kendaraan 
                JOIN 
                    kota c 
                ON 
                    a.id_kota = c.id_kota 
                JOIN 
                    user d 
                ON 
                    a.id_user = d.id_user")->result();
    }

    public function getAllPembayaranByAdmin() {
        return $this->db->query("
                SELECT 
                    * 
                FROM 
                    pembayaran a 
                JOIN 
                    jadwal b 
                ON 
                    a.id_jadwal = b.id_jadwal 
                JOIN 
                    user c 
                ON 
                    a.id_user = c.id_user")->result();
    }

    public function check($tgl1, $tgl2) {
        return $this->db->query("
                SELECT 
                    * 
                FROM 
                    kendaraan, kategori 
                WHERE 
                    kendaraan.id_kategori = kategori.id_kategori 
                AND 
                    kendaraan.id_kendaraan 
                NOT IN 
                    (SELECT 
                        id_kendaraan 
                    FROM 
                        jadwal 
                    WHERE 
                        tgl_berangkat 
                    BETWEEN 
                        '".$tgl1."' 
                    AND 
                        '".$tgl2."')"
                )->result();
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    public function create() {
        $post = $this->input->post();
        $this->kode_jadwal = $this->uniqueID('kode_jadwal', 'TRV-', 5);
        $this->id_kendaraan = $post["kendaraan"];
        $this->id_kota = $post["kota"];
        $this->id_user = $post["user"];
        $this->tgl_berangkat = $post["tgl1"];
        $this->tgl_pulang = $post["tgl2"];
        $this->total_biaya = $post["total"];
        $this->status_jadwal = "Menunggu Pembayaran";
        $this->db->insert($this->_table, $this);

        //insert tabel notifikasi
        $this->load->model("NotifikasiModel");
        $this->NotifikasiModel->create($this->kode_jadwal, "Booking");
    }

    //admin
    public function updateStatus($id, $kode, $status, $user = 1) {
        $this->id_jadwal = $id;
        $this->status_jadwal = $status;
        $this->db->update($this->_table, array('status_jadwal' => $this->status_jadwal), array('id_jadwal' => $this->id_jadwal));

        //insert tabel notifikasi
        $this->load->model("NotifikasiModel");
        $this->NotifikasiModel->create($kode, "Booking", $status, $user);
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