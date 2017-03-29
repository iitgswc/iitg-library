<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_library extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function fetch_staff(){
		$query = $this->db->query('select * from library_staff join library_staff_groups on library_staff.staff_group_id = library_staff_groups.staff_group_id order by library_staff_groups.staff_group_order, library_staff.staff_order;');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result();
	}

	public function fetch_lac(){
		$query = $this->db->query('select * from library_lac join library_lac_groups on library_lac.lac_group_id = library_lac_groups.lac_group_id WHERE lac_archive_period = "current" order by library_lac_groups.lac_group_order, library_lac.lac_order;');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result();
	}

	public function fetch_lac_archive_list(){
		$query = $this->db->query('select distinct(lac_archive_period) from library_lac where lac_archive_period <> "current" AND lac_archive_period <> "NULL";');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result_array();
	}

	public function fetch_lac_archive($range){
		$query = $this->db->query('select * from library_lac join library_lac_groups on library_lac.lac_group_id = library_lac_groups.lac_group_id WHERE lac_archive_period = "'.$range.'" order by library_lac_groups.lac_group_order, library_lac.lac_order;');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result();
	}

	public function fetch_forms(){
		$query = $this->db->query('select * from library_form join library_form_groups on library_form.form_group_id = library_form_groups.form_group_id order by library_form_groups.form_group_order, library_form.form_order ;');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result();
	}

	public function fetch_latest(){
		$query = $this->db->query('select * from library_latest order by latest_order desc;');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result();
	}

	public function fetch_news(){
		$query = $this->db->query('select * from library_news order by news_order desc;');
		if($this->db->error()['code'] != 0){
			return show_error('Database error!');
		}
		return $query->result();
	}

	public function search_journals($keywords = "", $for_autocomplete = false){
		if($keywords == "") return array();

		// replace multiple spaces with single
		$keywords = preg_replace('!\s+!', ' ', $keywords);
		$keywords = str_replace('"', "", $keywords);
		$keywords = str_replace("'", "", $keywords);


		// replace space with wildcard
		// $keywords = str_replace(" ", "%", $keywords);
		// $keywords = "%".$keywords."%";
		$keywords = explode(" ",$keywords);
		$query_str = "";
		foreach($keywords as $keyword){
			$keyword = "%".$keyword."%";
			$query_str .= '( ';
			$query_str .= 'journal_title LIKE "'.$keyword.'" OR ';
			$query_str .= 'publisher LIKE "'.$keyword.'" OR ';
			$query_str .= 'dept_code LIKE "'.$keyword.'" OR ';
			$query_str .= 'issn_no LIKE "'.$keyword.'"';
			$query_str .= ') AND ';
		}
		$query_str = substr($query_str, 0, -4);

		if($for_autocomplete){
			$query = $this->db->query('select * from library_journal where '.$query_str.' order by journal_title LIMIT 100;');
			
			if($this->db->error()['code'] != 0){
				return show_error('Database error!');
			}
			$results = $query->result_array();
			$ret_data = array();

			foreach($results as $row){
				$temp_str = "";
				// $temp_str .= $row['journal_id']." - ";
				$temp_str .= $row['journal_title'];
				// if(isset($row['publisher']))
				// 	$temp_str .= " - ".$row['publisher'];
				// if(isset($row['issn_no']))
				// 	$temp_str .= " - ".$row['issn_no'];
				array_push($ret_data, $temp_str);
			}			
		}else{
			$query = $this->db->query('select * from library_journal where '.$query_str.' order by journal_title;');
			if($this->db->error()['code'] != 0){
				return show_error('Database error!');
			}
			$ret_data = $query->result_array();
		}
		return $ret_data;
	}
}