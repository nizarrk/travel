<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    private $_table = "user";

    public  $id_user,
            $nama_user,
            $alamat_user,
            $telp_user,
            $foto_user = "default.jpg",
            $email_user,
            $pass_user;

    public function rules() {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'telp',
            'label' => 'No. HP',
            'rules' => 'numeric'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]'],

            ['field' => 'konfirm',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[password]'],
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function create() {
        $post = $this->input->post();
        $this->nama_user = $post["nama"];
        $this->alamat_user = $post["alamat"];
        $this->telp_user = $post["telp"];
        $this->email_user = $post["email"];
        $this->pass_user = md5($post["password"]);
        $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->email = $post["email"];
        $this->pass = $post["password"];
        $this->db->update($this->_table, $this, array('id_user' => $post['id']));
    }

    public function delete($id) {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    public function cekLogin($email, $password) {
        $this->db->where('email_user', $email);
        $this->db->where('pass_user', md5($password));
        $query = $this->db->get('user');
        return $query->row_array();
    }
}