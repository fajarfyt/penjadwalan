<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;

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
		/**
		 * Input:
		 * - id_crane
		 * - tanggal
		 * - sparepart_name
		 * - hour_meter
		 * - breakdown
		 * - shutdown
		 * - bobot
		 * - deskripsi
		 * 
		 * Scheduler:
		 * - id_sch
		 * - tanggal
		 * - id_crane
		 * - deskripsi
		 * - label
		 * - sparepart_name
		 * - durasi (ringan ? 2 : 4)
		 */

		// Mengambil dataset training di database
		$dataset = $this->sch->get_data();
		
		// Mapping input mengikuti format features
		$new = [
			$this->input->post('hour_meter'),
			$this->input->post('breakdown'),
			$this->input->post('shutdown'),
			$this->input->post('bobot')
		];

		// Menjalankan perhitungan model SVM
		$result = $this->svm($dataset, $new);

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

		return redirect(base_url('/'));
	}
	
	private function svm($dataset, $new){
		// Mapping features
		$features = array_map(function($d){
			return [
				intval($d->hour_meter), 
				intval($d->breakdown), 
				intval($d->shutdown), 
				intval($d->sparepart) 
			];
		}, $dataset);

		// Mapping labels
		$labels = array_map(function($d){ return $d->label; }, $dataset);

		// Train
		$classifier = new SVC(Kernel::LINEAR, $cost = 1000);
		$classifier->train($features, $labels);

		// Predict
		$result = $classifier->predict($new);

		return $result;
	}

	private function kmeans($dataset){

	}
    
}
