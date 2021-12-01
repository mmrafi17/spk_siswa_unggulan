<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pinjaman_m');
        $this->load->model('angsuran_m');
        check_not_login();
    }
    

    public function index(){
        
        $data['title'] = 'Halaman Bayar Angsuran';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['data_user'] = $this->angsuran_m->get();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('angsuran/index',$data);
        $this->load->view('templates/footer');
    }

    // public function search(){
        
    //     $data['title'] = 'Halaman Bayar Angsuran';
    //     $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

    //     if($this->input->get('no_transaksi')){

    //         $this->load->view('templates/header',$data);
    //         $this->load->view('templates/sidebar');
    //         $this->load->view('templates/topbar',$data);
    //         $this->load->view('angsuran/bayar');
    //         $this->load->view('templates/footer');
    //     }
           
        
    // }

    

    public function bayar(){

        $data['title'] = 'Halaman Bayar';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        

    }
    
    public function proses_bayar($id){
        
        $data['title'] = 'Halaman Bayar';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        if(!$id){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('angsuran/index',$data);
            $this->load->view('templates/footer');
        }else{
            $this->angsuran_m->proses_bayar($id);
            $this->session->set_flashdata('message','<div class="alert">Sukses Tambah Data!</div>');
            redirect('angsuran/detail/'.$this->inpu->post('no_nasabah'));
        }
        

    }

    public function detail($no_nasabah){    

        $data['title'] = 'Halaman Detail Angsuran';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->angsuran_m->detail($no_nasabah);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('angsuran/detail',$data);
        $this->load->view('templates/footer');

    }


    public function store(){
        // define form

        // update ke tb pinjaman
        // 1. get pinjaman by id atau invoice
        // 2. get tenor
        // 3. get tenor - cicilan ke untuk update sisa tenor
        // 4. get total pinjam
        // 5. get tb angsuran pinjamaan berdasarkan id yg dihasilkan di nomor 1 e.g where id = '99'
        // 6. looping atau sum jumlah bayar di tb angusran 
        // 7. total pinjam - hasil sum di nomor 6
        // 8. update dari hasil nomor 3 sama nomor 6 dengan no inovice

        // insert ke angsuran
        // 1. id_pinjam, id_user, jumlah bayar, cicilan ke
        // 2. cicilan ke hasil dari tenor - sisa tenor + 1 = hasil
    }

}
