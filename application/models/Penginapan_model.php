<?php

class Penginapan_model extends CI_Model{

	private $table ="penginapan_kamar";

	public function getImage(){
		$idp = $this->db->get_where('penginapan', ['id'])->row_array();
		
		$query = "SELECT * FROM penginapan_image
				  WHERE penginapan_id = $idp[id]";
		return $this->db->query($query)->result_array();
	}

	public function getImage2(){
		$idp	= $this->db->get_where('penginapan', ['id'])->row_array();
		$query 	="SELECT `penginapan`.`id`,
						 `penginapan_image`.*
				  FROM `penginapan`
				  INNER JOIN `penginapan_image`
				  ON `penginapan`.`id` = `penginapan_image`.`penginapan_id`
				  WHERE `penginapan`.`id` = $idp[id] DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getImage3(){
		$idp	= $this->db->get_where('penginapan', ['id'])->row_array();
		
		$query 	= "SELECT `penginapan`.`id`,
						  `penginapan_image`.*
				   FROM `penginapan`
				   JOIN `penginapan_image`
				   WHERE `penginapan`.`id` = $idp[id]";

		return $this->db->query($query)->result_array();
	}


	public function getKamar($where,$table){
		return $this->db->get_where($table, $where);
	}

	public function getPenginapanKamar($table,$where){
		return $this->db->get_where($table,$where);
	}
	public function deleteKamar($where){
		$this->db->delete($where);
	}
	public function joinPenginapanKamar(){
		$uid = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$p 		= $this->db->get_where('penginapan',['user_id'=>$uid['id']])->row_array();
		$pk = $this->db->get_where('penginapan_kamar',['penginapan_id'=>$p['id']])->row_array();

		
		$this->db->select('pk.*, p.*, p.description as desc_p, pk.description as desc_pk, pkt.*');
		$this->db->from('penginapan_kamar as pk');
		$this->db->join('penginapan as p', 'p.id = pk.penginapan_id');
		$this->db->join('penginapan_kamar_type as pkt', 'pkt.id = pk.type_id');
		$this->db->where('penginapan_id',$pk['penginapan_id']);
		$this->db->order_by('pk.id','DESC');
				
		$query = $this->db->get();
		return $query;
	}
	public function joinPKID(){
		$kd_kamar = $this->uri->segment(3);

		$this->db->select('pk.*, p.*, p.description as desc_p, pk.description as desc_pk, pkt.*');
		$this->db->from('penginapan_kamar as pk');
		$this->db->join('penginapan as p', 'p.id = pk.penginapan_id');
		$this->db->join('penginapan_kamar_type as pkt', 'pkt.id = pk.type_id');
		$this->db->where('kd_kamar',$kd_kamar);
				
		$query = $this->db->get();
		return $query;
	}

	public function AllPenginapanKamar(){
		$uid = $this->db->get_where('user',['email' => 
			$this->session->userdata('email')])->row_array();
		$p 		= $this->db->get_where('penginapan',['user_id'=>$uid['id']])->row_array();
		$pk = $this->db->get_where('penginapan_kamar',['penginapan_id'=>$p['id']])->row_array();

		$this->db->select('pk.*,p.*, p.description as desc_p, pk.description as desc_pk, pkt.*');
		$this->db->from('penginapan_kamar as pk');
		$this->db->join('penginapan as p', 'p.id = pk.penginapan_id');
		$this->db->join('penginapan_kamar_type as pkt', 'pkt.id = pk.type_id');
		$this->db->order_by('pk.kd_kamar','RANDOM');
				
		$query = $this->db->get();

		return $query;
	}

	public function getFasilitas(){
		$uri = $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('penginapan_kamar as pk');
		$this->db->join('penginapan_kamar_fasilitas as pks', 'pk.kd_kamar = pks.kamar_id');
		$this->db->where('kamar_id',$uri);
		$query = $this->db->get();
		
		return $query;
	}
}