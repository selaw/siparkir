<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('Parkir_model');
		$this->load->library('form_validation');

		if($this->session->userdata('level')!="Petugas"){
			redirect('auth');
		}
	} 

	public function index(){

		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
		 
		$this->load->view('petugas/index',$data);

	}
	//Parkir
	public function parkir(){
			$data['kode'] = $this->Parkir_model->kode();
			$data['jenis_kendaraan'] = $this->Parkir_model->getAllKen();
			$data['target'] = $this->Parkir_model->get_Target();
			$data['peralatan'] = $this->Parkir_model->getAllperalatan();
			$data['lokasi'] = $this->Parkir_model->get_Lokasi();
			$data['parkir'] = $this->Parkir_model->get_Parkir();

			$this->form_validation->set_rules('parkir','Parkir','required');
			$this->form_validation->set_rules('no_polisi','Parkir','required');
			$this->form_validation->set_rules('id_target','id_target','required|callback_check_default',[
			'check_default' => ' Pilih Jenis Target dengan benar!!!']);
			$this->form_validation->set_rules('id_peralatan', 'id_peralatan', 'required|callback_check_default',[
			'check_default' => ' Pilih Jenis Peralatan dengan benar!!!']);
			$this->form_validation->set_rules('id_jeniskendaraan', 'id_jeniskendaraan', 'required|callback_check_default',[
			'check_default' => ' Pilih Jenis Kendaraan dengan benar!!!']);
			$this->form_validation->set_rules('id_lokasi', 'id_lokasi', 'required|callback_check_default',[
			'check_default' => ' Pilih Lokasi dengan benar!!!']);
			if($this->form_validation->run() == FALSE) {
			
			$this->load->view('petugas/parkir', $data);
		} else {
			if(isset($_POST['save'])){
			   	 if($_POST['id_target']==1 && $_POST['id_jeniskendaraan']==1){
			        $_POST['retribusi']='4000';
			    }elseif ($_POST['id_target']==1 && $_POST['id_jeniskendaraan']==2) {
			        $_POST['retribusi']='3000';
			    }elseif ($_POST['id_target']==2 && $_POST['id_jeniskendaraan']==1) {
			        $_POST['retribusi']='3000';
			    }elseif ($_POST['id_target']==2 && $_POST['id_jeniskendaraan']==2) {
			        $_POST['retribusi']='2000';
			    }
			} 

			$this->Parkir_model->input_parkir();
			$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Tambah</b> :) </div>');
			redirect('admin/parkir');
		}
	}




}