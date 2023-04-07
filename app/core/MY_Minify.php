<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Minify extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $content = base_url('public/frontend/css/style.css');
        exit('amk');
        $this->minify($content);
    }


    public function minify($content, $path = '') {
        $output = preg_replace(
              array(
                '/ {2,}/',
                '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
              ), 
              array(
                ' ',
                ''
              ), 
              $content
            );
        exit($output);
      }
}