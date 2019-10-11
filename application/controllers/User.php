<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->library('form_validation');
    }

	public function index() {
		$this->load->view('login');
    }
    
    public function register() {
        $this->load->view('register');
    }
}
