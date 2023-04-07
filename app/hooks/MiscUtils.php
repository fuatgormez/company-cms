<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//There cannot be a file with the same name in the hooks folder and the library folder.
//hooks folder is loaded first 
class MiscUtils{
    private $_CI;
    private $settings;
    public function __construct()
    {

        $this->_CI =& get_instance();

        $this->_CI->load->library('settings');
        $this->_CI->settings->index();

    }
    public function start_cache()
    {
        // if($this->_CI->uri->segment(1) !== 'backend')
        //     $this->_CI->output->cache(60);
    }

    public function check_class()
    {

        $router = load_class(APPPATH.'controllers/'.FRONTEND.'Home', 'test');
        $controller = $this->_CI->router->class;
        // $controller = $router->fetch_class();
        $method     = $router->fetch_method();

        // if($controller!='auth')
        // {
        //     echo $this->CI->userdata('admin_id');
        // }
    }
}