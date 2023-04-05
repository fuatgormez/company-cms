<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Social_media extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model(BACKEND.'Model_common');
        $this->load->model(BACKEND.'Model_social_media');


		// $this->Model_common->drop_column('tbl_social','test1');
		// $this->Model_common->add_column('tbl_social','test1','varchar',255);
		// exit;
    }

	public function index()
	{
       	$data['setting'] = $this->Model_common->get_setting_data();
		$error = '';
		$success = '';

		if(isset($_POST['form1']))
		{
			$this->Model_social_media->update('Facebook',array('social_url'    => $this->input->post('facebook')));
			$this->Model_social_media->update('Twitter',array('social_url'     => $this->input->post('twitter')));
			$this->Model_social_media->update('LinkedIn',array('social_url'    => $this->input->post('linkedin')));
			$this->Model_social_media->update('Google Plus',array('social_url' => $this->input->post('googleplus')));
			$this->Model_social_media->update('Pinterest',array('social_url'   => $this->input->post('pinterest')));
			$this->Model_social_media->update('Youtube',array('social_url'     => $this->input->post('youtube')));
			$this->Model_social_media->update('Instagram',array('social_url'   => $this->input->post('instagram')));
			$this->Model_social_media->update('Tumblr',array('social_url'      => $this->input->post('tumblr')));
			$this->Model_social_media->update('Flickr',array('social_url'      => $this->input->post('flickr')));
			$this->Model_social_media->update('Reddit',array('social_url'      => $this->input->post('reddit')));
			$this->Model_social_media->update('Snapchat',array('social_url'    => $this->input->post('snapchat')));
			$this->Model_social_media->update('WhatsApp',array('social_url'    => $this->input->post('whatsapp')));
			$this->Model_social_media->update('Quora',array('social_url'       => $this->input->post('quora')));
			$this->Model_social_media->update('StumbleUpon',array('social_url' => $this->input->post('stumbleupon')));
			$this->Model_social_media->update('Delicious',array('social_url'   => $this->input->post('delicious')));
			$this->Model_social_media->update('Digg',array('social_url'        => $this->input->post('digg')));

			$success = 'Social Media is updated successfully';
			$this->session->set_flashdata('success',$success);
			$form_data[] = 	array('csrf_fg' => $this->security->get_csrf_hash(), 'responseMessage'=> $success );

            exit(json_encode($form_data));
           
		} else {
			$data['social'] = $this->Model_social_media->show();
	       	$this->load->view(BACKEND.'header',$data);
			$this->load->view(BACKEND.'social/social_media',$data);
			$this->load->view(BACKEND.'footer');
		}

	}


}