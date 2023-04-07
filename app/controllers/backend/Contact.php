<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_contact');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$data['contact_messages'] = $this->Model_contact->show();

		$this->load->view(BACKEND.'header',$data);
		$this->load->view(BACKEND.'contact/contact',$data);
		$this->load->view(BACKEND.'footer');
	}

	public function delete($id) 
	{
		// If there is no contact in this id, then redirect
    	$tot = $this->Model_contact->contact_check($id);
    	if(!$tot) {
    		redirect(base_url('backend/contact'));
    	}

        $this->Model_contact->delete($id);
        $success = 'Contact message is deleted successfully';
		$this->session->set_flashdata('success',$success);
        redirect(base_url('backend/contact'));
    }

}