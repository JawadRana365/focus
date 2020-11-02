<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ApiModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    function createObject($class,$tableName){
    	$this->db->insert($tableName,$class);
        return $this->db->insert_id();
    }

    function updateObject($classes,$id,$tableName){
    	$this->db->where('id',$id)->update($tableName,$classes);
    }

    function getObjects($tableName){
    	return $this->db->select('*')->get($tableName)->result();
    }

    function getObject($tableName,$id){
        return $this->db->select('*')->where('id',$id)->get($tableName)->row();
    }

    function updateObjectField($id,$tableName,$columnName,$value){
        $this->db->set($columnName,$value)->where('id',$id)->update($tableName);
    }

    function getStudents(){
        return $this->db->select('student.*,class.name')->join('class','class.id = student.class')->get('student')->result();
    }

    function countObjects($tableName){
        return $this->db->get($tableName)->num_rows();
    }
}