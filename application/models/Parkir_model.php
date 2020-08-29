<?php

class Parkir_model extends CI_model{ 

	public function get_Parkir(){  

		return $query = $this->db->get('parkir')->result_array();
	}
	public function getAllKen(){

		return $query = $this->db->get('jenis_kendaraan')->result_array();
	}
	public function get_Lokasi(){  

		return $query = $this->db->get('lokasi')->result_array();
	}
	public function get_Target(){

		return $query = $this->db->get('target')->result_array();
	}
	public function getAllperalatan(){

		return $query = $this->db->get('peralatan')->result_array();
	}
	public function input_parkir($biaya){
		$data = [
			'no_parkir' => $this->input->post('no_parkir'),
			'no_polisi' => $this->input->post('no_polisi'),
			'tanggal' => $this->input->post('tanggal'),
			'id_jeniskendaraan' => $this->input->post('id_jeniskendaraan'),
			'id_target' => $this->input->post('id_target'),
		 	'id_peralatan' => $this->input->post('id_peralatan'),
		 	'id_lokasi' => $this->input->post('id_lokasi'),
		 	'retribusi' => $this->input->post('retribusi')
			];
			$this->db->insert('parkir', $data); 
	}
	public function kode(){

		  $this->db->select('RIGHT(parkir.no_parkir,2) as no_parkir', FALSE);
		  $this->db->order_by('no_parkir','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('parkir');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->no_parkir) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);    
			  $kodetampil = "PRK".$batas;  //format kode
			  return $kodetampil;  
	}
}