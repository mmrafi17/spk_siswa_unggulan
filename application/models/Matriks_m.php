<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriks_m extends CI_Model {

    function get_all(){
       return $this->db->get('nilai_matriks')->result_array();
    }

    function get_alternatif(){
        $this->db->select('*');
        $this->db->from('alternatif');
        $query = $this->db->get();
        return $query;
        // $this->db->join('kriteria', 'kriteria.id_kriteria = nilai_matriks.id_nilai_matriks');
    }

    function get_kriteria(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query;
    }

    function get_nilai_matriks(){
        $this->db->select('*');
        $this->db->from('nilai_matriks');
        $query = $this->db->get();
        return $query;
    }

    function get_join(){
        $this->db->select('*');
        $this->db->from('nilai_matriks');
        $query = $this->db->get();
        return $query;
    }

    // flow
    // input id alternatif ke table nilai matriks
    // input id kriteria ke table nilai matriks berdasarkan id alternatif

    function create(){

        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        
        $query =  $this->db->get('kriteria');
        $jumlah_kriteria =  $query->num_rows();

        $j=1;
        //cek id alternatif
        $query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif'");
        $query_result = $query->num_rows();
        
        if($query_result > 0){
            $this->db->where('id_alternatif', $id_alternatif);
            $this->db->delete('nilai_matriks');
        }

        // ini adalah insert dengan perulangan berdasarkan jumlah kriteria
        for($i=1; $i<=$jumlah_kriteria; $i++){
            $id_k = $this->input->post('id_kriteria'.$j);
            $nilai_k =$this->input->post('nilai'.$j);
            // $m=mysql_query("insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$_POST[id_alt]','$id_k','$nilai_k')");
            $data = [
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_k,
                'nilai' => $nilai_k,
            ];

            $this->db->insert('nilai_matriks', $data);
            // $query = $this->db->query("INSERT INTO nilai_matriks (id_alternatif, id_kriteria, nilai) VALUES ('$this->input->post(id_alternatif)', '$id_k','$nilai_k'");
            $j++;
        }
    }
}