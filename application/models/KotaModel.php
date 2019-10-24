<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KotaModel extends CI_Model
{
    private $_table = "kota";

    public  $id_kota,
            $nama_kota,
            $harga_kota;

    public function rules() {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'required|numeric']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id_kota" => $id])->row();
    }

    public function create() {
        $post = $this->input->post();
        $this->nama_kota = $post["nama"];
        $this->harga_kota = $post["harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->id_kota = $post["id"];
        $this->nama_kota = $post["nama"];
        $this->harga_kota = $post["harga"];
        $this->db->update($this->_table, $this, array('id_kota' => $post['id']));
    }

    public function delete($id) {
        return $this->db->delete($this->_table, array("id_kota" => $id));
    }

}