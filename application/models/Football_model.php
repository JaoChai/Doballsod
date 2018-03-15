<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Football_model extends CI_Model {

	public function __construct() {
			 parent::__construct();

     }

     public function getleague(){
       $this->db->select('*');
       $this->db->from('league');
       $query = $this->db->get();
       if($query->num_rows() > 0){
         return $query->result();
       }
     }

     public function getch(){
       $this->db->select('*');
       $this->db->from('channel');
       $query = $this->db->get();
       if($query->num_rows() > 0){
         return $query->result();
       }
     }

		 public function getall(){
			 $this->db->select('*');
			 $this->db->from('table_league');
			 $this->db->join('league', 'table_league.lea_id = league.lea_id');
			 $this->db->join('channel', 'table_league.ch_id = channel.ch_id');
			 $query = $this->db->get();
			 if($query->num_rows() > 0){
				 return $query->result();
			 }
		 }

		 public function getheader(){
			 	$this->db->select('league.lea_name');
				$this->db->from('table_league');
				$this->db->join('league', 'table_league.lea_id = league.lea_id');
				$this->db->join('channel', 'table_league.ch_id = channel.ch_id');
				$this->db->order_by('table_league.table_id');
				$this->db->group_by('league.lea_name');
				$query = $this->db->get();
				if($query->num_rows() > 0){
					return $query->result();
				}
		 }

		 public function getedit($id){
			 $this->db->select('*');
			 $this->db->from('table_league');
			 $this->db->join('league', 'table_league.lea_id = league.lea_id');
			 $this->db->join('channel', 'table_league.ch_id = channel.ch_id');
			 $this->db->where('table_id', $id);
			 $query = $this->db->get();
			 if($query->num_rows() > 0){
				 return $query->row();
			 }
		 }

		 public function getcontent($id){
			 $this->db->select('*');
			 $this->db->from('channel');
			 $this->db->where('ch_id', $id);
			 $query = $this->db->get();
			 if($query->num_rows() > 0){
				 return $query->row();
			 }
		 }

		 public function insert($data = array()){
			 $this->db->insert('table_league', $data);
		 }

		 public function update($id, $data = array()){
			 $this->db->where('table_id', $id)->update('table_league', $data);
		 }
}
