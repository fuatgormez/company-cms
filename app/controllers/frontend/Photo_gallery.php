<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_gallery extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_photo_gallery');
        $this->load->model(FRONTEND.'Model_portfolio');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_photo_gallery'] = $this->Model_common->all_page_photo_gallery();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
        $data['page_contact'] = $this->Model_common->all_page_contact();
		$data['photo_gallery'] = $this->Model_photo_gallery->all_photo();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view(FRONTEND.'header',$data);
		$this->load->view(FRONTEND.'photo_gallery',$data);
		$this->load->view(FRONTEND.'footer',$data);
	}
}
