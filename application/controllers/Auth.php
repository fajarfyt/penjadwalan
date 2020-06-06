<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth/Auth_model', 'auth_model');
	}

	public function index()
	{
		if (is_logged_in()) {
			redirect(base_url('index.php/home'));
		}
		return $this->load->view('pages/Auth/v_login');
	}

	public function login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		// die($user.' + '.$pass);

		$login = $this->auth_model->cek_user($user, $pass);
		// var_dump($login);die();
		if (!empty($login)) {
			$this->session->set_userdata('sess_auth', $login);
			redirect(base_url('index.php/home'));
		} else {
			$this->session->set_flashdata('gagal', 'Username atau Password Salah');
			redirect(base_url('index.php/'));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/'));
	}
}
