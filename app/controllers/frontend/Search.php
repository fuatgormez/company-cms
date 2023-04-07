<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_search');
        $this->load->model(FRONTEND.'Model_portfolio');
    }

	public function index() {

		$data['setting'] = $this->Model_common->all_setting();
		$data['page_home'] = $this->Model_common->all_page_home();
		$data['page_search']= $this->Model_common->all_page_search();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
        $data['page_contact'] = $this->Model_common->all_page_contact();
		$data['portfolio_footer'] 	= $this->Model_portfolio->get_portfolio_data();

		$error2 = '';

		if(isset($_POST['search_string'])) {

			$data['search_string'] = $this->input->post('search_string');
			$data['result'] = $this->Model_search->search($this->input->post('search_string'));
			$data['total'] = $this->Model_search->search_total($this->input->post('search_string'));

			$this->load->view(FRONTEND.'header',$data);
			$this->load->view(FRONTEND.'search',$data);
			$this->load->view(FRONTEND.'footer',$data);

		} else {
			redirect(base_url());
		}

	}
}