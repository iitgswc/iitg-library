<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public $title = "Lakshminath Bezbaroa Central Library";

	public function index(){

		$data['title'] = $this->title;
		$data['template_navbar'] = $this->load->view('templates/navbar', $data, TRUE);
		$data['template_header'] = $this->load->view('templates/header', $data, TRUE);
		$data['template_footer'] = $this->load->view('templates/footer', $data, TRUE);

		// fetch latest
		$this->load->model('model_library');
		$data['latest_items'] = $this->model_library->fetch_latest();
		$data['news_items'] = $this->model_library->fetch_news();

		$this->load->view('homepage',$data);
	}

	public function menusource(){
		echo $this->load->view('templates/menusource', NULL, TRUE);
	}

	public function staff(){
		$this->load->model('model_library');
		$result = $this->model_library->fetch_staff();
		$opdata = array();
		
		// var_dump($result);

		foreach($result as $staff){
			if(!array_key_exists( $staff->staff_group_name, $opdata)){
				$opdata[$staff->staff_group_name] = array();
			}
			array_push($opdata[$staff->staff_group_name]	,(array)$staff);
		}

		// var_dump($opdata);
		$data['staff_data'] = $opdata;

		$this->load->view('staff' , $data);
	}

	public function lac($flag = NULL, $range = NULL){
		$this->load->model('model_library');

		if($flag == "archive"){

			if($range == NULL){
				// display ranges
				$data['lac_data'] = array();

				$result = $this->model_library->fetch_lac_archive_list();
				
				$data['lac_archive_ranges'] = $result;

			}else{
				$tmp = explode("-", $range);
				if(count($tmp) != 2) {
					show_404();
					// show_error("Invalid range");
				}else if($tmp[0] == "" || $tmp[1] == ""){
					show_404();
				}else if( ((int)$tmp[0] < 1995 || (int)$tmp[0] > (int)date("Y")) || ((int)$tmp[1] < 1995 || (int)$tmp[1] > (int)date("Y")) ) {
					show_404();
				}

				$result = $this->model_library->fetch_lac_archive($range);

				if(empty($result)){
					show_404();
				}

				$opdata = array();
				
				foreach($result as $lac){
					if(!array_key_exists( $lac->lac_group_name, $opdata)){
						$opdata[$lac->lac_group_name] = array();
					}
					array_push($opdata[$lac->lac_group_name]	,(array)$lac);
				}

				$data['range'] = $range;
				$data['lac_data'] = $opdata;
			}

		}
		else{
			$result = $this->model_library->fetch_lac();
			$opdata = array();
			
			foreach($result as $lac){
				if(!array_key_exists( $lac->lac_group_name, $opdata)){
					$opdata[$lac->lac_group_name] = array();
				}
				array_push($opdata[$lac->lac_group_name]	,(array)$lac);
			}

			$data['lac_data'] = $opdata;
		}

		$this->load->view('lac' , $data);
	}

	public function forms(){
		$this->load->model('model_library');
		$result = $this->model_library->fetch_forms();
		$opdata = array();

		foreach($result as $form){
			if(!array_key_exists( $form->form_group_name, $opdata)){
				$opdata[$form->form_group_name] = array();
			}
			array_push($opdata[$form->form_group_name]	,(array)$form);
		}

		$data['form_data'] = $opdata;

		$this->load->view('forms' , $data);
	}

	public function search(){
		$data['search_results'] = NULL;

		$keywords = $this->input->post('journal_search');
		
		if(!isset($keywords) || $keywords == ""){
			$this->load->view('search' , $data);
			return;			
		}

		$this->load->model('model_library');

		$results = $this->model_library->search_journals($keywords);
		$data['search_results'] = $results;
		$this->load->view('search' , $data);
	}

	public function search_auto_complete(){
		
		$this->load->model('model_library');

		// I know this is bad! But jquery-ui auto-complete leaves us no choice. We'll perform sanition in the model.
		$keywords = $_GET['term'];

		$results = $this->model_library->search_journals($keywords, true);
		echo json_encode($results);
	}
}
