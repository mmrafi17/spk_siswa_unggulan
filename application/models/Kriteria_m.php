<?php 

class Kriteria_m extends CI_Model {

    function get(){
        return $this->db->get('kriteria')->result_array();
    }

    function get_detail($id){
        return $this->db->get_where('kriteria', ['id_kriteria' => $id])->row_array();
    }

    function create(){

        $kode = $this->input->post('id_kriteria');
        $nama_krit = $this->input->post('nama_kriteria');
        $bobot = $this->input->post('bobot_kriteria');
        $poin1 = $this->input->post('poin1');
        $poin2 = $this->input->post('poin2');
        $poin3 = $this->input->post('poin3');
        $poin4 = $this->input->post('poin4');
        $poin5 = $this->input->post('poin5');
        $att = $this->input->post('atribut_kriteria');
      
        $array = [
            'id_kriteria' => $kode,
            'nama_kriteria' => $nama_krit,
            'bobot' => $bobot,
            'poin1' => $poin1,
            'poin2' => $poin2,
            'poin3' => $poin3,
            'poin4' => $poin4,
            'poin5' => $poin5,
            'atribut' => $att,
        ];

        $this->db->insert('kriteria', $array);
    }

    function update(){

        $id = $this->input->post('id_kriteria');

        $array = [
            'id_kriteria' => $id,
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'bobot' => $this->input->post('bobot_kriteria'),
            'poin1' => $this->input->post('poin1'),
            'poin2' => $this->input->post('poin2'),
            'poin3' => $this->input->post('poin3'),
            'poin4' => $this->input->post('poin4'),
            'poin5' => $this->input->post('poin5'),
            'atribut' => $this->input->post('atribut_kriteria'),
        ];
        
        $this->db->where('id_kriteria', $id);
        $this->db->update('kriteria', $array);
    }

    // function list(){
    //     return $this->db->get('kriteria')->result();
    // }

    // function get($id){
    //     $this->db->where('id_kriteria', $id);
    //     return $this->db->get('kriteria')->row();
    // }
    // function add($dataperiode){
    //     $this->db->set($dataperiode);
	// 	if($this->db->insert('kriteria')){
    //         $this->Fungsi->addhist(array(
    //             'menu'=>'Data Kriteria',
    //             'aksi'=>'Tambah Kriteria ID:'.$this->db->insert_id()
    //             ,
    //             'tanggal_aksi'=>date('Y-m-d H:i:s'),
    //             'user_name'=>$_SESSION['user'])
    //           );
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
    // function delete($cekperiod){
    //     $this->db->select('id_kriteria');
    //     $this->db->from('kriteria');
    //     $this->db->where($cekperiod);
    //     $available=$this->db->get();
    //     // print_r($_POST);
    //     if($available->num_rows()==1){
    //         $this->db->where($cekperiod);
    //         $query=$this->db->delete('kriteria');
    //         if($query){
    //             $this->Fungsi->addhist(array(
    //                 'menu'=>'Data Kriteria',
    //                 'aksi'=>'Hapus Kriteria ID:'.$cekperiod,
    //                 'tanggal_aksi'=>date('Y-m-d H:i:s'),
    //                 'user_name'=>$_SESSION['user'])
    //               );
    //             return true;
    //         }
    //         else{
    //             show_error('Terjadi Kesalahan');
    //         }
    //     }
    //     else{
    //         return false;
    //     }
    // }

    // function edit($cekperiod){
    //     $this->db->select('id_kriteria');
    //     $this->db->from('kriteria');
    //     $this->db->where($cekperiod);
    //     $available=$this->db->get();
    //     // print_r($available->num_rows());
    //     if($available->num_rows()==1){
    //         $dataperiode=array(
    //             'ketkri'=>$this->input->post('ket'),
    //             'bobot'=>$this->input->post('bobot'),
    //             'name'=>$this->input->post('name'),
    //             'atribut'=>$this->input->post('att'),
    //             'status'=>$this->input->post('status')
    //         );
    //         $this->db->where($cekperiod);
    //         $updatedat=$this->db->update('kriteria',$dataperiode);
    //         if ($updatedat) {
    //             $this->addhist(array(
    //                 'menu'=>'Data Kriteria',
    //                 'aksi'=>'Ubah Data Kriteria ID:'.$cekperiod,
    //                 'tanggal_aksi'=>date('Y-m-d H:i:s'),
    //                 'user_name'=>$_SESSION['user'])
    //               );
    //             return true;
    //         }
    //         else{
    //             show_error('Terjadi Kesalahan');
    //         }
    //     }
    //     else{
    //         return false;
    //     }
    // }

 }

?>