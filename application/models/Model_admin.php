<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function add_journal($journal){
		$this->db->insert('library_journal', $journal);
		if($this->db->error()['code'] != 0){
			return $this->db->error()['message'];
		}
		return true;
	}
}