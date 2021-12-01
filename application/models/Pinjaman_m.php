<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_m extends CI_Model {

    public function get($id = null){
        $this->db->from('pinjaman');
        if($id != null){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_all(){

        return $query = $this->db->get('pinjaman')->result_array();

    }

    public function getById($no_nasabah){
        return $query = $this->db->get_where('history_pinjaman', ['no_nasabah' => $no_nasabah])->result_array() ;
 
     }

    public function gethistory($no_nasabah){
        $this->db->select('*');
        $this->db->where('pinjaman.no_nasabah',$no_nasabah);
        $this->db->from('pinjaman');
        $this->db->join('nasabah','nasabah.no_nasabah=pinjaman.no_nasabah','left');
        $query = $this->db->get();

        return $query->row_array();


    }

    public function formPinjam($keyword)
    {
        $query = $this->db->select('nasabah.*, pinjaman.id as id, pinjaman.angsuran_perbulan, pinjaman.status,pinjaman.tenor');
        $query = $this->db->where('nasabah.no_nasabah', $keyword);
        $query = $this->db->from('nasabah');
        $query = $this->db->join('pinjaman', 'nasabah.no_nasabah=pinjaman.no_nasabah', 'left');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function insert(){

        $jumlah = $this->input->post('jumlah');
        $no_nasabah = $this->input->post('no_nasabah');

        //buat no transaksi
        $kode = 'Pj-';

        $this->db->select_max('no_transaksi');
        $query = $this->db->get('pinjaman')->row_array();
        $query2 = $query['no_transaksi'];
        $substrr = substr($query2, 7, 3);
        $tambah = $substrr+1;

        //Hasil akhir No Transaksi
        $no_transaksi = $kode.$no_nasabah.sprintf('%03s',$tambah);

        $tenor = $this->input->post('tenor');
        $bunga = 0.05;
        $angsuran_perbulan = $jumlah/$tenor;
        $hasil_bunga = ($jumlah*$bunga)/$tenor;
        $bayar_perbulan = $angsuran_perbulan+$hasil_bunga;

        $total_bayar = $jumlah+($hasil_bunga*$tenor);

        // insert ke table pinjaman
        $data  = [
            'no_nasabah' => $no_nasabah,
            'jumlah' => $total_bayar,
            'tenor' => $tenor,
            'sisa_tenor' => $this->input->post('tenor'),
            'angsuran_perbulan' => $bayar_perbulan,
            'bunga' => $bunga,
            'no_transaksi' => $no_transaksi,
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => '0'
                ];
        
        $this->db->insert('pinjaman',$data);

        //input angsuran_ke
        $angsuran_ke = $tenor-$tenor+1;
        
        // insert ke table angsuran_pinjaman
        $data  = [
            'no_nasabah' => $no_nasabah,
            'no_transaksi' => $no_transaksi,
            'jumlah_bayar' => $bayar_perbulan,
            'angsuran_ke' => $angsuran_ke,
            'created_at' => $this->input->post('tanggal')
                ];
        
        $this->db->insert('angsuran_pinjaman',$data);
    
    }        

    


    public function detail_pinjaman($id){

            return $query = $this->db->get_where('pinjaman', ['id' => $id]);
        
        
    }
     
    public function bayar_pinjaman($no_transaksi){

        return $query = $this->db->get_where('history_pinjaman',['no_transaksi' => $no_transaksi])->result_array();
    }

   
}