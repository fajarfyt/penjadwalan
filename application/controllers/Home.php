<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (is_logged_in() == false) {
			redirect(base_url('/'));
		}

		$this->load->model('M_testing', 'test');
	}

	public function index()
	{	
		$this->load->helper('url');
		
		$get_user = $this->session->userdata('sess_auth');
		$data['user'] = $get_user['nama_user'];
		$data['title'] = 'MyApp | Home';
		$data['header'] = 'Schedules';
		$data['content'] = 'pages/Dashboard/index';
		$data['schedules'] = $this->test->get_data();
		$this->load->view('templates/main', $data);
	}
}
