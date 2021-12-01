<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('simpanan_m');
        $this->load->model('nasabah_m');
        check_not_login();
    }

    public function index(){
        
        $data['title'] = 'Halaman Simpanan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->simpanan_m->getSimpanan();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('simpanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function add(){

        $data['title'] = 'Halaman Simpanan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['join_jenis'] = $this->simpanan_m->jenis_simpanan();
        
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('simpanan/add',$data);
            $this->load->view('templates/footer'); 
      
    }

    public function store($no_nasabah){

        $data['title'] = 'Halaman Simpanan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('no_nasabah', 'No Nasabah', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('jenis_simpanan', 'Jenis Simpanan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required'); 

        if ($this->form_validation->run() == FALSE){

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);      
            $this->load->view('simpanan/add',$data);
            $this->load->view('templates/footer');

        }else{

            $this->simpanan_m->create($no_nasabah);
            $this->session->set_flashdata('message','<div class="alert"><h5>Sukses Melakukan Simpanan.</h5></div>');
            redirect('simpanan/index');
            
        }
    }

    public function process($keyword = null){

        if($keyword != null){
            $this->simpanan_m->add();
            redirect('simpanan/detail_simpanan'.$keyword);
        }else{
            $this->simpanan_m->update();
            redirect('simpanan/detail_simpanan'.$keyword);

        } 
    }


    public function delete($id){
        
        $this->db->where('id' ,$id);
        $this->db->delete('simpanan');
        $this->session->set_flashdata('message','<div class="alert">Sukses Hapus Data!</div>');
        redirect('simpanan');
    }

    public function detail_simpanan($no_nasabah){

        $data['title'] = 'History Simpanan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['query'] = $this->simpanan_m->getDetailSimpanan($no_nasabah);
        

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('simpanan/detail_simpanan',$data);
        $this->load->view('templates/footer');
    }


    public function pengambilan($no_nasabah = null){

        $data['title'] = 'Halaman Pengambilan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('jumlah_ambil', 'Jumlah', 'required');
        $this->form_validation->set_rules('jenis_simpanan', 'Jenis Simpanan', 'required');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('simpanan/pengambilan',$data);
            $this->load->view('templates/footer');

        }else{

            $js = $this->input->post('jenis_simpanan');
            $jumlah = $this->input->post('jumlah_ambil');

            $this->db->select('jumlah');
            $this->db->from('simpan');
            $this->db->where('no_nasabah',$no_nasabah);
            $this->db->where('jenis_simpanan',$js);
            $qresult = $this->db->get()->result_array();

            foreach($qresult as $q);

            if( $q['jumlah'] < $jumlah){
                $this->session->set_flashdata('message','<div class="alert">Maaf, Pengambilan Melebihi Saldo!</div>');
                redirect('simpanan/pengambilan');

            }else{
            
                $this->simpanan_m->ambil($js, $jumlah, $no_nasabah);

                $this->session->set_flashdata('message','<div class="alert">Berhasil lakukan Pengambilan</div>');
                redirect('simpanan/index');
                $this->session->set_flashdata('message','<div class="alert">Sukses melakukan pengambilan dana.</div>');
                redirect('simpanan/detail_pengambilan/'. $this->input->post('no_nasabah') );
            }
        }
    }

    public function detail_pengambilan($no_nasabah = null){

        $data['title'] = 'History Pengambilan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $js = $this->input->post('jenis_simpanan');
        $data['query'] = $this->input->post('jumlah_ambil');
        $data['query1'] =$this->db->select_sum('jumlah')->where(['jenis_simpanan' => $js])->get('simpan')->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('simpanan/detail_pengambilan',$data);
        $this->load->view('templates/footer');

    }
    

    public function checkout(){

        $data['title'] = 'Halaman Simpanan';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('simpanan/detail_simpanan',$data);
        $this->load->view('templates/footer');

    }


    
}