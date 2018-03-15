<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Backend extends CI_Controller {
	public function __construct() {
			 parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
{
 // Allow some methods?
 $allowed = array(
		 'viewleague',
		 'viewtablefootball',
		 'viewch',
		 'updateleague',
		 'updatefootball',
		 'updatech'
 );
 if ( in_array($this->router->fetch_method(), $allowed))
 {
		 redirect('backend/index');
 }
}
	$this->load->model('league_model', 'league');
	$this->load->model('channel_model', 'ch');
	$this->load->model('football_model', 'football');
	}
	public function index()
  {
    $this->load->view('layoutbackend/header');
    $this->load->view('backend/index');
    $this->load->view('layoutbackend/footer');
	}

	public function login(){
		$this->load->model("login_model", "login_db");

	$this->form_validation->set_rules('username', 'Username', 'required|trim');
	$this->form_validation->set_rules('password', 'Password', 'required|trim');
	if($this->form_validation->run() == FALSE){
		if(isset($this->session->userdata['logged_in'])){
			redirect('backend/viewleague');
		}else{
			$this->session->set_flashdata('error_mess', '<p class="text-danger"> Username or Password is Required. </p>');
			redirect('backend/index');
		}
	}else{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$result = $this->login_db->login($data);
		//login Successfully
		if($result == TRUE){
			$username = $this->input->post('username');
			$result = $this->login_db->get_data($username);
			if($result != FALSE){
				$session_data = array(
					'id' => $result[0]->admin_id,
					'username' => $result[0]->admin_username
				);
				//Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				redirect('backend/viewleague');
			}
		}else{
			$this->session->set_flashdata('error_mess',  'Invalid login credentials.');
			redirect('backend/index');
		}
	}
}

	public function logout(){
		$sess_array = array(
			'id' => '',
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('backend/index');
	}
  /* View Backend */
  public function viewmanage(){
    $this->load->view('layoutbackend/header');
    $this->load->view('layoutbackend/navbar');
    $this->load->view('backend/manage');
    $this->load->view('layoutbackend/footer');
  }

	public function viewleague(){
		$data['result'] = $this->league->getall();
		$this->load->view('layoutbackend/header');
		$this->load->view('layoutbackend/navbar');
		$this->load->view('backend/league', $data);
		$this->load->view('layoutbackend/footer');
	}

	public function viewtablefootball(){
		$data['league'] = $this->football->getleague();
		$data['ch'] = $this->football->getch();
		$data['result'] = $this->football->getall();
		$this->load->view('layoutbackend/header');
		$this->load->view('layoutbackend/navbar');
		$this->load->view('backend/football', $data);
		$this->load->view('layoutbackend/footer');
	}

	public function viewch(){
		$data['result'] = $this->ch->getall();
		$this->load->view('layoutbackend/header');
		$this->load->view('layoutbackend/navbar');
		$this->load->view('backend/ch', $data);
		$this->load->view('layoutbackend/footer');
	}

  /* Crud viewleague */

	public function createleague(){
	$this->form_validation->set_rules('league', '<b>ลีก</b>', 'required');
	$this->form_validation->set_message('required', 'กรุณากรอก %s');
	if($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('alert', '<div class="alert alert-danger">' . validation_errors() . '</div>');
		redirect('backend/viewleague');
	}else{
		date_default_timezone_set('Asia/Bangkok');
		$data = array(
			'lea_name' => $this->input->post('league'),
			'lea_date' => Date('Y-m-d H:i:s')
		);
		$this->league->insert($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success"> Insert League Successfully </div>');
		redirect('backend/viewleague');
	}
}

	public function updateleague($id){
		$this->form_validation->set_rules('league', '<b>ลีก</b>', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		if($this->form_validation->run() == FALSE){
			$data['result'] = $this->league->getedit($id);
			//$this->session->set_flashdata('alert', '<div class="alert alert-danger">' . validation_errors() . '</div>');
			$this->load->view('layoutbackend/header');
			$this->load->view('layoutbackend/navbar');
			$this->load->view('backend/edit_league', $data);
			$this->load->view('layoutbackend/footer');
		}else{
			date_default_timezone_set('Asia/Bangkok');
			$data = array(
				'lea_name' => $this->input->post('league'),
				'lea_date' => Date('Y-m-d H:i:s')
			);
			$this->league->update($id, $data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"> Updated League Successfully </div>');
			redirect('backend/viewleague');
		}
	}

	public function deleteleague($id){
		$this->db->where('lea_id', $id)->delete('league');
		$this->session->set_flashdata('alert', '<div class="alert alert-success"> Deleted League Successfully </div>');
		redirect('backend/viewleague');
	}

	/* Crud viewfooball */

	public function createfootball()
	{
		$this->form_validation->set_rules('league', '<b>ชื่อลีก</b>', 'required');
		$this->form_validation->set_rules('ch', '<b>ลิ้งค์ช่อง</b>', 'required');
		$this->form_validation->set_rules('time', '<b>เวลาแข่ง</b>', 'required');
		$this->form_validation->set_rules('team1', '<b>ทีม 1</b>', 'required');
		$this->form_validation->set_rules('team2', '<b>ทีม 2</b>', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">' . validation_errors() . '</div>');
			redirect('backend/viewtablefootball');
		}else{
			date_default_timezone_set('Asia/Bangkok');
			$data = array(
				'table_time' => $this->input->post('time'),
				'table_team1' => $this->input->post('team1'),
				'table_team2' => $this->input->post('team2'),
				'table_date' => Date('Y-m-d H:i:s'),
				'lea_id' => $this->input->post('league'),
				'ch_id' => $this->input->post('ch')
			);
			$this->football->insert($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"> Insert League Successfully </div>');
			redirect('backend/viewtablefootball');
		}
	}

	public function updatefootball($id){
		$this->form_validation->set_rules('league', '<b>ชื่อลีก</b>', 'required');
		$this->form_validation->set_rules('ch', '<b>ลิ้งค์ช่อง</b>', 'required');
		$this->form_validation->set_rules('time', '<b>เวลาแข่ง</b>', 'required');
		$this->form_validation->set_rules('team1', '<b>ทีม 1</b>', 'required');
		$this->form_validation->set_rules('team2', '<b>ทีม 2</b>', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		if($this->form_validation->run() == FALSE){
			$data['league'] = $this->football->getleague();
			$data['ch'] = $this->football->getch();
			$data['result'] = $this->football->getedit($id);
			$this->load->view('layoutbackend/header');
			$this->load->view('layoutbackend/navbar');
			$this->load->view('backend/edit_table', $data);
			$this->load->view('layoutbackend/footer');
		}else{
			date_default_timezone_set('Asia/Bangkok');
			$data = array(
				'table_time' => $this->input->post('time'),
				'table_team1' => $this->input->post('team1'),
				'table_team2' => $this->input->post('team2'),
				'table_date' => Date('Y-m-d H:i:s'),
				'lea_id' => $this->input->post('league'),
				'ch_id' => $this->input->post('ch')
			);
			$this->football->update($id, $data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"> Updated League Successfully </div>');
			redirect('backend/viewtablefootball');
		}
	}

	public function deletefootball($id){
		$this->db->where('table_id', $id)->delete('table_league');
		$this->session->set_flashdata('alert', '<div class="alert alert-success"> Deleted League Successfully </div>');
		redirect('backend/viewtablefootball');
	}


	/* Crud viewch */

	public function createch(){
		$this->form_validation->set_rules('ch_name', '<b>ชื่อช่อง</b>', 'required');
		$this->form_validation->set_rules('ch_url', '<b>ลิ้งค์ช่อง</b>', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">' . validation_errors() . '</div>');
			redirect('backend/viewch');
		}else{
			date_default_timezone_set('Asia/Bangkok');
			$data = array(
				'ch_name' => $this->input->post('ch_name'),
				'ch_url' => $this->input->post('ch_url'),
				'ch_date' => Date('Y-m-d H:i:s')
			);
			$this->ch->insert($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"> Insert Channel Successfully </div>');
			redirect('backend/viewch');
		}
	}

	public function updatech($id){
		$this->form_validation->set_rules('ch_name', '<b>ชื่อช่อง</b>', 'required');
		$this->form_validation->set_rules('ch_url', '<b>ลิ้งค์ช่อง</b>', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		if($this->form_validation->run() == FALSE){
			$data['result'] = $this->ch->getedit($id);
			$this->load->view('layoutbackend/header');
			$this->load->view('layoutbackend/navbar');
			$this->load->view('backend/edit_ch', $data);
			$this->load->view('layoutbackend/footer');
		}else{
			date_default_timezone_set('Asia/Bangkok');
			$data = array(
				'ch_name' => $this->input->post('ch_name'),
				'ch_url' => $this->input->post('ch_url'),
				'ch_date' => Date('Y-m-d H:i:s')
			);
			$this->ch->update($id, $data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"> Updated Channel Successfully </div>');
			redirect('backend/viewch');
		}
	}

	public function deletech($id){
		$this->db->where('ch_id', $id)->delete('channel');
		$this->session->set_flashdata('alert', '<div class="alert alert-success"> Deleted Channel Successfully </div>');
		redirect('backend/viewch');
	}

}
