<?php 
class Alternatif_c extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Alternatif_m');
        // if (empty($_SESSION['user'])) {
        //     redirect(site_url(''));
        // }
        }
    
    public function index(){
        //   $this->render_page('Listkriteria');
        $data['title'] = 'Halaman Alternatif';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['query'] = $this->Alternatif_m->read();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('alternatif/index',$data);
        $this->load->view('templates/footer');
    }

    public function add(){
        //   $this->render_page('Listkriteria');
        $data['title'] = 'Halaman Alternatif';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('alternatif/add',$data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['title'] = 'Halaman Alternatif';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['query'] = $this->Alternatif_m->read();
        
        $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required');
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('alternatif/index',$data);
            $this->load->view('templates/footer');
        }else{
            $this->Alternatif_m->create();
            $this->session->set_flashdata('message','<div class="alert h5 text-success">Sukses Tambah Data!</div>');
            redirect('alternatif_c');
        }
    }

    public function edit($id){
        $data['title'] = 'Halaman ubah nasabah';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['query'] = $this->Alternatif_m->get_where($id);
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('alternatif/edit',$data);
        $this->load->view('templates/footer');
    }

    public function update(){
        $data['title'] = 'Halaman Alternatif';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['query'] = $this->Alternatif_m->read();

        $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required');
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required');
         
        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('alternatif/edit',$data);
            $this->load->view('templates/footer');
        }else{
            $this->Alternatif_m->update();
            $this->session->set_flashdata('message','<div class="alert h5 text-success">Sukses Edit Data!</div>');
            redirect('alternatif_c');
        }
       
    }

    public function delete($id){
        
        $this->db->where('id_alternatif' ,$id);
        $this->db->delete('alternatif');
        $this->session->set_flashdata('message','<div class="alert">Sukses Hapus Data!</div>');
        redirect('alternatif_c');
    }

    
}

?>