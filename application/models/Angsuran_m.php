<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran_m extends CI_Model {

    public function get($id = null){
        
        $this->db->from('pinjaman');
        if($id != null){
            $this->db->where('id',$id);
        }
        
        $query = $this->db->get();
        return $query;
    }

    public function detail($no_nasabah){

        return $query = $this->db->get_where('angsuran_pinjaman', [ 'no_nasabah' => $no_nasabah])->row_array();

    }


    public function proses_bayar($id){

        //Update ke pinjaman
        $jumlah = $this->db->get_where('pinjaman', ['id' => $id])->row_array();
        $hasil = $jumlah['jumlah'] - $this->input->post('angsuran_perbulan');
        $sisa_tenor = $jumlah['sisa_tenor'] - $this->input->post('angsuran_ke');
        
        if($jumlah['jumlah'] == 0){

            $this->db->set('lunas', 1);
        }

        $this->db->set('jumlah',$hasil);
        $this->db->set('sisa_tenor',$sisa_tenor);
        $this->db->where('id', $id);
        $this->db->update('pinjaman');

        //insert ke angsuran pinjaman
        $no_nasabah = $this->input->post('no_nasabah');
        $no_transaksi = $this->input->post('no_pinjaman');
        $jumlah_bayar =  $this->input->post('jumlah_bayar');
        $angsur = ($jumlah['tenor'] - $jumlah['sisa_tenor'])+1;

        $data2 = [
            'no_nasabah' => $no_nasabah,
            'no_transaksi' => $no_transaksi,
            'jumlah_bayar' => $jumlah_bayar,
            'angsuran_ke' => $angsur,
                ];

        $this->db->insert('angsuran_pinjaman',$data2);
    }
}