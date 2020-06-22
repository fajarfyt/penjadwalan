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
            SELECT a.tanggal, a.berat, b.ringan 
            FROM (SELECT tanggal, count(label) as berat FROM scheduler WHERE label = "Berat" GROUP BY tanggal) as a,  
            (SELECT tanggal, count(label) as ringan FROM scheduler WHERE label = "Ringan" GROUP BY tanggal) as b 
            GROUP BY a.tanggal 
            ORDER BY a.tanggal ASC
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