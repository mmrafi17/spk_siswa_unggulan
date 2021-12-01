<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

    public function get($post){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$post['username']);
        $this->db->where('password',md5($post['password']));
        
        return $query = $this->db->get();
    }

 
}