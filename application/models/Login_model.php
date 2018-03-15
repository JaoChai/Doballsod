<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
			 parent::__construct();

     }

     public function login($data)
  {
    $condition = "admin_username =" . "'" . $data['username'] . "' AND " . "admin_password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if($query->num_rows() == 1){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function get_data($username)
{
  $condition = "admin_username =" . "'" . $username . "'";
  $this->db->select('*');
  $this->db->from('admin');
  $this->db->where($condition);
  $this->db->limit(1);
  $query = $this->db->get();

  if($query->num_rows() == 1){
    return $query->result();
  }else{
    return FALSE;
  }
}
}
