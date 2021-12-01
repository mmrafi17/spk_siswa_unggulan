<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User  extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');   
        check_not_login();

    }

    public function index(){
        check_not_login();

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    
        $data['query'] = $this->user_m->get();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer');
    }

    public function add(){

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['keanggotaan'] = ['Admin','Staff','Nasabah'];
        

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('keanggotaan', 'Keanggotaan', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/add',$data);
            $this->load->view('templates/footer');
        }else{
            $this->user_m->create();
            $this->session->set_flashdata('message','<div class="alert h3 text-success">Sukses Tambah Data!</div>');
            redirect('user');
       
    }

    }
    

    public function edit($id_user){

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    
        $data['query'] = $this->user_m->get($id_user);

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/edit',$data);
            $this->load->view('templates/footer');

    }   

    public function delete($id_user){

        $this->db->delete('user', array('id_user' => $id_user));
        $this->session->set_flashdata('message','<div class="alert h3 text-success">Hapus Data Berhasil.</div>');
        redirect('user');
    }
    
}