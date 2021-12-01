<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('nasabah_m');
        check_not_login();
    }

    public function index(){
        
        $data['title'] = 'Halaman nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['get_all'] = $this->nasabah_m->get_all();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('nasabah/index');
        $this->load->view('templates/footer');
    }

    public function add(){
       
        $data['title'] = 'Halaman Tambah nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['gender'] = ['Laki-Laki','Perempuan'];
        
        $this->form_validation->set_rules('no_ktp', 'No Ktp', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Tlp', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('profesi', 'profesi', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'required');

        if($this->form_validation->run() == FALSE){
           
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('nasabah/add');
            $this->load->view('templates/footer');

        }else{
           
            $this->nasabah_m->create();
            $this->session->set_flashdata('message','<div class="alert h3 text-success">Sukses Tambah Data!</div>');
            redirect('nasabah');
        }
    }

    public function edit($id){
        $data['title'] = 'Halaman ubah nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['gender'] = ['Laki-Laki','Perempuan'];
        $data['row'] = $this->nasabah_m->get_id($id);
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('nasabah/edit',$data);
        $this->load->view('templates/footer');
    }

   

    public function do_upload(){
        
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_nasabah'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
    }


    public function delete($id){
        
        $this->db->where('id' ,$id);
        $this->db->delete('nasabah');
        $this->session->set_flashdata('message','<div class="alert">Sukses Hapus Data!</div>');
        redirect('nasabah');
    }

    

    public function update(){

        $data['title'] = 'Halaman ubah nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['gender'] = ['Laki-Laki','Perempuan'];


        $this->form_validation->set_rules('no_nasabah', 'No Nasabah', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Tlp', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('profesi', 'profesi', 'required');
        

        if ($this->form_validation->run() == FALSE){

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('nasabah/edit',$data);
            $this->load->view('templates/footer');
    
        }else{
            
            $this->nasabah_m->update_data();
            $this->session->set_flashdata('message','<div class="alert h5 text-success">Sukses Edit Data!</div>');
            redirect('nasabah');
        }
    }

    public function detail($id){
        $data['title'] = 'Halaman Detail nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['get_id'] = $this->nasabah_m->get($id)->result_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');  
        $this->load->view('templates/topbar',$data);
        $this->load->view('nasabah/detail',$data);
        $this->load->view('templates/footer');

    }
}   
