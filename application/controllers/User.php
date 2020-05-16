<?php 

class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index(){
		$data['title'] = "Profile";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();

		if  ($_uid['user_id']){
			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('templates/users/profile',$data);
			$this->load->view('templates/administrator/footer',$data);
			
		}else{
			$data['title'] = "Lengkapi Profile";

 			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('templates/users/lengkapiProfile',$data);
			$this->load->view('templates/administrator/footer',$data);						
		}


	}

	public function myProfile(){
		$data['title'] = "Profile";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();

		if  ($_uid['user_id']){
			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('templates/users/profile',$data);
			$this->load->view('templates/administrator/footer',$data);
			
		}else{
			$this->lengkapiProfile();	
		}


	}

	public function editprofile(){
		$data['title'] = "Edit Profile";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();	
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();

		if  ($_uid['user_id']){
			$this->form_validation->set_rules('firstname','Firstname','required|trim');
			$this->form_validation->set_rules('lastname','Lastname','required|trim');
			$this->form_validation->set_rules('jk','Jk','required|trim');
			$this->form_validation->set_rules('alamat','Alamat','required|trim');
			$this->form_validation->set_rules('no_hp','No_hp','required|trim');

			if ($this->form_validation->run()==false) {
				$this->load->view('templates/administrator/head',$data);
				$this->load->view('templates/administrator/topbar',$data);
				$this->load->view('templates/administrator/sidebar',$data);
				$this->load->view('templates/users/editprofile',$data);
				$this->load->view('templates/administrator/footer',$data);	
			}else{
				$data = [
					'jk'		=> htmlspecialchars($this->input->post('jk',true)),
					'alamat' 	=> htmlspecialchars($this->input->post('alamat',true)),
					'no_hp' 	=> htmlspecialchars($this->input->post('no_hp',true))
				];
				$data2 = [
					'firstname'	=> htmlspecialchars($this->input->post('firstname',true)),
					'lastname'	=> htmlspecialchars($this->input->post('lastname',true))
				];

				$this->db->where('user_id',$user['id']);
				$this->db->update('user_detail',$data);

				$this->db->where('id',$user['id']);
				$this->db->update('user',$data2);
				$path = './assets/image/users/';
				$config['upload_path']          = $path;
			    $config['allowed_types']        = 'gif|jpg|png|jpeg';
			    $config['max_size']             = 1024; // 1MB
			    $config['file_name']			= 'profile-'.substr(md5(rand()),0,12);

			    // buat upload gambar di table user
			    $this->load->library('upload', $config);
				if (@$_FILES['image_profile']['name']!= null) {
					if ($this->upload->do_upload('image_profile')) {
						$user = $this->db->get_where('user',['email' => 
						$this->session->userdata('email')])->row_array();	
						$old_image = $user['image'];

						if ($old_image != 'default.jpg') {
							@unlink(FCPATH . $path.$old_image);
							$post2['image'] = $this->upload->data('file_name');
							$this->db->where('id',$user['id']);
							$this->db->update('user',$post2);
							redirect('User/myProfile');
						}
					
					}else{
						echo ' eror';
					}
				}
				redirect('User/myProfile');
			}
		}else{
								
		}

	}

	private function updateUserDetail(){
		
	}

	public function lengkapiProfile(){


		$data['title'] = "Lengkapi Profile";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();

		$this->form_validation->set_rules('userid','Userid','required|trim');
		$this->form_validation->set_rules('jk','Jk','required|trim');
		// |is_unique[user.email] setelah ada formnya
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		$this->form_validation->set_rules('no_hp','No_hp','required|trim');

		if ($this->form_validation->run()==false) {
			
			$data['title'] = "Lengkapi Profile";

 			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('templates/users/lengkapiProfile',$data);
			$this->load->view('templates/administrator/footer',$data);


		}else{
			$data1 =
			[
				'user_id'	=> $this->input->post('userid',true),
				'jk'		=> htmlspecialchars($this->input->post('jk',true)),
				'alamat'	=> htmlspecialchars($this->input->post('alamat',true)),
				'no_hp'		=> htmlspecialchars($this->input->post('no_hp',true))
			];
			$this->db->insert('user_detail',$data1);
			$config['upload_path']          = './assets/image/users/';
		    $config['allowed_types']        = 'gif|jpg|png|jpeg';
		    $config['max_size']             = 1024; // 1MB
		    $config['file_name']			= 'profile-'.substr(md5(rand()),0,12);

		    // buat upload gambar di table user
		    $this->load->library('upload', $config);
			if (@$_FILES['image_profile']['name']!= null) {
				if ($this->upload->do_upload('image_profile')) {
					$post2['image'] = $this->upload->data('file_name');
					$user = $this->db->get_where('user',['email' => 
					$this->session->userdata('email')])->row_array();

					$this->db->where('id',$user['id']);
					$this->db->update('user',$post2);
					if ($user['role_id']==3) {
						redirect('Wisata/');
					}else{
						redirect('Penginapan/lengkapiPenginapan');
					}
				}else{
					echo ' eror';
				}
			}	
		}


		if  ($_uid['user_id']){
			redirect('user');
		}else{
			$data['title'] = "Lengkapi Profile";

 			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('templates/users/lengkapiProfile',$data);
			$this->load->view('templates/administrator/footer',$data);							
		}	
	}


	public function changePassword(){
		$data['title'] = "Change Password";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();


		// rules
		$this->form_validation->set_rules('current_password','Current Password','required|trim');

		$this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[6]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2','New Confirm Password','required|trim|min_length[6]|matches[new_password1]');


		if ($this->form_validation->run() == false) {

			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('templates/users/changePassword',$data);
			$this->load->view('templates/administrator/footer',$data);
			# code...
		}else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Current Password</div>' );
				redirect('user/changePassword');
			}else{
				if ($current_password ==$new_password) {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">New Password  cannot be the same as current password!</div>' );
					redirect('user/changePassword');
				}else{
					$password_hash= password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password',$password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Changed!</div>' );
					redirect('user/myProfile');

				}
			}
		}

	}
	
}