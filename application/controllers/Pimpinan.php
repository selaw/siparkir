<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('form_validation');

		if($this->session->userdata('level')!="Pimpinan"){
			redirect('auth');
		}
	} 

	public function index(){

		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
		 
		$this->load->view('pimpinan/index',$data);

	}
	public function laporan(){
		$this->load->view('pimpinan/laporan');
	}


}