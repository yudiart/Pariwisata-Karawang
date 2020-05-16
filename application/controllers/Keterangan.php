<?php 

class Keterangan extends CI_Controller{

	public function index(){

	}

	public function fasilitas(){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		// Get Models
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->model('Penginapan_model','pm');
		$data['_p'] = $this->pm->joinPenginapanKamar();
		$data['_pkd'] = $this->pm->joinPKID();
		
		$data['title'] = "Fasilitas";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('keterangan/fasilitas',$data);
		$this->load->view('templates/administrator/footer',$data);
	}
}