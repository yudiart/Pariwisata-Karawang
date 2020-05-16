<?php

class Karyawan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}
	public function index(){
		$data['title'] = "Karyawan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('templates/users/index',$data);
		$this->load->view('templates/administrator/footer',$data);



	}
}