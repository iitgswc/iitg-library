<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function add_journal($journal){

		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->db->insert('library_journal', $journal);
		
		$this->db->db_debug = $db_debug; //restore setting

		if($this->db->error()['code'] == 1452){
			return "1452";
		}else if($this->db->error()['code'] != 0){
			return $this->db->error()['message'];
		}
		
		return "success";
	}
}