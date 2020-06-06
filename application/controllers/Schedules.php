<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {

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
		$data['title'] = 'MyApp | Schedules';
		$data['header'] = 'Schedules';
		$data['content'] = 'pages/Schedules/index';
		$data['crane'] = $this->sch->get_crane();
		// var_dump($data['crane']); die();
		$this->load->view('templates/main', $data);
	}

	public function ajax_list()
	{
		$list = $this->sch->get_data();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            $row[] =   '<div class="dropright">
                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-cog"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit('."'".$d->id_sch."'".')">Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="hapus('."'".$d->id_sch."'".')">Delete</a>
                            <a class="dropdown-item" href="javascript:void(0)" >View Note</a>
                          </div>
                        </div>';

            $row[] = $d->id_crane;
            $row[] = $d->date_sch;
            $row[] = $d->ehrm;
            $row[] = $d->ohrm;
            $row[] = $d->tangki_bawah;
            $row[] = $d->tangki_atas;
            $row[] = '<a class="btn btn-outline-primary" href="javascript:void(0)" onclick="detail('."'".$d->id_sch."'".')"> Detail</a>';

            $data[] = $row;
        }

        $output = array(
            'data' => $data
        );

        echo json_encode($output);
	}

	public function ajax_add()
    {
        $this->_validate();
        $data = array(
            'id_crane' => $this->input->post('id_crane'),
            'date_sch' => $this->input->post('date_sch'),
            'ehrm' => $this->input->post('ehrm'),
            'ohrm' => $this->input->post('ohrm'),
            'tangki_bawah' => $this->input->post('tangki_bawah'),
            'tangki_atas' => $this->input->post('tangki_atas'),
        );

        $insert = $this->sch->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->sch->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'id_crane' => $this->input->post('id_crane'),
            'date_sch' => $this->input->post('date_sch'),
            'ehrm' => $this->input->post('ehrm'),
            'ohrm' => $this->input->post('ohrm'),
            'tangki_bawah' => $this->input->post('tangki_bawah'),
            'tangki_atas' => $this->input->post('tangki_atas'),
        );
        $this->sch->update(array('id_sch' => $this->input->post('id_sch')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->sch->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['notiferror'] = array();
        $data['status'] = TRUE;

        $prefix = '<p class="ock-tag text-left">
                    <small class="block-area danger">';
        $suffix = '</small</p>';

        $get_data = $this->sch->get_data();
        $check = true;
        foreach ($get_data as $k) {
           if ($this->input->post('id_crane') == $k->id_crane && 
               $this->input->post('date_sch') == $k->date_sch ) 
           {
               $check = false;
           }
        }
 
        if($this->input->post('id_crane') == '')
        {   
            $error = 'Pilih Unit';
            $data['inputerror'][] = 'id_crane';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }
        
        if(!$check)
        {
            $error = 'Unit Exist Pada Tanggal '.$this->input->post('date_sch');
            $data['inputerror'][] = 'id_crane';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }

        if($this->input->post('date_sch') == '')
        {
            $error = 'Tanggal Kosong';
            $data['inputerror'][] = 'date_sch';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }
 
        if($this->input->post('ehrm') == '')
        {
            $error = 'EHRM Kosong';
            $data['inputerror'][] = 'ehrm';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }
 
        if($this->input->post('ohrm') == '')
        {
            $error = 'OHRM Kosong';
            $data['inputerror'][] = 'ohrm';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tangki_bawah') == '')
        {
            $error = 'Tangki Bawah Kosong';
            $data['inputerror'][] = 'tangki_bawah';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }

        if($this->input->post('tangki_atas') == '')
        {
            $error = 'Tangki Atas Kosong';
            $data['inputerror'][] = 'tangki_atas';
            $data['notiferror'][] = $prefix . $error . $suffix;
            $data['error_string'][] = $error;
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    // ------------------------------------------ D E T A I L --------------------------------------- //

    public function index_dtl($id)
    {   
        $this->load->helper('url');
        // var_dump($id); die();
        $data['tgl'] = $this->sch->get_row($id)->date_sch;
        $data['unit'] = $this->sch->get_row($id)->id_crane;
        $data['kapal'] = $this->sch->get_kapal();
        $data['shift'] = $this->sch->get_shift();
        $data['status'] = $this->sch->get_status();
        $get_user = $this->session->userdata('sess_auth');
        $data['user'] = $get_user['nama_user'];
        $data['title'] = 'Schedules | Shift';
        $data['header'] = 'Schedules Detail';
        $data['content'] = 'pages/Schedules/index_dtl';
        $data['crane'] = $this->sch->get_crane();
       
        $this->load->view('templates/main', $data);
    }

    public function ajax_list_dtl()
    {
        // $list = $this->sch->get_data_dtl();
        $data = array();
        // foreach ($list as $d) {
            $row = array();

            $row[] =   '<div>
                            <br><span class="font-weight-bold">SHIFT : I (07:00)</span>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-outline-danger"> Edit</a>
                            <a class="btn btn-sm btn-outline-danger"> Delete</a>
                        </div>';

            $row[] =    '<div>
                            <span class="text-muted">Tanggal : </span> <br>
                            <span class="font-weight-bold">2020-05-20</span>
                        </div>
                        <div>
                            <span class="text-muted">Unit : </span> <br>
                            <span class="font-weight-bold">CC#01 - Crane #01</span>
                        </div>';

            $row[] =    '<div>
                            <span class="text-muted">Kapal : </span> <br>
                            <span class="font-weight-bold">Ferry</span>
                        </div>
                        <div>
                            <span class="text-muted">Status</span> <br>
                            <span class="font-weight-bold">PRO123 - DLH Medan</span>
                        </div>';


            $data[] = $row;
        // }

        $output = array(
            'data' => $data
        );

        echo json_encode($output);
    }
}
