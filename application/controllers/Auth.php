<?php

class Auth extends CI_Controller{

	public function goToDefaultPage() {
		  if ($this->session->userdata('role_id') == 1) {
		    redirect('administrator/dashboard');
		  } else if ($this->session->userdata('role_id') == 2) {
		    redirect('user/myProfile');
		  } else if ($this->session->userdata('role_id') == 3) {
		    redirect('user/myProfile');
		  } else if ($this->session->userdata('role_id') == 4) {
		    redirect('user/myProfile');
		  }
		}
	public function index(){
		$this->goToDefaultPage();
		// email
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		// password
		$this->form_validation->set_rules('password','Password','required|trim');


		if ($this->form_validation->run() == false) {
			$data['title'] = "Login";

			$this->load->view('templates/administrator/auth_head');
			$this->load->view('templates/administrator/login');
			$this->load->view('templates/administrator/auth_footer');
		}else{
			// Validasi Sukses
			$this->_login();

		}

		
		


	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email'=> $email])->row_array();
		
		// jika usernya ada
		if ($user) {
			// Jika Usernya aktif
			if ($user['is_active'] == 1) {

				// cek password
				if (password_verify($password,$user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					// membuat session user
					$this->session->set_userdata($data);
					
			        if ($this->session->userdata('role_id') == 1) {
			        	$uid = $user['id'];
			          	$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
			        	if  (!$_uid){
							redirect('user/lengkapiProfile');								
						}else{
			            	redirect('Administrator/dashboard');
						
						}
			          } else if ($this->session->userdata('role_id') == 2) {
			          	$uid = $user['id'];
			          	$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
			          	
			          	if  (!$_uid){
							redirect('user/lengkapiProfile');								
						}else{
			            	redirect('user/myProfile');
						}
			          
			          }else{
			          	$uid = $user['id'];
			          	$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
			          	
			          	if  (!$_uid){
							redirect('user/lengkapiProfile');								
						}else{
			            	redirect('user/myProfile');
						}
			          }
				}else{
					// password salah
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth');
				}

				
			}else{
				// Belum di aktivasi
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');
				redirect('auth');
			}

		}else{
			// tidak ada user dengan email tsb
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registreted!</div>');
			redirect('auth');
		}
	}

	public function registration(){
		$this->goToDefaultPage();

		// deklarasikan terlebih dahulu

		$this->form_validation->set_rules('firstname','Firstname','required|trim');
		$this->form_validation->set_rules('lastname','Lastname','required|trim');
		// |is_unique[user.email] setelah ada formnya
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('role_id','Role_id','required|trim');
		// |is_unique[user.email] setelah ada formnya
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',
			[
				'matches' => 'Password dont match!',
				'min_lenth'=> 'password too short!'
			]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if ($this->form_validation->run()==false) {
			
			$data['title'] = "Registration";

 			$this->load->view('templates/administrator/auth_head',$data);
			$this->load->view('templates/administrator/registration',$data);
			$this->load->view('templates/administrator/auth_footer',$data);
		}else{
			$email = $this->input->post('email',true);
			$data=
			[
				'firstname'=> htmlspecialchars($this->input->post('firstname',true)),
				'lastname'=> htmlspecialchars($this->input->post('lastname',true)),
				'email'=> htmlspecialchars($email),
				'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'image'=> 'default.jpg',
				'role_id'=> htmlspecialchars($this->input->post('role_id',true)),
				'is_active'=> '0',
				'created_at'=> time()
			];

			$token = bin2hex(random_bytes(16));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'created_at' => time()
			];

			$this->db->insert('user',$data);
			$this->db->insert('user_token',$user_token);


			$this->_sendEmailActivation($token, 'verify');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat, Aktivasi akun anda!</div>');
			redirect('auth');
		}
		
	}

	private function _sendEmailActivation($token, $type){
		

		$to = $this->input->post('email'); //user email pass here


		$from = 'myudisobari12@gmail.com';//email sender

		
		// load PHPMailer Library
		$this->load->library('phpmailer_lib');

		//PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP Configuration
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'myudisobari12@gmail.com';
		$mail->Password = 'Yudiart98';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('myudisobari12@gmail.com','Admin Loji Pariwisata');
		$mail->addReplyTo($to);

		// Add a recipient
		$mail->addAddress($to);


		if ($type == 'verify') {
			// untuk activation email
			// Email Subject
			$mail->Subject = 'Acitvation Your Email';

			// Set email format to HTML
			$mail->isHTML(true);

			// Email body content
			$mailContent = "Click this link to Activation you account : <a href=".base_url(). 'auth/verify?email=' . $this->input->post('email') . '&token='. urlencode($token) .">Activation</a>";


			$mail->Body = $mailContent;
		}else{
			// untuk forgot password
		}

		// Send email
		if (!$mail->send()) {
			return true;
		}else{
			echo $this->email->print_debugger();
		}
	}

	public function verify(){
		// cara ngambil email di url
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user',['email' =>$email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
			if ($user_token) {
				
				$this->db->set('is_active',1);
				$this->db->where('email', $email);
				$this->db->update('user');
				$this->db->delete('user_token',['email'=>$email]);

				// kalo token nya gak ada
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$user['email'].' Success Activated!</div>');
				redirect('auth');

			}else{
				// kalo token nya gak ada
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Token</div>');
				redirect('auth');
			}
			
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Wrong email</div>');
			redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('type_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logout!</div>');
			redirect('auth');
	}


	public function blocked(){
		$data['title'] = "404";
		$this->load->view('errors/cli/error_404',$data);
	}
}