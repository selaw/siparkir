<?php

class Target_model extends CI_model{ 

	public function getAllTarget(){
		return $query = $this->db->get('target')->result_array();

	}
	public function input_target(){

		$data = [
		 	'target' => htmlspecialchars($this->input->post('target', TRUE))
		];
		$this->db->insert('target', $data);  
	}

}