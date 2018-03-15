<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Channel_model extends CI_Model {

	public function __construct() {
			 parent::__construct();

     }

     public function getall(){
       $this->db->select('*');
       $this->db->from('channel');
       $query = $this->db->get();
       if($query->num_rows() > 0){
         return $query->result();
       }
     }

		 public function getedit($id){
			 $this->db->select('*');
			 $this->db->from('channel');
			 $this->db->where('ch_id', $id);
			 $query = $this->db->get();
			 if($query->num_rows() > 0){
				 return $query->row();
			 }
		 }

     public function insert($data = array()){
       $this->db->insert('channel', $data);
     }

		 public function update($id, $data = array()){
			 $this->db->where('ch_id', $id)->update('channel', $data);
		 }
}
