<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    private $filename = "import_data"; // Kita tentukan nama filenya

	public function __construct()
	{
		parent::__construct();
		if (is_logged_in() == false) {
			redirect(base_url('index.php/'));
		}

        $this->load->model('M_schedules', 'sch');
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
    
    public function process()
	{
		// if ( isset($_POST['import'])) {

            $file = $_FILES['userfile']['tmp_name'];
            $ekstensi  = explode('.', $_FILES['userfile']['name']);
            
			if (empty($file)) {
                echo 'File tidak boleh kosong!';
                
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["userfile"]["size"] > 0) {
                    $row = 1;
                    $i = 0;
                    if (($handle = fopen($file, "r")) !== FALSE) {
                        while (($file = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            $num = count($file);
                            $row++;
                            
                            for ($c=0; $c < $num; $c++) {
                                $ex_file[$i] = explode(";", $file[$c]);
                                if($i!=0){
                                    $data = [
                                        'tanggal' => date("Y-m-d", strtotime($ex_file[$i][0])),
                                        'hour_meter' => $ex_file[$i][1],
                                        'breakdown' => $ex_file[$i][2],
                                        'shutdown' => $ex_file[$i][3],
                                        'sparepart' => $ex_file[$i][4],
                                        'label' => $ex_file[$i][5],
                                    ];
                                    echo "<pre>";
                                    $this->sch->save($data);
                                }
                            }

                            $i++;
                        } 
                        fclose($handle);
                        redirect('index.php/import');
                    }
                } else {
					echo 'Format file tidak valid!';
				}
			}
        // }
	}
    
    
    
}
