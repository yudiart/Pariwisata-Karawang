<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{


	public function getUserDetail(){
		$uid = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$query = "SELECT `user`.`id`,
						 `user_detail`.*
				  FROM `user`
				  INNER JOIN `user_detail`
				  ON `user`.`id` = `user_detail`.`user_id`
				  WHERE `user_detail`.`user_id` = $uid[id]
				  		";
		return $this->db->query($query)->result_array();
	}

	

	public function add(){
		
	}

	public function updatePassword(){
		
	}

	public function updateUserDetail(){
		$uid = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$data1 =
			[
				'jk'		=> htmlspecialchars($this->input->post('jk',true)),
				'alamat'	=> htmlspecialchars($this->input->post('alamat',true)),
				'no_hp'		=> htmlspecialchars($this->input->post('no_hp',true))
			];

		$this->db->set($data1);
		$this->db->where('user_id',$uid['id']);
		$this->db->update('user_detail');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Profile anda sudah di perbarui</div>');
		redirect('user/myProfile');

		
	}
	
}