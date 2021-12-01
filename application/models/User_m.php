<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function get($id_user = null){

        if($id_user != null){
            return $this->db->get_where('user',['id_user' => $id_user])->row_Array();
        }else{
            return $this->db->get('user')->result_array();
        }         
         
    }

    public function create(){

        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $k = $this->input->post('keanggotaan');
        
        $data = [
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'level' => $k,
            'date_created' => date('Y-m-d'),
        ];

        $this->db->insert('user',$data);
    }

}