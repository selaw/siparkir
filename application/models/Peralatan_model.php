<?php

class Peralatan_model extends CI_model{ 


	public function getTarget(){

		return $query = $this->db->get('target')->result_array();

	}

	public function getAllperalatan(){
		return $query = $this->db->get('peralatan')->result_array();

	}
	public function input_peralatan(){

			$data = [
			'id_peralatan' => $this->input->post('id_peralatan'),
		 	'id_target' => $this->input->post('id_target'),
		 	'peralatan' => $this->input->post('peralatan')
			];
			$this->db->insert('peralatan', $data); 
	}
	public function kode(){

		  $this->db->select('RIGHT(peralatan.id_peralatan,2) as id_peralatan', FALSE);
		  $this->db->order_by('id_peralatan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('peralatan');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->id_peralatan) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "PLR".$batas;  //format kode
			  return $kodetampil;  
	}

}