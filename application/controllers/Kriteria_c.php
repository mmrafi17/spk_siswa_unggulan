<?php 

class Kriteria_c extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Kriteria_m');
        // if (empty($_SESSION['user'])) {
        //     redirect(site_url(''));
        // }
      }
  
    function index(){
        //   $this->render_page('Listkriteria');
        $data['title'] = 'Halaman Kriteria';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('kriteria/index');
        $this->load->view('templates/footer');
    }
  
    // function listkriteria(){
    //     $datauser=$this->Krite->list();
    //     $a=1;
    //     $test=array();
    //     foreach ($datauser as $key) {
    //         $key->nomor=$a;
    //         $test[]=$key;
    //         $a++;
    //     }
    //     // print_r($test);
    //     $this->output
    //     ->set_content_type('application/json')
    //     ->set_output(json_encode($test));
    // }

    // function editkriteria($idkrit=NULL){
    //     if($idkrit==NULL){
    //         if(isset($_POST) && count($_POST) > 0){
    //             $id_krit=$this->input->post('idkri');
    //             $cekperiod=array(
    //                 'idkri'=> $id_krit,
    //             );
    //             $available=$this->Krite->edit($cekperiod);
    //             if($available){
    //                 echo "Data telah diubah";
    //             }
    //             else{
    //                 header('HTTP/1.1 500 Terjadi Kesalahan 2');
    //             }
    //         }
    //         else{
    //             header('HTTP/1.1 500 Terjadi Kesalahan 1');
    //         }
    //     }
    //     else{
    //         $data['datakriteria']=$this->Krite->get($idkrit);
    //         $this->load->view('kriteria/edit_k',$data);
    //     }
    // }

    // function removekriteria(){
    //     if(isset($_POST) && count($_POST) > 0){
    //         $idkri=$this->input->post('kri');
    //         $cekperiod=array(
    //             'idkri'=> $idkri,
    //         );
    //         $available=$this->Krite->delete($cekperiod);
    //         // print_r($_POST);
    //         if($available){
    //                 echo "Data berhasil di Hapus";
    //         }
    //         else{
    //             header('HTTP/1.1 500 Terjadi Kesalahan 2');
    //         }
    //     }
    //     else{
    //         header('HTTP/1.1 500 Terjadi Kesalahan 1');
    //     }
    // }

    // function addkriteria(){
    //     if(isset($_POST) && count($_POST)>0){
    //         $dataperiode=array(
    //             'ketkri'=>$this->input->post('ket'),
    //             'bobot'=>$this->input->post('bobot'),
    //             'name'=>$this->input->post('name'),
    //             'atribut'=>$this->input->post('att'),
    //             'status'=>$this->input->post('status')
    //         );
    //         $cekmasuk=$this->Krite->add($dataperiode);
    //         // print_r($pass);
    //         if ($cekmasuk) {
    //             echo "Berhasil Tambah Periode";
    //         }
    //         else{
    //             header('HTTP/1.1 500 Gagal Menambahkan');
    //         }
    //     }
    //     else{
    //         $this->load->view('kriteria/add_k');
    //     }
    // }

    }
?>