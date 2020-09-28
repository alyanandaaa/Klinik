<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');


class Nurse extends CI_Controller

{
	function __construct()

	{

		parent::__construct();

		$this->load->database();

		/*cache control*/

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		$this->output->set_header('Pragma: no-cache');

		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	}

	

	/***Default function, redirects to login page if no nurse logged in yet***/

	public function index()

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($this->session->userdata('nurse_login') == 1)

			redirect(base_url() . 'index.php?nurse/dashboard', 'refresh');

	}

	

	/***nurse DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('nurse_dashboard');

		$this->load->view('index', $page_data);

	}


	/***Manage patients**/

	function manage_patient($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'create') {

			$data['name']                      = $this->input->post('name');

			$data['email']                     = $this->input->post('email');

			$data['address']                   = $this->input->post('address');

			$data['phone']                     = $this->input->post('phone');

			$data['sex']                       = $this->input->post('sex');

			$data['birth_date']                = $this->input->post('birth_date');

			$data['age']                       = $this->input->post('age');

			$data['blood_group']               = $this->input->post('blood_group');


			// $data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

			$this->db->insert('patient', $data);

			$this->email_model->account_opening_email('patient', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));

			redirect(base_url() . 'index.php?nurse/manage_patient', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['name']        = $this->input->post('name');

			$data['email']       = $this->input->post('email');

			$data['address']     = $this->input->post('address');

			$data['phone']       = $this->input->post('phone');

			$data['sex']         = $this->input->post('sex');

			$data['birth_date']  = $this->input->post('birth_date');

			$data['age']         = $this->input->post('age');

			$data['blood_group'] = $this->input->post('blood_group');

			

			$this->db->where('patient_id', $param3);

			$this->db->update('patient', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			redirect(base_url() . 'index.php?nurse/manage_patient', 'refresh');

			

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('patient', array(

				'patient_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('patient_id', $param2);

			$this->db->delete('patient');

			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));

			redirect(base_url() . 'index.php?nurse/manage_patient', 'refresh');

		}

		$page_data['page_name']  = 'manage_patient';

		$page_data['page_title'] = get_phrase('manage_patient');

		$page_data['patients']   = $this->db->get('patient')->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');

			$data['email']   = $this->input->post('email');

			$data['address'] = $this->input->post('address');

			$data['phone']   = $this->input->post('phone');

			

			$this->db->where('nurse_id', $this->session->userdata('nurse_id'));

			$this->db->update('nurse', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			redirect(base_url() . 'index.php?nurse/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('nurse', array(

				'nurse_id' => $this->session->userdata('nurse_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('nurse_id', $this->session->userdata('nurse_id'));

				$this->db->update('nurse', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			redirect(base_url() . 'index.php?nurse/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('nurse', array(

			'nurse_id' => $this->session->userdata('nurse_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

}

