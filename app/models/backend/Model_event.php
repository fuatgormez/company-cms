<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_event extends CI_Model 
{

	public function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_event'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function show() {
        $sql = "SELECT * FROM tbl_event ORDER BY event_id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function add($data) {
        $this->db->insert('tbl_event',$data);
        return $this->db->insert_id();
    }

    public function update($id,$data) {
        $this->db->where('event_id',$id);
        $this->db->update('tbl_event',$data);
    }

    public function delete($id)
    {
        $this->db->where('event_id',$id);
        $this->db->delete('tbl_event');
    }

    public function getData($id)
    {
        $sql = 'SELECT * FROM tbl_event WHERE event_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function event_check($id)
    {
        $sql = 'SELECT * FROM tbl_event WHERE event_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
   
}