<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model{


	public function getUserRole(){
		$uid = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$query ="SELECT `user_role`.`id`,
						`user_role`.`role`,
						`user`.`id`
				 FROM `user_role`
				 INNER JOIN `user`
				 ON `user`.`role_id` = `user_role`.`id`
				 WHERE `user`.`id` = $uid[id]
		";
		return $this->db->query($query)->result_array();
		
	}
}