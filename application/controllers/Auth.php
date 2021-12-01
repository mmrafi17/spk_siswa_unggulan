<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->load->model('Login_m');
    }

    public function index(){
    
        $this->load->view('templates/auth_login');
    }

    public function process(){
        $post = $this->input->post(null , TRUE);
    
        if(isset($post['login'])){
            
            $query = $this->Login_m->get($post);
            
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $data = [
                    'id_user' => $row['id_user'],
                    'level' => $row['level']
                ];
    
                $this->session->set_userdata($data);

                if($row['level'] == 1){
                    redirect('admin');
                }else{
                    redirect('staff');
                }

            }else{

                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Username / Password Salah!
                </div>');
                redirect('auth');
            }
            
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message','<div class="alert alert-light" role="alert">
        Anda Telah Logout!
        </div>');
        redirect('auth');
    }





}