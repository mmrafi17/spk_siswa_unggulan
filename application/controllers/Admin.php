<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        check_not_login();

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function profile_admin(){
        check_not_login();

        $data['title'] = 'Halaman Edit Profile';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/profile_admin',$data);
        $this->load->view('templates/footer');
    }

    public function edit_profile(){
        check_not_login();

        $data['title'] = 'Halaman Edit Profile';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/edit_profile_admin',$data);
        $this->load->view('templates/footer');
    }

    public function edit(){

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'date_created' => $this->input->post('date'),
        ];

    $id = $this->input->post('id');

    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
        
    redirect('admin/profile_admin');
}


}