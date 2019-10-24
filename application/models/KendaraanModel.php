<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KendaraanModel extends CI_Model
{
    private $_table = "kendaraan";

    public  $id_kendaraan,
            $id_kategori,
            $nama_kendaraan,
            $warna_kendaraan,
            $plat_kendaraan,
            $jumlah_penumpang_kendaraan,
            $harga_kendaraan;

    public function rules() {
        return [
            ['field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'required'],
            
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'warna',
            'label' => 'Warna',
            'rules' => 'required'],

            ['field' => 'plat',
            'label' => 'Plat Nomor',
            'rules' => 'required'],

            ['field' => 'penumpang',
            'label' => 'Jumlah Penumpang',
            'rules' => 'required|numeric'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'required|numeric']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id_kendaraan" => $id])->row();
    }

    public function create() {
        $post = $this->input->post();
        $this->id_kategori = $post["kategori"];
        $this->nama_kendaraan = $post["nama"];
        $this->warna_kendaraan = $post["warna"];
        $this->plat_kendaraan = $post["plat"];
        $this->jumlah_penumpang_kendaraan = $post["penumpang"];
        $this->harga_kendaraan = $post["harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->id_kendaraan = $post["id"];
        $this->id_kategori = $post["kategori"];
        $this->nama_kendaraan = $post["nama"];
        $this->warna_kendaraan = $post["warna"];
        $this->plat_kendaraan = $post["plat"];
        $this->jumlah_penumpang_kendaraan = $post["penumpang"];
        $this->harga_kendaraan = $post["harga"];
        $this->db->update($this->_table, $this, array('id_kendaraan' => $post['id']));
    }

    public function delete($id) {
        return $this->db->delete($this->_table, array("id_kendaraan" => $id));
    }

}