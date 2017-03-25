<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function __construct(){
		parent::__construct();
		// $this->load->database();
		// $this->load->library(array('ion_auth','form_validation'));
		// $this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	public function index(){
		$this->data['page_title'] = "Dashboard";
		$this->data['css_files'] = NULL;
		$this->data['js_files'] = NULL;
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('admin/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->load->view('admin/admin_header', $this->data);
			// $this->_render_page('admin/index_', $this->data);
			$this->load->view('admin/index', $this->data);
			$this->load->view('admin/admin_footer');
		}
	}

	// log the user in
	public function login()
	{
		if ($this->ion_auth->logged_in()){
			redirect('admin/index' , 'refresh');
		}
		$this->data['title'] = $this->lang->line('login_heading');


		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/index', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			// $this->_render_page('admin/login', $this->data);
			$this->load->view('admin/login', $this->data);
		}
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/login', 'refresh');
	}

	public function manage_staff_groups(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_staff_groups');		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Staff Groups";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}
	
	public function manage_staff(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_staff');
		$crud->set_relation('staff_group_id', 'library_staff_groups', '{staff_group_id}-{staff_group_name}');
		$crud->display_as('staff_group_id' , 'Staff Group');
		$crud->set_field_upload('staff_image','resources/img/staff/');
		$crud->set_subject('Staff');
		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Staff";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_lac_groups(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_lac_groups');		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage LAC Groups";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_lac(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_lac');
		$crud->set_relation('lac_group_id', 'library_lac_groups', '{lac_group_id}-{lac_group_name}');
		$crud->display_as('lac_group_id' , 'LAC Group');
		$crud->order_by('lac_archive_period','desc','lac_group_id','asc');
		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage LAC";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_files(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_files');
		$crud->set_subject('File');
		$crud->set_field_upload('file_name','resources/uploads/');
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Files";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_latest(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_latest');
		$crud->set_subject('Item');
		$crud->display_as('latest_is_new' , 'Display as New?');
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Latest";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_news(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_news');
		$crud->set_subject('Item');
		$crud->display_as('news_is_new' , 'Display as New?');
		$output = (array)$crud->render();
		$output['page_title'] = "Manage News";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_form_groups(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_form_groups');		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Form Groups";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}
	
	public function manage_forms(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_form');
		$crud->set_relation('form_group_id', 'library_form_groups', '{form_group_id}-{form_group_name}');
		$crud->display_as('form_group_id' , 'Form Group');
		$crud->set_subject('Form');
		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Forms";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function manage_journals(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('library_journal');
		$crud->set_subject('Journal');
		
		$output = (array)$crud->render();
		$output['page_title'] = "Manage Journals";
		$output['bulk_upload'] = true;
		$output['error'] = "";

		$this->load->view('admin/admin_header', $output);
		$this->load->view('admin/crud_manage' , $output);
		$this->load->view('admin/admin_footer', $output);
	}

	public function bulk_upload_journals(){
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}
		$data['page_title'] = "Bulk Upload Details";
		$this->load->model('model_admin');

		if(! array_key_exists('journals_csv', $_FILES)) {
			$data['status'] = false;
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/bulk_upload_status',$data);
			$this->load->view('admin/admin_footer', $data);
		}else{
			$fileLocation = $_FILES['journals_csv']['tmp_name'];
			// $fileContent = file_get_contents($_FILES['journals_csv']['tmp_name']);

			$status = array();
			$total_success = 0;
			$total_failed = 0;
			$lineNo = 1;
			foreach(file($fileLocation) as $line) {
				// echo $line. "<br>";
				$line = explode(",",$line);
				if(count($line) != 7){
					$tmp['lineNo'] = $lineNo;
					$tmp['status'] = "unsuccessfull";
					$tmp['details'] = "Line does not contain 7 comma separated values.";
					$lineNo++;
					array_push($status, $tmp);
					$total_failed++;
					continue;
				}

				$journal = array(
						'journal_title'		=>	$line[0],
						'journal_url'		=>	$line[1],
						'publisher'			=>	$line[2],
						'publisher_url'		=>	$line[3],
						'format'			=>	$line[4],
						'issn_no'			=>	str_replace("|", "<br>", $line[5]),
						'availability'		=>	str_replace("|", "<br>", $line[6])
					);

				$retval = $this->model_admin->add_journal($journal);
				if($retval == true){
					$tmp['lineNo'] = $lineNo;
					$tmp['status'] = "inserted_successfully";
					$tmp['details'] = "";
					$total_success++;
				}else{
					$tmp['lineNo'] = $lineNo;
					$tmp['status'] = "unsuccessfull";
					$tmp['details'] = $retval;
					$total_failed++;
				}
				array_push($status, $tmp);
				$lineNo++;
			}
			// var_dump($status);
			$data['status'] = $status;
			$data['total_success'] = $total_success;
			$data['total_failed']  = $total_failed;
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/bulk_upload_status',$data);
			$this->load->view('admin/admin_footer', $data);
		}
	}




	// edit a user
	public function edit_user($id){
	if (!$this->ion_auth->logged_in()){
			redirect('admin/login' , 'refresh');
		}

		$this->data['page_title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('admin', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'email'    => $this->input->post('email'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}



				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

			// check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('admin', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('admin', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('email', $user->email),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		// $this->_render_page('auth/edit_user', $this->data);
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/edit_user', $this->data);
		$this->load->view('admin/admin_footer', $this->data);
	}



	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}
