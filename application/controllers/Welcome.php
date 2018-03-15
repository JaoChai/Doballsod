<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('football_model', 'football');
	}

	public function index()
	{
		$data['result'] = $this->football->getall();
		$data['header'] = $this->football->getheader();
		$this->load->view('layouthome/header');
		$this->load->view('home/index', $data);
	   $this->load->view('layouthome/footer');
	}

	public function viewcontent($id){
		$data['content'] = $this->football->getcontent($id);
		$this->load->view('layouthome/header');
		$this->load->view('home/content', $data);
		$this->load->view('layouthome/footer');
	}

	public function viewlive(){
		$this->load->view('layouthome/header');
		$this->load->view('home/live');
	    $this->load->view('layouthome/footer');
	}
}
