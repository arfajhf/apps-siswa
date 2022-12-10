<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matpel_Model extends CI_Model {

	
	public function get_data($table)
	{
        return $this->db->get($table);

	}
public function insert_data($data,$table){
	$this->db->insert($table,$data);
}
public function update_data($data,$table){
	$this->db->where('id_matpel',$data['id_matpel']);
	$this->db->update($table,$data);

}

public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}