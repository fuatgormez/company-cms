<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_pricing');
        $this->load->model(FRONTEND.'Model_portfolio');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_pricing'] = $this->Model_common->all_page_pricing();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
        $data['page_contact'] = $this->Model_common->all_page_contact();
		$data['pricing'] = $this->Model_pricing->all_pricing();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view(FRONTEND.'header',$data);
		$this->load->view(FRONTEND.'pricing',$data);
		$this->load->view(FRONTEND.'footer',$data);
	}
}