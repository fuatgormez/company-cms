<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_member extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model(FRONTEND.'Model_common');
        $this->load->model(FRONTEND.'Model_team_member');
        $this->load->model(FRONTEND.'Model_portfolio');
    }

    public function index()
	{
		redirect(base_url());
	}

	public function view($id=0)
	{
		if( !isset($id) || !is_numeric($id) ) {
			redirect(base_url());
		}

		$tot = $this->Model_team_member->team_member_check($id);
		if(!$tot) {
			redirect(base_url());
		}

		$data['setting'] = $this->Model_common->all_setting();
        $data['page_home'] = $this->Model_common->all_page_home();
		$data['page_team'] = $this->Model_common->all_page_team();
		$data['comment'] = $this->Model_common->all_comment();
		$data['socials'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
        $data['page_contact'] = $this->Model_common->all_page_contact();
		$data['team_members'] = $this->Model_team_member->all_team_member();
		$data['member'] = $this->Model_team_member->team_member_detail($id);
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();
		$data['id'] = $id;

		$this->load->view(FRONTEND.'header',$data);

		if($data['page_home']['home_team_status'] === 'Show')
        {
            $this->load->view(FRONTEND.'team_member',$data);
        }else{
            redirect('/', 'refresh');
        }

		$this->load->view(FRONTEND.'footer');
	}
}