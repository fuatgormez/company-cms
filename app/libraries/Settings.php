<?php
class Settings{
    private $_CI;
    private $settings;
    public function __construct()
    {
        $this->_CI =& get_instance();
        $this->_CI->load->model(BACKEND.'Model_setting');
        $this->settings = $this->_CI->Model_setting->show();
        $this->check_status();
    }

    public function index(){
        
    }

    public function check_status()
    {
        if($this->settings['status'] === 'Passive'){
            exit($this->_CI->load->view(
                MAINTENANCE.'index',
                array('settings' => $this->settings),
                TRUE)
            );
        }
    }
}