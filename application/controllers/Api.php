<?php

class Api extends CI_Controller {

	function __construct(){ 
	 	parent::__construct();
	 	$this->load->helper(array('cookie','form','html','url','array','date','file','string'));
	 	$this->load->model('ApiModel');
	 	$this->load->library(array('form_validation'));
		header("Access-Control-Allow-Origin: *");
	    header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	    header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');
	}

	function createClass(){ 
	    $data = json_decode(file_get_contents('php://input'), true);
		$array = array();
		if(!empty($data)){
			$data = array(
			'code' => trim($data['code']),
			'name'  => trim($data['name']),
			'maximum_students'  => trim($data['maximum_students']),
			'status'  => trim($data['status']),
			'description'  => trim($data['description']),
			);
			$this->ApiModel->createObject($data,"class");
			$array = array(
			'status'  => 200,
			'message' => 'Class Created Successfully',
			);
		}
		else{
			$array = array(
			'status' => 400,
			'message' => 'Validation Error',
			);
		}
		echo json_encode($array, true);
	}

	function updateClass(){
		$data = json_decode(file_get_contents('php://input'), true);
		$array = array();
		if(!empty($data)){
			$record = array(
			'code' => trim($data['code']),
			'name'  => trim($data['name']),
			'maximum_students'  => trim($data['maximum_students']),
			'description'  => trim($data['description']),
			);
			$id = trim($data['record_id']);
			$this->ApiModel->updateObject($record,$id,"class");
			$array = array(
			'status'  => 200,
			);
		}
		else{
			$array = array(
			'status'    => 400,
			'name' => form_error('name'),
			'code' => form_error('code'),
			'maximum_students' => form_error('maximum_students')
			);
		}
		echo json_encode($array, true);
	}

	function getClass(){
		$array = array(
			'status' => 200,
			'classes' => $this->ApiModel->getObjects('class')
		);
		echo json_encode($array, true);
	}

	function createStudent(){ 
	    $data = json_decode(file_get_contents('php://input'), true);
		$array = array();
		if(!empty($data)){
			$data = array(
			'first_name' => trim($data['first_name']),
			'last_name'  => trim($data['last_name']),
			'class'  => trim($data['class']),
			'date_of_birth'  => trim($data['date_of_birth']),
			);
			$class = $this->ApiModel->getObject('class',trim($data['class']));
			if($class->status == 0){
				$this->ApiModel->createObject($data,"student");
				$count = $this->ApiModel->countObjects('student');
				if($count >= $class->maximum_students){
					$this->ApiModel->updateObjectField(trim($data['class']),'class','status','1');
				}

				$array = array(
				'status'  => 200,
				'message' => 'Student Created Successfully',
				);
			}else{

				$array = array(
				'status'  => 200,
				'message' => 'Class Limit Exceeded',
				);
			}
		}
		else{
			$array = array(
			'status' => 400,
			'message' => 'Validation Error',
			);
		}
		echo json_encode($array, true);
	}

	function getStudent(){
		$array = array(
			'status' => 200,
			'classes' => $this->ApiModel->getObjects('class'),
			'students' => $this->ApiModel->getStudents()
		);
		echo json_encode($array, true);
	}

	function updateStudent(){ 
	    $data = json_decode(file_get_contents('php://input'), true);
		$array = array();
		if(!empty($data)){
			$record = array(
			'first_name' => trim($data['first_name']),
			'last_name'  => trim($data['last_name']),
			'class'  => trim($data['class']),
			'date_of_birth'  => trim($data['date_of_birth']),
			);
			$this->ApiModel->updateObject($record,trim($data['record_id']),"student");
			$array = array(
			'status'  => 200,
			'message' => 'Student Updated Successfully',
			);
		}
		else{
			$array = array(
			'status' => 400,
			'message' => 'Validation Error',
			);
		}
		echo json_encode($array, true);
	}

	function getVideo(){
		$array = array(
			'status' => 200,
			'videos' => $this->ApiModel->getObjects('videos'),
		);
		echo json_encode($array, true);
	}

	function uploadVideo(){
	    //$data = json_decode(file_get_contents('php://input'), true);
		$configVideo['upload_path'] = './uploads/videos'; # check path is correct
		$configVideo['max_size'] = '102400';
		$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
		$configVideo['overwrite'] = FALSE;
		$configVideo['remove_spaces'] = TRUE;
		$configVideo['file_name'] = $_FILES["file"]["name"];

		$this->load->library('upload', $configVideo);
		$this->upload->initialize($configVideo);

		if (!$this->upload->do_upload('file')) # form input field attribute
		{
		    # Upload Failed
		    echo json_encode(array("status"=> 400, "message" => $this->upload->display_errors(),"data" => $_FILES['file']));
		}
		else
		{
		    # Upload Successfull
		    $url = 'uploads/videos/'.$_FILES["file"]["name"];
		    $set1 =  $this->ApiModel->createObject(array(
		    	"url"         => $url,
		    	"cover_url"   => $url,
		    	"title"       => $this->input->post('name'),
		    	"description" => $this->input->post('description'),
		    	"status"      => $this->input->post('status')
		    ),'videos');
		    echo json_encode(array("status"=> 200, "message" => "Video Uploaded Successfully"));
		}
	}

	function uploadVideoApi(){
		$video = base64_decode($this->input->post('file');
		$path ='./uploads/videos';
		$filename = $time.'.mp4';
		$res = file_put_contents($path.$filename,$getimages[$i]);
  		if($res){
  			 $url = 'uploads/videos/'.$filename;
		    $set1 =  $this->ApiModel->createObject(array(
		    	"url"         => $url,
		    	"cover_url"   => $url,
		    	"title"       => $this->input->post('name'),
		    	"description" => $this->input->post('description'),
		    	"status"      => $this->input->post('status')
		    ),'videos');
		    echo json_encode(array("status"=> 200, "message" => "Video Uploaded Successfully"));
  		}else{

		    echo json_encode(array("status"=> 400, "message" => error_get_last());
  		}
	}

}
