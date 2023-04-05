<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_testimonial');
        $this->load->model(FRONTEND.'Model_portfolio');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_testimonial'] = $this->Model_common->all_page_testimonial();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();

        $data['page_contact'] = $this->Model_common->all_page_contact();

		$data['testimonials'] = $this->Model_testimonial->all_testimonial();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view(FRONTEND.'header',$data);
		$this->load->view(FRONTEND.'testimonial',$data);
		$this->load->view(FRONTEND.'footer',$data);
	}
}