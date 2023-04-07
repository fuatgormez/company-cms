<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_captcha extends CI_Model
{
    function insert($data) {
        $this->db->insert('tbl_captcha',$data);
        return $this->db->insert_id();
    }

    function delete($captcha_word)
    {
        $this->db->where('word = ', $captcha_word);
		$this->db->delete('tbl_captcha');
    }

    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("tbl_captcha");
        $query = $this->db->get();
        return $query->result();
    }
}