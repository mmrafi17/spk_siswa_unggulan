<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


    public function index(){
        check_not_login();

        $data['title'] = 'Halaman Staff';
        $data['user'] = 'rafi Staff';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('staff/profile_Staff',$data);
        $this->load->view('templates/footer');
    }

    public function profile_staff(){
        check_not_login();

        $data['title'] = 'Halaman Edit Profile';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('staff/profile_staff',$data);
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