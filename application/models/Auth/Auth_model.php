<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function cek_user($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
	    $query = $this->db->get('m_user');
	    return $query->row_array();
	}
}