<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    private $_table = "user";

    public  $id_user,
            $nama_user,
            $username_user,
            $alamat_user,
            $telp_user,
            $foto_user = "default.jpg",
            $email_user,
            $pass_user;

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id) {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function create() {
        $post = $this->input->post();
        $this->nama_user = $post["nama"];
        $this->username_user = $post["username"];
        $this->alamat_user = $post["alamat"];
        $this->telp_user = $post["telp"];
        $this->email_user = $post["email"];
        $this->pass_user = md5($post["password"]);
        $this->db->insert($this->_table, $this);
    }

    public function createOffline() {
        $post = $this->input->post();
        $this->nama_user = $post["nama"];
        $this->alamat_user = $post["alamat"];
        $this->telp_user = $post["telp"];
        $this->db->insert($this->_table, array(
            'nama_user' => $this->nama_user, 
            'alamat_user' => $this->alamat_user, 
            'telp_user' => $this->telp_user, 
        ));

        return $this->db->insert_id();
    }

    public function checkUsername($username) {
        return $this->db->get_where($this->_table, ["username_user" => $username])->row();
    }

    public function checkEmail($email) {
        return $this->db->get_where($this->_table, ["email_user" => $email])->row();
    }

    public function update() {
        $post = $this->input->post();
        $this->nama_user = $post["nama"];
        $this->username_user = $post["username"];
        $this->alamat_user = $post["alamat"];
        $this->telp_user = $post["telp"];
        $this->email_user = $post["email"];

        if (!empty($_FILES["foto"]["name"])) {
            $this->foto_user = $this->_uploadImage();
        } else {
            $this->foto_user = $post["oldfoto"];
        }

        $this->db->update($this->_table, array(
            'nama_user' => $this->nama_user, 
            'username_user' => $this->username_user, 
            'alamat_user' => $this->alamat_user, 
            'telp_user' => $this->telp_user, 
            'email_user' => $this->email_user,
            'foto_user' => $this->foto_user), 
            array('id_user' => $this->session->userdata('id_user')));
    }

    public function updatePassword() {
        $post = $this->input->post();
        $this->pass_user = md5($post["newpass"]);

        $this->db->update($this->_table, array(
            'pass_user' => $this->pass_user), 
            array('id_user' => $this->session->userdata('id_user')));
    
    }

    public function delete($id) {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    public function cekLogin($username, $password) {
        $this->db->where('username_user', $username);
        $this->db->where('pass_user', md5($password));
        $query = $this->db->get('user');
        return $query->row_array();
    }

    private function _uploadImage() {
        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->session->userdata('id_user');
        $config['overwrite']			= true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
}