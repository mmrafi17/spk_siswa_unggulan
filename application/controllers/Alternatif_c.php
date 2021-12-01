<?php 

class Alternatif_c extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Kriteria_m');
        // if (empty($_SESSION['user'])) {
        //     redirect(site_url(''));
        // }
        }
    
    function index(){
        //   $this->render_page('Listkriteria');
        $data['title'] = 'Halaman Alternatif';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('alternatif/index');
        $this->load->view('templates/footer');
    }
}

?>