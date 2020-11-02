<?php

class Home extends CI_Controller {

	function __construct()
	{ 
	 	parent::__construct();
	}

	public function index(){
		$this->load->view('createClass');
	}

	public function classList(){
		$this->load->view('classList');	
	}

	public function createStudent(){
		$this->load->view('createstudent');
	}

	public function studentList(){
		$this->load->view('studentList');	
	}

	public function uploadVideo(){
		$this->load->view('uploadVideo');	
	}

	public function videolList(){
		$this->load->view('videosList');

	}
}
