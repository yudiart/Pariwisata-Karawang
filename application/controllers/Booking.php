<?php

class Booking extends CI_Controller{

	public function index(){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->model('Penginapan_model','pm');
		$data['pk'] = $this->pm->joinPenginapanKamar();
		$data['apk']= $this->pm->AllPenginapanKamar();
		$data['title'] = "Booking";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/booking',$data);
		$this->load->view('templates/administrator/footer',$data);

	}
	public function bform(){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		// Get Models
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();

		$kd_kamar = $this->uri->segment(3);
		$where= array('kd_kamar' => $kd_kamar);
		$this->load->model('Penginapan_model','pm');
		$data['_p'] = $this->pm->joinPenginapanKamar();
		$data['_pkd'] = $this->pm->joinPKID();
		$data['_pk'] = $this->pm->getKamar($where,'penginapan_kamar')->result();
	
		$data['title'] = "Edit Kamar";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('booking/booking_form',$data);
		$this->load->view('templates/administrator/footer',$data);
	}


	public function bookingDetails(){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		// Get Models
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		$kd_kamar = $this->uri->segment(3);
		$where= array('kd_kamar' => $kd_kamar);
		
		$this->load->model('Penginapan_model','pm');
		$data['_p'] = $this->pm->joinPenginapanKamar();
		$data['_pkd'] = $this->pm->joinPKID();
		$data['_pk'] = $this->pm->getKamar($where,'penginapan_kamar')->result();
		$data['_pks'] = $this->pm->getFasilitas($where,'penginapan_kamar_fasilitas');
		


		$data['title'] = "Booking Detail";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/booking_detail',$data);
		$this->load->view('templates/administrator/footer',$data);
		
	}
}