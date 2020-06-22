<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load PHP-ML library
require_once __DIR__ . '/../../vendor/autoload.php';

// Load KMeans library
use Phpml\Clustering\Kmeans;

class Testing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (is_logged_in() == false) {
			redirect(base_url('/'));
		}

        $this->load->model('M_schedules', 'sch');
        $this->load->model('M_testing', 'testing');
	}

	public function index()
	{	
		$this->load->helper('url');
		$data['crane'] = $this->sch->get_crane();
		$get_user = $this->session->userdata('sess_auth');
		$data['user'] = $get_user['nama_user'];
		$data['title'] = 'Home | Testing';
		$data['header'] = 'Testing';
		$data['content'] = 'pages/Testing/index';
		$this->load->view('templates/main', $data);
    }
    
    public function add()
    {
		// Mengambil dataset training di database
		$dataset = $this->sch->get_data();
		
		// Mapping input mengikuti format features
		$new = [
			intval($this->input->post('hour_meter')),
			intval($this->input->post('breakdown')),
			intval($this->input->post('shutdown')),
			intval($this->input->post('bobot'))
		];

		/** K-Means Clustering */
		$result = $this->kmeans($dataset, $new);

		// Menyimpan hasil SVM ke tabel schedule
		$schedule = [
			'tanggal' => $this->input->post('tanggal'),
			'id_crane' => $this->input->post('id_crane'),
			'deskripsi' => $this->input->post('deskripsi'),
			'label' => $result,
			'sparepart_name' => $this->input->post('sparepart_name'),
			'durasi' => $result == 'Ringan' ? 2 : 4
		];

		$this->testing->save($schedule);

		// Menyimpan input ke dataset training di database
		$new_training = [
			'tanggal' => $this->input->post('tanggal'),
			'hour_meter' => $this->input->post('hour_meter'),
			'breakdown' => $this->input->post('breakdown'),
			'shutdown' => $this->input->post('shutdown'),
			'sparepart' => $this->input->post('bobot'),
			'label' => $result
		];

		$this->sch->save($new_training);

		$get_user = $this->session->userdata('sess_auth');
		
		$data['schedule'] = $schedule;
		$this->load->view('print', $data);
	}

	private function kmeans($dataset, $new){
		// Mapping features
		$features = [];

		foreach ($dataset as $key => $value) {
			$features["data-$key"] = [
				intval($value->hour_meter), 
				intval($value->breakdown), 
				intval($value->shutdown), 
				intval($value->sparepart) 
			];
		}

		// Push data baru ke dataset features
		$new_data_key = "data-".count($features);
		$features[$new_data_key] = $new;

		// Cluster
		$kmeans = new KMeans(2);
		$result = $kmeans->cluster($features);

		/**
		 * Karena K-means disini hanya membagi dataset menjadi 2 cluster dan tidak ada keterangan label (berat/ringan),
		 * maka dapat diakali dengan cara mencocokkan label dari dataset pada database.
		 * Dari sini akan diambil beberapa sample data untuk kemudian dilakukan pencocokan label.
		 * Dan karena pada satu cluster dapat memungkinkan memiliki 2 macam label, maka diambil yang paling banyak atau major.
		 * 
		 * Untuk banyaknya sample data, dianjurkan untuk dinaikkan nilainya jika jumlah data training banyak.
		 */
		$cluster_key = 0;
		$samples = 3;

		$filters = array_slice(
						array_map(function($f){
							return "(hour_meter = {$f[0]} and breakdown = {$f[1]} and shutdown = {$f[2]} and sparepart = {$f[3]})";
						}, $result[$cluster_key]), 
					0, $samples);
		
		$str_filters = implode(' or ', $filters);

		/**
		 * Query penentu label terdapat pada model M_testing pada function bernama getLabel().
		 * Setelah label pada satu cluster diketahui, maka cluster yang lain sudah pasti label oposisinya.
		 */
		$label = $this->testing->getLabel($str_filters, $samples);
		$alt_label = $label == 'Berat' ? 'Ringan' : 'Berat';

		// Memasukkan semua data ke satu array. Setiap data akan ditambahkan label masing-masing.
		$final = [];

		foreach ($result as $index => $data) {
			foreach ($data as $key => $d) {
				$d['label'] = $index == $cluster_key ? $label : $alt_label;

				$final[$key] = $d;
			}
		}

		// Mengembalikan label dari data baru saja.
		return $final[$new_data_key]['label'];
	}
    
}
