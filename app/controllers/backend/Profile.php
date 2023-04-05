<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model(BACKEND.'Model_common');
        $this->load->model(BACKEND.'Model_profile');
    }
	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$this->load->view(BACKEND.'header',$data);
		$this->load->view(BACKEND.'account/profile',$data);
		$this->load->view(BACKEND.'footer');
		
	}
	public function update()
	{
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->get_setting_data();

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error = validation_errors();
            }

            if($valid == 1) {
	            $form_data = array(
					'email'     => $_POST['email']
	            );
	        	$this->Model_profile->update($form_data);
	        	$success = 'Profile Information is updated successfully!';
	        	
	        	$this->session->set_userdata($form_data);
	        	$this->session->set_flashdata('success',$success);
	        	
				$form_data[] = 	array_push($form_data, array('csrf_fg' => $this->security->get_csrf_hash(), 'responseMessage'=> $success ));
				exit(json_encode($form_data));
            }
            else {
            	$this->session->set_flashdata('error',$error);
	        	redirect(base_url(BACKEND.'profile'));
            }
		}

		if(isset($_POST['form2'])) {
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $data['error'] = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $data['error'] = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/profile/'.$this->session->userdata('photo'));

		    	// updating the data
		    	$final_name = 'user-'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/profile/'.$final_name );
		    			        
				$form_data = array(
					'photo' => $final_name
	            );
	        	$this->Model_profile->update($form_data);
	        	$success = 'Photo is updated successfully!';

	        	$this->session->set_userdata($form_data);
	        	$this->session->set_flashdata('success',$success);
	        	redirect(base_url(BACKEND.'profile'));
		    }
		    else {
		    	$this->session->set_flashdata('error',$error);
	        	redirect(base_url(BACKEND.'profile'));
		    }
		}

		if(isset($_POST['form3'])) {
			$valid = 1;

		    $this->form_validation->set_rules('password', 'Password', 'trim|required');
		    $this->form_validation->set_rules('re_password', 'Retype Password', 'trim|required|matches[password]');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error = validation_errors();
            }

		    if($valid == 1) {

		    	$form_data = array(
					'password' => md5($_POST['password'])
	            );
	        	$this->Model_profile->update($form_data);
	        	$success = 'Password is updated successfully!';
	        	
	        	$this->session->set_userdata($form_data);
	        	$this->session->set_flashdata('success',$success);
	        	redirect(base_url(BACKEND.'profile'));
		    }
		    else {
		    	$this->session->set_flashdata('error',$error);
	        	redirect(base_url(BACKEND.'profile'));
		    }
		}

		$data['setting'] = $this->Model_common->get_setting_data();

		$this->load->view(BACKEND.'header',$data);
		$this->load->view(BACKEND.'account/profile',$data);
		$this->load->view(BACKEND.'footer');
	}
	
}
