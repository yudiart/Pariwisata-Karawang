<?php 

class Penginapan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index(){
		$data['title'] = "Penginapan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		$idp = $this->db->get_where('penginapan', ['id'])->row_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();
		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$data['idp'] = $this->db->get_where('penginapan',['user_id' => $user['id']])->result_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
		$_p = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		$_ip = $this->db->get_where('penginapan_image',['penginapan_id' => $_p['id']])->row_array();

		if ($_uid['user_id']) {
			if ($_p['id']) {
				if ($_ip['penginapan_id']==$_p['id']) {
					$data['title'] = "Penginapan";
					$this->load->view('templates/administrator/head',$data);
					$this->load->view('templates/administrator/topbar',$data);
					$this->load->view('templates/administrator/sidebar',$data);
					$this->load->view('penginapan/profile',$data);
					$this->load->view('templates/administrator/footer',$data);
				}else{
					redirect('Penginapan/lengkapiImage');
				}
				
			}else{
				redirect('Penginapan/lengkapiPenginapan');
			}
		}else{
			redirect('Penginapan/dashboard');
		}
	}
	public function Dashboard(){
		$data['title'] = "Penginapan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		// Get Models
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();

		$idp = $this->db->get_where('penginapan', ['id'])->row_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();

		$data['title'] = "Penginapan";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/dashboard',$data);
		$this->load->view('templates/administrator/footer',$data);
	}
	public function penginapanProfile(){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();

		$idp = $this->db->get_where('penginapan', ['user_id'=>$user['id']])->row_array();
		$data['idp'] = $this->db->get_where('penginapan',['user_id' => $user['id']])->result_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();
		$data['title'] = "Penginapan Profile";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/profile',$data);
		$this->load->view('templates/administrator/footer',$data);
	}
	public function lengkapiPenginapan(){
		$data['title'] = "Penginapan";
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
		$_p = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		$_ip = $this->db->get_where('penginapan_image',['penginapan_id' => $_p['id']])->row_array();

		// Set Rules Form
		$this->form_validation->set_rules('nama_penginapan','Nama_penginapan','required|trim');
		$this->form_validation->set_rules('description','Description','required|trim');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		
		if ($this->form_validation->run()==false) {
			if ($_p['id']) {
				if ($_uid['id']) {
					if (!$_ip['penginapan_id']==$_p['id']) {
						redirect('Penginapan/lengkapiImage');
					}else{
						redirect('Penginapan/');
					}
				}else{
					redirect('user/lengkapiProfile');
					$this->lengkapiProfile();	
				}
				redirect('Penginapan');
			}else{
				$data['title'] = "Lengkapi Penginapan";
				$this->load->view('templates/administrator/head',$data);
				$this->load->view('templates/administrator/topbar',$data);
				$this->load->view('templates/administrator/sidebar',$data);
				$this->load->view('penginapan/index',$data);
				$this->load->view('templates/administrator/footer',$data);

			}
		}else{
			$data = [
				'user_id' 			=> $user['id'],
				'nama_penginapan'	=> htmlspecialchars($this->input->post('nama_penginapan',true)),
				'description'		=> htmlspecialchars($this->input->post('description',true)),
				'alamat'			=> htmlspecialchars($this->input->post('alamat',true)),
				'is_active'			=> 1
			];

			$this->db->insert('penginapan',$data);
			redirect('Penginapan');
			
			
		}	
	}
	public function kamar(){
		
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		
		$this->load->model('Penginapan_model','pm');
		$data['pk'] = $this->pm->joinPenginapanKamar();

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$idp = $this->db->get_where('penginapan', ['user_id' => $user['id']])->row_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();
		$data['_pk'] = $this->db->get_where('penginapan_kamar',['penginapan_id'=>$idp['id']])->result_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
		$_p = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		// $_pk = $this->db->get_where('penginapan_kamar',['penginapan_id' => $_p['id']])->row_array();



		if ($data['pk']) {
			$data['title'] = "Kamar";
			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('penginapan/data_kamar',$data);
			$this->load->view('templates/administrator/footer',$data);
		}else{
			$this->tambahKamar();
		}
	}
	public function tambahKamar(){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		$this->load->model('Penginapan_model','pm');
		
		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$data['idp'] = $this->db->get_where('penginapan',['user_id' => $user['id']])->result_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
		$_p = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		$_ip = $this->db->get_where('penginapan_image',['penginapan_id' => $_p['id']])->row_array();
		$_pk = $this->db->get_where('penginapan_kamar',['penginapan_id' => $_p['id']])->row_array();
		// Set Rules Form
		$this->form_validation->set_rules('nama_kamar','Nama_kamar','required|trim|max_length[24]|xss_clean',[
			'required' => '*Nama kamar wajib di isi!',
			'max_length' => 'Nama maximal 24 karakter!'
		]);
		$this->form_validation->set_rules('type','Type','required|trim|xss_clean');
		$this->form_validation->set_rules('description','Description','required|trim|xss_clean',
			[
				'xss_clean' => 'Jangan Masukan script selain data yang dibutuhkan!'
			]);
		$this->form_validation->set_rules('harga','Harga','required|trim|xss_clean|integer|xss_clean',[
			'integer' => 'Gunakan angka!'
			]);
		if ($this->form_validation->run()==false) {
			$data['title'] = "Tambah Kamar";
			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('penginapan/tambah_kamar',$data);
			$this->load->view('templates/administrator/footer',$data);
		}else{
			$config['upload_path']          = './assets/image/penginapan/kamar';
		    $config['allowed_types']        = 'gif|jpg|png|jpeg';
		    $config['max_size']             = 1024; // 1MB
		    $config['file_name']			= substr(md5(rand()),0,32);

		    // buat upload gambar di table user
		    $this->load->library('upload', $config);
			if (@$_FILES['image_penginapan']['name']!= null) {
				if ($this->upload->do_upload('image_penginapan')) {
					$post2['image'] = $this->upload->data('file_name');
					$data = [
						'capacity' =>		htmlspecialchars($this->input->post('capacity',true)),
						'penginapan_id' => $_p['id'],
						'kd_kamar'	=> substr(md5(rand()),0,64),
						'nama_kamar'		=> htmlspecialchars($this->input->post('nama_kamar',true)),
						'type_id'			=> htmlspecialchars($this->input->post('type',true)),
						'description'			=> htmlspecialchars($this->input->post('description',true)),
						'image'				=> $post2['image'],
						'harga' => htmlspecialchars($this->input->post('harga', true)),
						'upload_at' => time()
					];
					$data2 = [
						'kamar_id' => $data['kd_kamar'],
						'type_bed' => $this->input->post('type_bed',true),
						'ac' => $this->input->post('check_ac'),
						'tv' => $this->input->post('check_tv'),
						'ruang_tamu' => $this->input->post('check_rt'),
						'kamar_mandi' => $this->input->post('check_km'),
						'break_fast' => $this->input->post('check_bf'),
						'luas_ruangan' => htmlspecialchars($this->input->post('luas_ruangan',true))
					];
					$this->db->insert('penginapan_kamar',$data);
					$this->db->insert('penginapan_kamar_fasilitas',$data2);
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data telah di tambahkan</div>');
						redirect('Penginapan/kamar');
				}else{
					$this->session->set_flashdata('max_size','<p><span class="input-group-append" style="color:red;">Max ukuran file 1024</span></p>');
				}
			}	
		}
	}
	public function editKamar($kd_kamar){
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		// Get Models
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		$where= array('kd_kamar' => $kd_kamar);
		$this->load->model('Penginapan_model','pm');
		
		$data['_pk'] = $this->pm->getKamar($where,'penginapan_kamar')->result();
	
		$data['title'] = "Edit Kamar";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/edit_kamar',$data);
		$this->load->view('templates/administrator/footer',$data);
		
	}

	public function updateKamar(){
		$this->form_validation->set_rules('nama_kamar','Nama_kamar','required|trim|max_length[24]|xss_clean',[
			'required' => '*Nama kamar wajib di isi!',
			'max_length' => 'Nama maximal 24 karakter!'
		]);
		$this->form_validation->set_rules('type','Type','required|trim');
		$this->form_validation->set_rules('description','Description','required|trim|xss_clean',
			[
				'xss_clean' => 'Jangan Masukan script selain data yang dibutuhkan!'
			]);
		$this->form_validation->set_rules('harga','Harga','required|trim|xss_clean|integer|xss_clean',[
			'integer' => 'Gunakan angka!'
			]);

		if ($this->form_validation->run()==false) {
			redirect('Penginapan/kamar');
		}else{
			$this->load->model('Penginapan_model','pm');		
		$kd_kamar = $this->uri->segment(3);
		$pk = $this->db->get_where('penginapan_kamar',['kd_kamar'=>$kd_kamar])->row_array();
		$data1 = [
			'capacity' =>		htmlspecialchars($this->input->post('capacity',true)),
			'kd_kamar'			=> $kd_kamar,
			'nama_kamar'		=> htmlspecialchars($this->input->post('nama_kamar',true)),
			'type_id'			=> htmlspecialchars($this->input->post('type',true)),
			'description'			=> htmlspecialchars($this->input->post('description',true)),
			'harga' => htmlspecialchars($this->input->post('harga', true)),
			'upload_at' => time()
		];

		$this->db->where('kd_kamar',$kd_kamar);
		$update = $this->db->update('penginapan_kamar',$data1);
		if ($update == true){
			$config['upload_path']          = './assets/image/penginapan/kamar';
		    $config['allowed_types']        = 'gif|jpg|png|jpeg';
		    $config['max_size']             = 1024; // 1MB
		    $config['file_name']			= substr(md5(rand()),0,32);
		    // buat upload gambar di table user
		    $load = $this->load->library('upload', $config);

			if (@$_FILES['image_kamar']['name'] != null) {
				if ($this->upload->do_upload('image_kamar')) {
					$post2['image'] = $this->upload->data('file_name');

					$old_image = $pk['image'];
					if ($old_image) {
						unlink(FCPATH . 'assets/image/penginapan/kamar/' . $old_image);
						$data2 = [
							'image' => $post2['image']	
						];
						$this->db->where('kd_kamar',$kd_kamar);
						$this->db->update('penginapan_kamar',$data2);
						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data telah di tambahkan</div>');
						redirect('Penginapan/kamar');

					}
				}else{
					$this->session->set_flashdata('max_size','<p><span class="input-group-append" style="color:red;">Max ukuran file 1024</span></p>');
				}
			}
		}

		}
	}

	protected function _updataKamarDetail(){
		
	}

	public function deleteKamar($kd_kamar){
		$where= array('kd_kamar' => $kd_kamar);
		$this->load->model('Penginapan_model','pm');
		
		$pk = $this->pm->getKamar($where,'penginapan_kamar')->row_array();
		$path = 'assets/image/penginapan/kamar/'.$pk['image'];
		$image = $pk['image'];
		if ($image) {
			unlink(FCPATH .$path);
			$this->db->where('kd_kamar',$pk['kd_kamar']);
			$this->db->delete('penginapan_kamar');
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Kamar telah di hapus!</div>');
			redirect('Penginapan/kamar');

		}
	}
	public function lengkapiImage(){
		
		$data['title'] = "Penginapan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();
		echo'<br/>';
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();

		$this->load->model('Penginapan_model','pm');
		$data['pdtl'] = $this->pm->getImage3();

		$idp = $this->db->get_where('penginapan', ['id'])->row_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();

		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$data['idp'] = $this->db->get_where('penginapan',['user_id' => $user['id']])->result_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
		$_dp = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		$_idp = $this->db->get_where('penginapan_image',['penginapan_id' =>$idp['id']])->row_array();
		if ($_idp['penginapan_id']==$_dp['id']) {
			redirect('Penginapan');
		}else{
			$this->load->view('templates/administrator/head',$data);
			$this->load->view('templates/administrator/topbar',$data);
			$this->load->view('templates/administrator/sidebar',$data);
			$this->load->view('penginapan/image_penginapan',$data);
			$this->load->view('templates/administrator/footer',$data);
			$this->_penginapanImage();
		}	
	}
	private function _penginapanImage(){
		$config['upload_path']          = './assets/image/penginapan/';
	    $config['allowed_types']        = 'gif|jpg|png|jpeg';
	    $config['max_size']             = 1024; // 1MB
	    $config['file_name']			= substr(md5(rand()),0,32);

	    // buat upload gambar di table user
	    $this->load->library('upload', $config);
		if (@$_FILES['image']['name']!= null) {
			if ($this->upload->do_upload('image')) {
				$user = $this->db->get_where('user',['email' => 
				$this->session->userdata('email')])->row_array();
				$idp = $this->db->get_where('penginapan', ['user_id'=> $user['id']])->row_array();

				$penginapan =[
					'penginapan_id' => $idp['id'],
					'image'			=> $this->upload->data('file_name'),
					'upload_at' 	=> time()
				];
				$this->db->where('penginapan_id',$penginapan);
				$this->db->insert('penginapan_image',$penginapan);
				redirect('Penginapan');
			}else{
				echo ' eror';
			}
			
		}
	}

	

	public function Transaksi(){
		$data['title'] = "Penginapan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		$idp = $this->db->get_where('penginapan', ['id'])->row_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();
		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$data['idp'] = $this->db->get_where('penginapan',['user_id' => $user['id']])->result_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
		$_p = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		$_ip = $this->db->get_where('penginapan_image',['penginapan_id' => $_p['id']])->row_array();
		$data['title'] = "Transaksi";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/profile',$data);
		$this->load->view('templates/administrator/footer',$data);
	}

	public function logTransaksi(){
		$data['title'] = "Penginapan";
		$data['user'] = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model','menu');
		$data['role'] = $this->menu->getUserRole();		
		$this->load->model('User_model','um');
		$data['udtl'] = $this->um->getUserDetail();
		$idp = $this->db->get_where('penginapan', ['id'])->row_array();
		$data['_ip'] = $this->db->get_where('penginapan_image', ['penginapan_id' => $idp['id']])->result_array();
		$user = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$data['idp'] = $this->db->get_where('penginapan',['user_id' => $user['id']])->result_array();
		$uid = $user['id'];
		$_uid = $this->db->get_where('user_detail',['user_id' => $uid])->row_array();
		$_p = $this->db->get_where('penginapan',['user_id' => $uid])->row_array();
		$_ip = $this->db->get_where('penginapan_image',['penginapan_id' => $_p['id']])->row_array();
		$data['title'] = "logTransaksi";
		$this->load->view('templates/administrator/head',$data);
		$this->load->view('templates/administrator/topbar',$data);
		$this->load->view('templates/administrator/sidebar',$data);
		$this->load->view('penginapan/profile',$data);
		$this->load->view('templates/administrator/footer',$data);
	}
}