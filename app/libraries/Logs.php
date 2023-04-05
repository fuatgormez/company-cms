<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs {
    public function clear_all_log() {
        $CI =& get_instance();
        // $path = $CI->config->item('log_path');

        $log_path = APPPATH.'logs/';

        $handle = opendir($log_path);
        while (($file = readdir($handle))!== FALSE) 
        {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html')
            {
            @unlink($log_path.'/'.$file);
            }
        }
        closedir($handle);
    }
}