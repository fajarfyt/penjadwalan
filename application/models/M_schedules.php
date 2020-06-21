<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_schedules extends CI_Model {

	var $table = 'training';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data() {
		$query = $this->db->query('
			SELECT * 
			FROM training
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
 
    public function delete($id)
    {
        $this->db->where('id_sch', $id);
        $this->db->delete($this->table);
    }

	public function insert_multiple($data){
		$this->db->insert_batch('training', $data);
	}
	
	public function get_crane()
	{
		$query = $this->db->query('
			SELECT * 
			FROM m_crane 
		');

		return $query->result();
	}

}