<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_schedules extends CI_Model {

	var $table = 'schedules_a';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data() {
		$query = $this->db->query('
			SELECT * 
			FROM schedules_a 
		');

		return $query->result();
	}

	public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_sch',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

	public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id_sch', $id);
        $this->db->delete($this->table);
    }

   	public function get_crane() 
   	{
		$query = $this->db->query('
			SELECT * 
			FROM m_crane 
		');

		return $query->result();
	}

	public function get_crane_check($id, $tgl) 
   	{
		$query = $this->db->query('
			SELECT * 
			FROM schedules_a 
			WHERE (id_crane = $id AND date_sch = $tgl) 
		');

		return $query->result();
	}

	public function get_row($id) 
   	{
		$this->db->from($this->table);
        $this->db->where('id_sch',$id);
        $query = $this->db->get();
 
		return $query->row();
	}

	// -------------- D E T A I L ----------------------- //

	public function get_data_dtl() {
		$query = $this->db->query('
			SELECT * 
			FROM schedules_b 
		');

		return $query->result();
	}

	public function get_by_id_dtl($id)
    {
        $this->db->from('schedules_b');
        $this->db->where('id_sch',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

	public function save_dtl($data)
    {
        $this->db->insert('schedules_b', $data);
        return $this->db->insert_id();
    }
 
    public function update_dtl($where, $data)
    {
        $this->db->update('schedules_b', $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id_dtl($id)
    {
        $this->db->where('id_sch_dtl', $id);
        $this->db->delete($this->table);
    }

    public function get_kapal()
    {
    	$query = $this->db->query('
			SELECT * 
			FROM m_kapal  
		');

		return $query->result();
    }

    public function get_shift()
    {
    	$query = $this->db->query('
			SELECT * 
			FROM m_shift 
		');

		return $query->result();
    }

    public function get_status()
    {
    	$query = $this->db->query('
			SELECT * 
			FROM m_status 
		');

		return $query->result();
    }
}