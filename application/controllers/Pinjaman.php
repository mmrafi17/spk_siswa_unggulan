<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pinjaman_m');
        $this->load->model('nasabah_m');
        
        check_not_login();
    }

    public function index(){

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['get_all'] = $this->pinjaman_m->get_all();
        $data['simpan'] = $this->db->get_where('pinjaman', ['no_nasabah']);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pinjaman/index',$data);
        $this->load->view('templates/footer');
    }


    public function tambah(){

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['get_all'] = $this->pinjaman_m->get_all();

        $this->load->view('pinjaman/angsuran');
    }



    public function add(){

        $data['title'] = 'Halaman tambah pinjaman';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['anggota'] = $this->db->get('nasabah')->result_array();


        $this->form_validation->set_rules('no_nasabah', 'No NASABAH', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tenor', 'lama', 'required');
        $this->form_validation->set_rules('angsuran_perbulan', 'Angsuran Perbulan', 'required');
        $this->form_validation->set_rules('administrasi', 'Administrasi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('pinjaman/add_pinjaman',$data);
            $this->load->view('templates/footer');
    
       }else{

                $this->pinjaman_m->insert();
                $this->session->set_flashdata('message','<div class="alert">Sukses Tambah Data!</div>');
                redirect('pinjaman/detail_pinjaman/'.$this->input->post('no_nasabah'));
            }

            
        
    }
    
    public function detail_pinjaman($no_nasabah){

        $data['title'] = 'Halaman History Pimjaman';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['nasabah'] = $this->pinjaman_m->gethistory($no_nasabah);
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pinjaman/detail_pinjaman',$data);
        $this->load->view('templates/footer');
    }

    public function delete($id){

        $this->db->where('id' ,$id);
        $this->db->delete('pinjaman');
        $this->session->set_flashdata('message','<div class="alert">Sukses Hapus Data!</div>');
        redirect('pinjaman');
    }

    
    public function angsuran($no_nasabah){

        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['getAll'] = $this->pinjaman_m->gethistory($no_nasabah);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('angsuran/index',$data);
        $this->load->view('templates/footer');
    }

    public function store(){
        // 1. no nasabah
        // 2. jumlah pinjaman
        // 3. no transaksi
        // 4. tenor
        // 5. bunga

        // 1. sisa tenor = tenor
        // 2. bayar/bulan = angsuran per bulan

    }
    


}