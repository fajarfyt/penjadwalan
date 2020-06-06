<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (is_logged_in() == false) {
			redirect(base_url('index.php/'));
		}

		// $this->load->model('Auth/Auth_model', 'auth_model');
	}

	public function index()
	{	
		$this->load->helper('url');
		
		$get_user = $this->session->userdata('sess_auth');
		$data['user'] = $get_user['nama_user'];
		$data['title'] = 'Home | Import';
		$data['header'] = 'Import Data .CSV';
		$data['content'] = 'pages/Import/index';
		$this->load->view('templates/main', $data);
	}
}
