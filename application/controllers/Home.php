<?php

class Home extends CI_Controller{

	public function index(){

		$this->load->model('Penginapan_model','pm');
		$data['pk'] = $this->pm->joinPenginapanKamar();
		$data['apk']= $this->pm->AllPenginapanKamar();

		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		
		$data['title']="Wisata Yuk";
		$this->load->view('templates/home/head',$data);
		$this->load->view('templates/home/topbar',$data);
		$this->load->view('home/jumbotron',$data);
		$this->load->view('templates/home/content',$data);
		$this->load->view('templates/home/body',$data);
		$this->load->view('templates/home/footer',$data);
	}

}