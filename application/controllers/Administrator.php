<?php

class Administrator extends CI_Controller{


	public function __construct(){
		parent::__construct();
		is_logged_in();
	}
	public function index(){
		$data['title'] = "Administrator";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();


		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		
		$this->load->view('templates/administrator/footer',$data);

	}
	public function dashboard(){
		$data['title'] = "Administrator";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();


		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		
		$this->load->view('templates/administrator/footer',$data);

	}

	public function pariwisata(){
		$data['title'] = "Pariwisata";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();


		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		
		$this->load->view('templates/administrator/footer',$data);		
	}

	public function penginapan(){
		$data['title'] = "Penginapan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();


		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		
		$this->load->view('templates/administrator/footer',$data);		
	}

}