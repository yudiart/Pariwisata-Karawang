<?php

class Wisata extends CI_Controller{
	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index(){
		$data['title'] = "Wisata";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('templates/administrator/footer',$data);
	}

	public function viewWisata($id){
		$data['title'] = "Wisata";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		
		$where = array('id' => $id);
		$this->load->model('');


		$data['role'] = $this->menu->getUserRole();

		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('templates/administrator/footer',$data);	
	}
}