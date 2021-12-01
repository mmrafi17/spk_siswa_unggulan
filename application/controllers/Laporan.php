<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('nasabah_m');
        $this->load->model('simpanan_m');
        $this->load->model('pinjaman_m');
    }


    public function index(){
        check_not_login();

        $data['title'] = 'Halaman Laporan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }


    public function nasabah(){

        check_not_login();

        $data['title'] = 'Halaman Laporan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['get_all'] = $this->nasabah_m->get_all();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('laporan/laporan_nasabah');
        $this->load->view('templates/footer');

    }

    public function simpanan(){

        check_not_login();

        $data['title'] = 'Halaman Laporan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['get_all'] = $this->simpanan_m->get_all();


        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('laporan/laporan_simpanan');
        $this->load->view('templates/footer');

    }
    
    public function pinjaman(){

        check_not_login();

        $data['title'] = 'Halaman Laporan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['get_all'] = $this->pinjaman_m->get_all();


        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('laporan/laporan_pinjaman');
        $this->load->view('templates/footer');

    }

    public function angsuran(){

        check_not_login();

        $data['title'] = 'Halaman Laporan ';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['get_all'] = $this->pinjaman_m->get_all();


        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('laporan/laporan_angsuran');
        $this->load->view('templates/footer');

    }

    public function SHU(){

        check_not_login();

        $data['title'] = 'Halaman nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('laporan/laporan_shu');
        $this->load->view('templates/footer');
    }

}