<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	// $expiration = time() - 7200; // Two hour limit
	private $expiration = 7200;

	function __construct()
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_contact');
        $this->load->model(FRONTEND.'Model_portfolio');
        $this->load->model(FRONTEND.'Model_captcha');

		$this->check_captcha();
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_contact'] = $this->Model_common->all_page_contact();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
        $data['page_contact'] = $this->Model_common->all_page_contact();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$data['captcha'] = $this->generate_captcha()['image'];

		$this->load->view(FRONTEND.'header',$data);
		$this->load->view(FRONTEND.'contact',$data);
		$this->load->view(FRONTEND.'footer',$data);
	}

	public function form()
	{

		$get_data = json_decode(file_get_contents('php://input'), true);

		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_contact'])) {

			$valid = 1;

			if($this->session->userdata('captchaword') !== $this->input->post('captcha')) {
				$error = "Captcha does not match!";
				$this->session->set_flashdata('error',$error);
				$this->remove_captcha_from_folder($this->session->userdata('captchafilename'));
				redirect(base_url('contact'));
			}

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			$this->form_validation->set_error_delimiters('', '<br>');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

		    if($valid == 1) {
				$data = array(
					'name' 		=> $this->input->post('name'),
					'phone' 	=> $this->input->post('phone'),
					'email' 	=> $this->input->post('email'),
					'subject'	=> $this->input->post('subject'),
					'message'	=> $this->input->post('message')
				);

				$this->Model_contact->insert($data);

				$msg = '
            		<h3>Sender Information</h3>
					<b>Name: </b> '.$this->input->post('name').'<br><br>
					<b>Phone: </b> '.$this->input->post('phone').'<br><br>
					<b>Email: </b> '.$this->input->post('email').'<br><br>
					<b>Subject: </b> '.$this->input->post('subject').'<br><br>
					<b>Message: </b> '.$this->input->post('message').'
				';
            	$this->load->library('email');

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($data['setting']['receive_email_to']);
				$this->email->reply_to($this->input->post('email'), $this->input->post('name'));
				$this->email->subject('Contact Form Email');
				$this->email->message($msg);
				$this->email->set_mailtype("html");
				$this->email->send();

				$this->remove_captcha_from_folder($this->session->userdata('captchafilename'));

		        $success = 'Thank you for sending the email. We will contact you shortly.';
        		$this->session->set_flashdata('success',$success);

		    } else {
        		$this->session->set_flashdata('error',$error);
		    }
			redirect(base_url('contact'));
        } else {
            redirect(base_url('contact'));
        }
	}

	public function generate_captcha()
	{
		$this->load->helper('captcha');

		$values = array(
			// 'word'          => 'Random word',
			'img_path'      => 'public/captcha/',
			'img_url'       => base_url('public/captcha'),
			// 'font_path'     => '/public/frontend/fonts/Niconne-Regular.ttf',
			'img_width'     => 150,
			'img_height'    => 40,
			'expiration'    => $this->expiration,
			'word_length'   => 8,
			'font_size'     => 26,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			// White background and border, black text and red grid
			'colors' => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			)
		);

		// $this->delete_captcha();
		$cap = create_captcha($values);
		$this->insert_captcha($cap);

		$this->session->set_userdata('captchafilename', $cap['filename']);
		$this->session->set_userdata('captchaword', $cap['word']);

		return $cap;
	}

	public function insert_captcha($cap)
	{
		$data = array(
			'captcha_time'  => $cap['time'],
			'filename'  	=> $cap['filename'],
			'ip_address'    => $this->input->ip_address(),
			'word'          => $cap['word']
		);

		return $this->Model_captcha->insert($data);
	}

	public function check_captcha()
	{
		// Then see if a captcha exists:
		foreach($this->Model_captcha->get_all() as $row) {
			$start_date = new DateTime($row->created_at);
			$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
			if($since_start->i > 5) {
				$this->delete_captcha($row->word);
				$this->remove_captcha_from_folder($row->filename);
			}
		}
		// echo $since_start->days.' days total';
		// echo $since_start->y.' years';
		// echo $since_start->m.' months';
		// echo $since_start->d.' days';
		// echo $since_start->h.' hours';
		// echo $since_start->i.' minutes';
		// echo $since_start->s.' seconds;
	}

	public function delete_captcha($captcha_word)
	{
		return $this->Model_captcha->delete($captcha_word);
	}

	public function empty_captcha_folder()
	{
		$path = 'public/captcha';

        $handle = opendir($path);
        while (($file = readdir($handle))!== FALSE) {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html') {
            @unlink($path.'/'.$file);
            }
        }
        closedir($handle);
	}

	public function remove_captcha_from_folder($filename)
	{
		return @unlink('public/captcha/'.$filename);
	}
	
	public function ajax_captcha()
	{
		header('Content-Type: application/json');
		exit(json_encode(array(
				'captcha' => $this->generate_captcha()['image'],
			 	'csrf_fg' => $this->security->get_csrf_hash() 
			))
		);
	}
}