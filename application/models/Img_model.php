<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Img_model extends CI_Model {

	public function __construct() {
			 parent::__construct();

     }

     public function getall()
     {
       $this->db->select('*');
       $this->db->from('banner');
       $query = $this->db->get();
       if($query->num_rows() > 0){
         return $query->row();
       }
     }

     public function update($data = array())
     {
       $this->db->where('ban_id', 1)->update('banner', $data);
     }
   }
