<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    private $check_session;

    function __construct()
    {
        parent::__construct();

        $this->load->model(BACKEND.'Model_common');
        $this->load->model(BACKEND.'Model_user');

        $this->load->helper("cookie");
        $this->check_session();
    }

    public function index(){
        $this->checkSession ? redirect(base_url(BACKEND.'dashboard')) : redirect(base_url(BACKEND.'account/logout'));
    }

    public function login()
    {
        $this->check_session ? redirect(base_url(BACKEND.'dashboard')) : null;
        $error = '';
        $data = array();

        if (isset($_POST['form1'])) {

            // Getting the form data
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            // Checking the username
            $un = $this->Model_user->check_username($username);

            if (!$un) {
                // exit('!un');
                $error = 'Username is wrong!';
                $this->session->set_flashdata('error', $error);
                redirect(base_url(BACKEND));
            } else {
                // When username found, checking the password
                $user_data = array(
                    'username' => $username,
                    'password' => sha1($password)
                );
                $pw = $this->Model_user->check_password($user_data);

                if (!$pw) {
                    // exit('!pw');
                    $error = 'Password is wrong!';
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url(BACKEND));
                } else if($pw['status'] === "Passive") {
                    // exit('passive');
                    $error = 'Your account has been deactivated!';
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url(BACKEND));
                } else {
                    $remember = $this->input->post("remember", true);
                    if ($remember == 1) {
                        $this->cookie->backend_login();
                    } else {
                        delete_cookie("remember");
                    }

                    // When username and password both are correct
                    $array = array(
                        'id' => $pw['id'],
                        'username' => $pw['username'],
                        'password' => $pw['password'],
                        'firstname' => $pw['firstname'],
                        'lastname' => $pw['lastname'],
                        'email' => $pw['email'],
                        'photo' => $pw['photo'],
                        'role' => $pw['role'],
                        'status' => $pw['status']
                    );

                    $this->session->set_userdata($array);
                    // var_dump($_SESSION);
                    // exit('correct');
                    redirect(base_url(BACKEND.'dashboard'));
                }
            }
        } else {
            return $this->load->view(BACKEND.'account/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return $this->load->view(BACKEND.'account/login');
    }

    public function profile(){
        !$this->check_session ? redirect(base_url(BACKEND.'account/logout')) : null;
        $data['profile'] = $this->Model_user->get_user_by_id($this->session->userdata('id'));

        $this->load->view(BACKEND.'header');
        $this->load->view(BACKEND.'account/profile',$data);
        $this->load->view(BACKEND.'footer');
    }

    public function profile_update(){
        !$this->check_session ? redirect(base_url(BACKEND.'account/logout')) : null;
        $valid = 1;
        $data['profile'] = $this->Model_user->getUserById($id);

        if($this->input->post()){
            $form_data = array(
                "firstname" => $this->input->post('firstname'),
                "lastname" => $this->input->post('lastname'),
                "email" => $this->input->post('email'),
                "phone" => $this->input->post('phone'),
                "address" => $this->input->post('address')
            );

            $this->input->post('password') ? $form_data['password'] = sha1($this->input->post('password')) : null;

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];


		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo for featured photo<br>';
		    }

		    if($valid == 1) {

		        $final_name = $data['profile']['username'].'-'.$id.'.'.$ext;
                unlink('./public/uploads/user/'.$data['profile']['photo']);
		        move_uploaded_file( $path_tmp, './public/uploads/user/'.$final_name );

		        $form_data['photo'] = $final_name;

		    }

            $this->Model_user->updateUser($id,$form_data);

            $this->session->set_flashdata('success', 'Your profile has been updated successfully!');
            redirect(base_url(BACKEND.'account/profile/'.$id));
        }


        $this->load->view(BACKEND.'header');
        $this->load->view(BACKEND.'profile_edit',$data);
        $this->load->view(BACKEND.'footer');
    }

    public function check_session(){
        if ($this->session->userdata('id')) {
            $this->check_session = true;
        } else {
            $this->check_session = false;
        }
    }

    public function Forget_password()
    {
        $error = '';
        $success = '';

        $this->load->model(BACKEND.'Model_forget_password');
        $data['setting'] = $this->Model_forget_password->get_setting_data();

        if(isset($_POST['form1'])) {

            $valid = 1;

            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            } else {
                $tot = $this->Model_forget_password->check_email($_POST['email']);
                if(!$tot) {
                    $valid = 0;
                    $error .= 'You email address is not found in our system.<br>';
                }    
            }
             

            if($valid == 1) {

                $token = sha1(rand());

                // Update Database
                $form_data = array(
                    'token' => $token
                );
                $this->Model_forget_password->update($_POST['email'],$form_data);
                
                // Send Email
                $msg = '<p>To reset your password, please <a href="'.base_url(BACKEND).'reset-password/index/'.$_POST['email'].'/'.$token.'">click here</a> and enter a new password';
                
                $this->load->library('email', $config);

                $this->email->from($data['setting']['send_email_from']);
                $this->email->to($_POST['email']);

                $subject = 'Password Reset';

                $this->email->subject($subject);
                $this->email->message($msg);

                $this->email->set_mailtype("html");

                $this->email->send();

                $success = 'An email is sent to your email address. Please follow instruction in there.';
                $this->session->set_flashdata('success',$success);
				redirect(base_url(BACKEND.'forget_password'));
            } else {
                $this->session->set_flashdata('error',$error);
				redirect(base_url(BACKEND.'forget_password'));
            }            
        } else {
            $this->load->view(BACKEND.'forget_password',$data);    
        }
        
    }

    public function Reset_password($email=0,$token=0)
    {
        $tot = $this->Model_reset_password->check_url($email,$token);
        if(!$tot) {
            redirect(base_url(BACKEND));
        }

        $error = '';
        $success = '';
        $this->load->model(BACKEND.'Model_reset_password');
        $data['setting'] = $this->Model_reset_password->get_setting_data();
        
        if(isset($_POST['form1'])) {
            $valid = 1;

            $this->form_validation->set_rules('new_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('re_password', 'Retype Password', 'trim|required|matches[new_password]');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error = validation_errors();
            }

            if($valid == 1) 
            {
                $form_data = array(
                    'password' => sha1($_POST['new_password']),
                    'token'    => ''
                );
                $this->Model_reset_password->update($email,$form_data);
                $success = 'Password is updated successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url(BACKEND.'account/reset_password_success'));
            } else {
                $this->session->set_flashdata('error',$error);
                $data['var1'] = $email;
                $data['var2'] = $token;
                $this->load->view(BACKEND.'reset_password',$data);
            }
        } else {
            $data['var1'] = $email;
            $data['var2'] = $token;
            $this->load->view(BACKEND.'account/reset_password',$data);
        }
    }

    public function Reset_password_success() 
    {
        $this->load->model(BACKEND.'Model_reset_password');
        $data['setting'] = $this->Model_reset_password->get_setting_data();
        $this->load->view(BACKEND.'account/reset_password_success',$data);
    }
}
