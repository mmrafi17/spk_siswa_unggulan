<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_m extends CI_Model {

    function create(){
        $array = [
            'id_alternatif' => $this->input->post('id_alternatif'),
            'nama_alternatif' => $this->input->post('nama_alternatif')
        ];

        $this->db->insert('alternatif', $array);
    }

    function read(){
        return $this->db->get('alternatif')->result_array();
    }

    function get_where($id){
        return $this->db->get_where('alternatif', ['id_alternatif' => $id])->row_array();
    }

    function update(){
        $data = [
            'id_alternatif' => $this->input->post('id_alternatif'),
            'nama_alternatif' => $this->input->post('nama_alternatif')
        ];
    
        $this->db->where('id_alternatif', $this->input->post('id_alternatif'));
        $this->db->update('alternatif', $data);
    }
}




?>