<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_m extends CI_Model {

    public function get($id = null){
        $this->db->from('nasabah');
        if($id != null){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_all(){

        return $query = $this->db->get('nasabah')->result_array();

    }
    
    public function get_id($id = null){

        return $this->db->get_where('nasabah', ['id' => $id])->row_array();
    }

    public function getDetail($kode){

        $this->db->join('nasabah', 'nasabah.keanggotaan_id=keanggotaan.id');
        $this->db->where('nasabah.kode', $kode);
    	$query = $this->db->get('nasabah');
        return $query->result();
    }
    

    public function create(){

        $no_ktp = $this->input->post('no_ktp');
        $substring = substr($no_ktp, 12, 4);
        //buat no nasabah
        $kode = 'N';

        $this->db->select_max('no_ktp');
        $query = $this->db->get('nasabah')->row_array();
        $query2 = $query['no_ktp'];
        $substrr = substr($query2, 12, 4);
        $tambah = $substrr+1;

        //Hasil akhir No Nasabah
        $no_nasabah = $kode.$substring.sprintf('%03s',$tambah);

        $data1 = [
            'no_nasabah' =>  $no_nasabah,
            'no_ktp' => $no_ktp,
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp'),
            'pendidikan' => $this->input->post('pendidikan'),
            'profesi' => $this->input->post('profesi'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'foto' => 'default.jpg',
            'is_active' => '1'
                ];

                
        $this->db->insert('nasabah', $data1);
        $id_table1    = $this->db->insert_id();
                
        // $data2 = [
        //     'no_nasabah' => $no_nasabah
        // ];

        // $data3 = [
        //     'no_nasabah' => $no_nasabah
        // ];
 
        // $this->db->insert('simpanan',$data2);
        // $id_table2    = $this->db->insert_id();
        
        // $this->db->insert('pinjaman',$data3);
        // $id_table3    = $this->db->insert_id();

        $return_data  = ['nasabah' => $id_table1];
        
        return $return_data;
    }
    
    function create2($table1, $data1, $table2, $data2){
            $this->db->insert($table1, $data1);
            $id_table1    = $this->db->insert_id();
        
            array_unshift($data2, array('id'=>$id_table1));
        
            $this->db->insert($table2, $data2);
            $id_table2    = $this->db->insert_id();
        
            $return_data  = array($table1 => $id_table1, $table2 => $id_table2);
        
        }
    

    public function update_data(){

        $id = $this->input->post('id');
        $data = [ 
                'id' =>  $id,
                'no_nasabah' => $this->input->post('no_nasabah'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('no_tlp'),
                'pendidikan' => $this->input->post('pendidikan'),
                'profesi' => $this->input->post('profesi'),
                ];
        
        $this->db->where('id', $id);
        $this->db->update('nasabah', $data);
    }

}
