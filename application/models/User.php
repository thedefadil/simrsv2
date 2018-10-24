<?php

class User extends CI_Model {

public function cek_user($username, $password) {
    $this->db->where(“NIP = ‘$username’ ”);
    $this->db->where(‘PWD’, md5($password));
    $query = $this->db->get(‘NIP’);
    return $query->row_array();
  }
}