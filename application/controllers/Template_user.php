<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_user extends CI_Controller {

    public function login(){

        $data['title'] = 'Halaman Login Nasabah';

        $this->load->view('template_user/header',$data);
        $this->load->view('template_user/login');

    }

    public function index(){
        
        $data['title'] = 'Halaman nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

         
        $this->load->view('template_user/header',$data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/index');
        $this->load->view('template_user/footer');
    }
    
    public function about(){
        
        $data['title'] = 'Halaman nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

         
        $this->load->view('template_user/header',$data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/about');
        $this->load->view('template_user/footer');
    }
    
    
    public function fitur(){

        $data['title'] = 'Halaman Transaksi';

        $this->load->view('template_user/header',$data);
        $this->load->view('template_user/topbar',$data);
        $this->load->view('template_user/fitur');
        $this->load->view('template_user/footer');

    }

}