<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_client extends CI_Model 
{

	public function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_client'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
    public function show() {
        $sql = "SELECT * FROM tbl_client ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function add($data) {
        $this->db->insert('tbl_client',$data);
        return $this->db->insert_id();
    }

    public function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_client',$data);
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_client');
    }

    public function get_client($id)
    {
        $sql = 'SELECT * FROM tbl_client WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function client_check($id)
    {
        $sql = 'SELECT * FROM tbl_client WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
    
}