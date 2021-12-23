<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriks_c extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Matriks_m');
        check_not_login();
    }

    public function index(){
        
        $data['title'] = 'Halaman Matriks';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->Matriks_m->get_join()->result_array();
        $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
        $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();
        $data['matriks'] = $this->Matriks_m->get_nilai_matriks()->result_array();
        // $data['query'] = $this->perhitungan_m->get_detail();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('matriks/index',$data);
        $this->load->view('templates/footer');
    }

    public function add(){
        
        $data['title'] = 'Halaman Tambah Matriks';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->Matriks_m->get_all();
        // $data['query'] = $this->perhitungan_m->get_detail();
        $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
        $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('matriks/add',$data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['title'] = 'Halaman Tambah Nilai Matriks';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->Matriks_m->get_all();
        // $data['query'] = $this->perhitungan_m->get_detail();
        $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
        $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();

        $this->form_validation->set_rules('id_alternatif', 'Alternatif', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('matriks/add',$data);
            $this->load->view('templates/footer');
        }else{
            $this->Matriks_m->create();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Sukses Menambahkan Nilai Matriks.</div>');
            redirect('matriks_C');
        }
    }

    public function normalisasi(){
        
            $data['title'] = 'Halaman Matriks Ternormalisasi';
            $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    
            $data['query'] = $this->Matriks_m->get_join()->result_array();
            $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
            $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();
            $data['matriks'] = $this->Matriks_m->get_nilai_matriks()->result_array();
            // $data['query'] = $this->perhitungan_m->get_detail();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('matriks/normalisasi',$data);
            $this->load->view('templates/footer');
    }

    public function bobot_normalisasi(){
        
            $data['title'] = 'Halaman Bobot Ternormalisasi';
            $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    
            $data['query'] = $this->Matriks_m->get_join()->result_array();
            $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
            $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();
            $data['matriks'] = $this->Matriks_m->get_nilai_matriks()->result_array();
            // $data['query'] = $this->perhitungan_m->get_detail();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('matriks/bobot_normalisasi',$data);
            $this->load->view('templates/footer');
    }

    public function ideal_positif_negatif(){
        
        $data['title'] = 'Halaman Ideal Positif & Negatif';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->Matriks_m->get_join()->result_array();
        $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
        $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();
        $data['matriks'] = $this->Matriks_m->get_nilai_matriks()->result_array();
        // $data['query'] = $this->perhitungan_m->get_detail();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('matriks/ideal_positif_negatif',$data);
        $this->load->view('templates/footer');
    }

    public function jarak_solusi_ideal(){
        
        $data['title'] = 'Halaman Jarak Solusi Ideal';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->Matriks_m->get_join()->result_array();
        $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
        $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();
        $data['matriks'] = $this->Matriks_m->get_nilai_matriks()->result_array();
        // $data['query'] = $this->perhitungan_m->get_detail();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('matriks/jarak_solusi_ideal',$data);
        $this->load->view('templates/footer');
    }

    public function nilai_preferensi(){
        
        $data['title'] = 'Halaman Jarak Solusi Ideal';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->Matriks_m->get_join()->result_array();
        $data['alternatif'] = $this->Matriks_m->get_alternatif()->result_array();
        $data['kriteria'] = $this->Matriks_m->get_kriteria()->result_array();
        $data['matriks'] = $this->Matriks_m->get_nilai_matriks()->result_array();
        // $data['query'] = $this->perhitungan_m->get_detail();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('matriks/nilai_preferensi',$data);
        $this->load->view('templates/footer');
    }
    
}