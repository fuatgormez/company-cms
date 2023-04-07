<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_team');
        $this->load->model(FRONTEND.'Model_portfolio');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
        $data['page_home'] = $this->Model_common->all_page_home();
		$data['page_team'] = $this->Model_common->all_page_team();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
        $data['page_contact'] = $this->Model_common->all_page_contact();
		$data['team_members'] = $this->Model_team->all_team_member();
		$data['portfolio_category'] = $this->Model_portfolio->get_portfolio_category();
		$data['portfolio'] = $this->Model_portfolio->get_portfolio_data();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view(FRONTEND.'header',$data);

		if($data['page_home']['home_team_status'] === 'Show') {
            $this->load->view(FRONTEND.'team',$data);
        } else {
            redirect(base_url(), 'refresh');
        }

		$this->load->view(FRONTEND.'footer',$data);
	}
}