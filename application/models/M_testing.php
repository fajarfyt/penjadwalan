<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_testing extends CI_Model {

	private $table = 'scheduler';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_data() {
		$query = $this->db->query('
			SELECT * 
			FROM scheduler 
		');

		return $query->result();
    }
    
    public function get_grafik() {
		$query = $this->db->query('
            SELECT tanggal, count(case when label = 'Berat' then label end) Berat, count(case when label = 'Ringan' then label end) Ringan
            FROM scheduler
            GROUP BY tanggal
            ORDER BY tanggal ASC
		');

		return $query->result();
	}

    public function getLabel($filters, $samples){
        /**
         * Proses query dimulai dari nesting paling dalam
         * 1. Ambil data label dengan kriteria fitur sample, limit data sebanyak n-data
         * 2. Hitung jumlah banyaknya data per label
         * 3. Ambil label dengan jumlah data terbanyak
         */
        return $this->db->query("
            select label
            from (
                select label, count(1) counts
                from (
                    select label
                    from training
                    where $filters
                    limit $samples
                ) a
                group by 1
            ) z
            group by 1
            having max(counts)
        ")->row()->label;
    }
}