<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('Jenis_kenmodel');
		$this->load->model('Target_model');
		$this->load->model('Peralatan_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Parkir_model');
		$this->load->library('form_validation');

		if($this->session->userdata('level')!="Admin") { 
			redirect('auth');
		}
	} 

	public function index(){

		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
		 
		$this->load->view('admin/index',$data);

	}
	//Jenis Kendaran
	public function jenis_kendaraan(){
		$data['jenis_kendaraan'] = $this->Jenis_kenmodel->getAllKen();
		$this->load->view('admin/jenis_kendaraan', $data);
	}
	public function input_jenis(){
			$this->form_validation->set_rules('jenis_kendaraan','Jenis Kendaraan','required');
			if($this->form_validation->run() == FALSE) {
	
			$this->load->view('admin/jenis_kendaraan', $data);
		} else {

			$this->Jenis_kenmodel->input_jenis();
			$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Update</b> :) </div>');
			redirect('admin/jenis_kendaraan');
		}

	}
	//Jenis Parkir
	public function jenis_parkir(){
		$data['target'] = $this->Target_model->getAllTarget();
		$this->load->view('admin/jenis_parkir', $data);
	}
	public function input_target(){
			$this->form_validation->set_rules('target','Jenis Parkir','required');
			if($this->form_validation->run() == FALSE) {
	
			$this->load->view('admin/jenis_parkir', $data);
		} else {

			$this->Target_model->input_target();
			$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Tambah</b> :) </div>');
			redirect('admin/jenis_parkir');
		}
	}
	//Peralatan
	public function peralatan1(){
		

		$this->load->view('admin/peralatan', $data);
	}
	public function peralatan(){
				$data['kode'] = $this->Peralatan_model->kode();
				$data['target'] = $this->Peralatan_model->getTarget();
				$data['peralatan'] = $this->Peralatan_model->getAllperalatan();

			$this->form_validation->set_rules('peralatan','Jenis Peralatan','required');
			$this->form_validation->set_rules('id_target', 'id_target', 'required|callback_check_default',[
			'check_default' => ' Pilih Jenis Parkir dengan benar!!!']);
			if($this->form_validation->run() == FALSE) {
			
			$this->load->view('admin/peralatan', $data);
		} else {

			$this->Peralatan_model->input_peralatan();
			$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Tambah</b> :) </div>');
			redirect('admin/peralatan');
		}
	}


	// LOKASI
	public function get_alat(){
		$id = $this->input->post('id_target');
		$data = $this->Lokasi_model->get_Peralatan($id);
		echo json_decode($data);

	}
	public function lokasi(){

			$data['kode'] = $this->Lokasi_model->kode();
			$data['target'] = $this->Lokasi_model->get_Target();
			$data['peralatan'] = $this->Lokasi_model->get_Peralatan();
			$data['lokasi'] = $this->Lokasi_model->getLokasi();

			$this->load->view('admin/lokasi', $data);

	}
	public function input_lokasi(){

			$data['kode'] = $this->Lokasi_model->kode();
			$data['target'] = $this->Lokasi_model->get_Target();
			$data['peralatan'] = $this->Lokasi_model->get_Peralatan();
			$data['lokasi'] = $this->Lokasi_model->getLokasi();

			$this->form_validation->set_rules('lokasi','Lokasi','required|trim');
			$this->form_validation->set_rules('id_target','id_target','required|callback_check_default',[
			'check_default' => ' Pilih Jenis Target dengan benar!!!']);
			$this->form_validation->set_rules('id_peralatan', 'id_peralatan', 'required|callback_check_default',[
			'check_default' => ' Pilih Jenis Peralatan dengan benar!!!']);
			if($this->form_validation->run() == FALSE) {
			
			$this->load->view('admin/lokasi', $data);
		} else {

			$this->Lokasi_model->input_lokasi();
			$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Tambah</b> :) </div>');
			redirect('admin/lokasi');
		}
	}
		public	function indx(){
		$x['data']=$this->m_kategori->get_kategori();
		$this->load->view('v_kategori',$x);
	}

	public function get_subkategori(){
		$id=$this->input->post('id');
		$data=$this->m_kategori->get_subkategori($id);
		echo json_encode($data);
	}

	//Parkir
	public function parkir1(){

		

		$this->load->view('admin/parkir', $data);
	}
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
			
			$this->load->view('admin/parkir', $data);
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

	//Laporan
	public function laporan(){
		$this->load->view('admin/laporan');
	}

	//USER
	public function user($offset=0){
		//$data['user'] = $this->User_model->getAllUser();
		//$this->load->view('admin/user',$data);

		$data_user = $this->db->get("user");

		$config['total_rows']= $data_user->num_rows();
		$config['base_url'] = base_url('admin/user');
		$config['per_page']= 3;
		//Konfigurasi tabelnya
		$config['full_tag_open']=" <ul class='pagination mb-0'>";
		$config['full_tag_close']="</ul>";
		$config['num_tag_open']="<li class='page-link'>";
		$config['num_tag_close']="</li>";
		$config['cur_tag_open']="&nbsp;<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close']="<span class='sr-only'>(current)</span></a></li> &nbsp;";
		$config['next_tag_open']="&nbsp;<li class='page-link'>";
		$config['next_tag_close']="</li>&nbsp;&nbsp;";
		$config['prev_tag_open']="&nbsp;<li class='page-link'>"; 
		$config['prev_tag_close']="</li>&nbsp;&nbsp;";
		$config['first_tag_open']="&nbsp;<li class='page-link'>";
		$config['first_tag_close']="</li>";
		$config['last_tag_open']="&nbsp;<li class='page-link'>";
		$config['last_tag_close']="</li>";

		$this->pagination->initialize($config);

		$data['halaman']= $this->pagination->create_links();
		$data['offset']= $offset;

		$data['data']= $this->User_model->getUser($config['per_page'], $offset);
		$this->load->view('admin/user',$data);

	}

	public function hapus_user($id){
			$this->User_model->hapusUser($id);
			$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Hapus</b> :) </div>');
			redirect('admin/user');
	}

	public function user_edit($id){

			$data['user'] = $this->User_model->getUserById($id);
			$data['is_active'] = [0,1];
			$data['level'] = ['Petugas','Pimpinan','Admin'];

			$this->form_validation->set_rules('name','Nama','required');
			$this->form_validation->set_rules('email','Email','required|trim|valid_email');

			if($this->form_validation->run() == FALSE) {
	
			$this->load->view('admin/user_edit', $data);
		}else {
			 $this->User_model->user_ubah();
			 $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"> Data berhasil di <b>Update</b> :) </div>');
			redirect('admin/user');
			}
	}

}