<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("UserModel");

        $this->load->model("NotifikasiModel");
        $this->load->helper('time');

        $this->NotifikasiModel->deleteOldNotif();

        $data['countnotif'] = $this->NotifikasiModel->notifCountUser($this->session->userdata('id_user'));
        $data['notif'] = $this->NotifikasiModel->getNotifUser($this->session->userdata('id_user'));
        
        $this->load->vars($data);
    }

	public function index() {
        if ($this->session->userdata('nama_user')) {
            redirect('Home');
        } else {
            $this->load->view('login');
        }
    }

    public function rules() {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required|callback_usernameCheck'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'telp',
            'label' => 'Telepon',
            'rules' => 'numeric'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|callback_emailCheck'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]'],

            ['field' => 'konfirm',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[password]'],
        ];
    }

    public function rulesUpdate() {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required|callback_usernameCheckUpdate'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'telp',
            'label' => 'Telepon',
            'rules' => 'numeric'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|callback_emailCheckUpdate']
        ];
    }

    public function rulesPassword() {
        return [
            ['field' => 'oldpass',
            'label' => 'Password Lama',
            'rules' => 'required|min_length[8]|callback_passwordCheckUpdate'],

            ['field' => 'newpass',
            'label' => 'Password Baru',
            'rules' => 'required|min_length[8]'],

            ['field' => 'konfirm',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[newpass]']
        ];
    }
    
    public function register() {
        $this->load->view('register');
    }

    public function add() {
        $user = $this->UserModel;
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        if ($validation->run()) {
            $user->create();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('User');
        } else {
            $this->session->set_flashdata('fail', 'Gagal disimpan');
            $this->load->view('register');
        }
        
    }

    public function usernameCheck($username) {
        $user = $this->UserModel;
        $check = $user->checkUsername($username);
        if (!empty($check)) {
            $this->form_validation->set_message("usernameCheck", "{field} already taken.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function usernameCheckUpdate($username) {
        $user = $this->UserModel;
        $check = $user->checkUsername($username);
        if (!empty($check)) {
            if ($this->session->userdata('username_user') == $check->username_user) {
                return TRUE;
            } else {
                $this->form_validation->set_message("usernameCheckUpdate", "{field} already taken.");
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

    public function emailCheck($email) {
        $user = $this->UserModel;
        $check = $user->checkEmail($email);
        if (!empty($check)) {
            $this->form_validation->set_message("emailCheck", "{field} already taken.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function emailCheckUpdate($email) {
        $user = $this->UserModel;
        $check = $user->checkEmail($email);
        if (!empty($check)) {
            if ($this->session->userdata('email_user') == $check->email_user) {
                return TRUE;
            } else {
                $this->form_validation->set_message("emailCheckUpdate", "{field} already taken.");
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

    public function passwordCheckUpdate($old) {
        $user = $this->UserModel;
        $check = $user->getById($this->session->userdata('id_user'));

        if (!empty($check)) {
            if ($check->pass_user == md5($old)) {
                return TRUE;
            } else {
                $this->form_validation->set_message("passwordCheckUpdate", "{field} did not match with current password.");
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

    public function login() {
        $user = $this->input->post('username'); 
        $pass = $this->input->post('password'); 

        $login = $this->UserModel->cekLogin($user, $pass);

        if (!empty($login)) { 
            // login berhasil
            $this->session->set_userdata($login);
            if ($this->session->userdata('is_admin') != null) {
                redirect('Dashboard/admin');
            } else {
                redirect('Home');
            }
        } else { 
            // login gagal
            $this->session->set_flashdata('fail', 'Username atau Password Salah!');
            redirect('User');
        }
    }

    public function profile() {
        if ($this->session->userdata('id_user')) {
            $data["user"] = $this->UserModel->getById($this->session->userdata('id_user'));
            $this->load->view('user/profile', $data);
            
        } else {
            $this->session->set_flashdata('fail', 'Anda harus melakukan login terlebih dahulu!');
            redirect('User');
        }
    }

    public function editProfile() {
        $user = $this->UserModel;
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesUpdate());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('User/profile');
        } else {
            $this->session->set_flashdata('fail', validation_errors());
            redirect('User/profile');
        }
    }

    public function editPassword() {
        $user = $this->UserModel;
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesPassword());

        if ($validation->run()) {
            $user->updatePassword();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('User/profile');
        } else {
            $this->session->set_flashdata('fail', validation_errors());
            redirect('User/profile');
        }
    }

    public function logout() {
		$this->session->sess_destroy();
		redirect('User');
	}
}
