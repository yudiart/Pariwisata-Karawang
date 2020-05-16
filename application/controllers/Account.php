<?php 

class Account extends CI_Controller{
	

	public function login(){

		$data['title'] = "Login";


		$this->load->view('templates/auth_users/head',$data);
		$this->load->view('templates/auth_users/index',$data);

	}
}