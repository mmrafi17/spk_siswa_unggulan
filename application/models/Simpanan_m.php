<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_m extends CI_Model {

    public function get($id = null){
        $this->db->from('simpanan');
        if($id != null){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getNasabah($keyword){
        $this->db->select('*');
        $this->db->where('nasabah.no_nasabah', $keyword);
        return $query = $this->db->get('nasabah')->result_array();
    }

    public function getSimpan($keyword){
        $query = $this->db->select('*');
        $query = $this->db->from('simpan');
        $query = $this->db->where('no_nasabah',$keyword);
        $query = $this->db->join('jenis_simpanan','jenis_simpanan.id_jenis_simpanan=simpan.jenis_simpanan');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function getFormSimpan($keyword)
    {
        $query = $this->db->select('nasabah.*, simpan.*');
        $query = $this->db->where('nasabah.no_nasabah', $keyword);
        $query = $this->db->from('nasabah');
        $query = $this->db->join('simpan', 'nasabah.no_nasabah=simpan.no_nasabah', 'left');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function getSimpanan(){

        return $query = $this->db->get_where('simpanan')->result_array();
    }

    public function getDetailSimpanan($no_nasabah){

        return $query = $this->db->get_where('simpanan',['no_nasabah' => $no_nasabah])->row_array();
    }
    
    public function jenis_simpanan(){

        $this->db->select('*');
        $this->db->From('jenis_simpanan');
        return $query = $this->db->get()->result_array(); 
    }

    public function get_all(){

        return $query = $this->db->get('simpan')->result_array();

    }

    public function getById($id){
      
        return $query = $this->db->get_where('history_simpanan', ['no_nasabah' => $id])->result_array() ;

    }

    

    public function create($no_nasabah){

        //buat no transaksi
        // $kode = 'S-';
        // $this->db->select_max('no_transaksi');
        // $query = $this->db->get('history_simpanan')->row_array();
        // $query2 = $query['no_transaksi'];
        // $substrr = substr($query2, 7, 3);
        // $tambah = $substrr+1;
    
        //Hasil akhir No Transaksi
        // $no_transaksi = $kode.$no_nasabah.sprintf('%03s',$tambah);

        $nama = $this->input->post('nama');
        $jumlah = $this->input->post('jumlah');
        $js = $this->input->post('jenis_simpanan');
        $created_at = $this->input->post('tanggal');

        // //input/update tabel simpan
        $data = [
            'no_nasabah' => $no_nasabah,
            'jumlah' => $jumlah,
            'jenis_simpanan' => $js,
            'created_at' => $created_at
                ];

        $this->db->insert('simpan',$data);

        $data1 = [
            'no_nasabah' => $no_nasabah,
            'nama' => $nama,
            'saldo' => $jumlah,
            'jenis_simpanan' => $js,
            'created_at' => $created_at
                ];
        
        $data2 = [
            'no_nasabah' => $no_nasabah,
            'nama' => $nama,
            'jenis_simpanan' => $js,
            'updated_at' => $created_at
                ];       
        
        
        $query1 = $this->db->get_where('simpanan',['no_nasabah'=> $no_nasabah])->result_array();

        foreach($query1 as $q);
            $tambah_saldo = $q['saldo'] + $jumlah;

        if($query1){
            $this->db->set('saldo', $tambah_saldo);
            $this->db->where('no_nasabah', $no_nasabah);
            $this->db->update('simpanan',$data2);
        }else{
            $this->db->insert('simpanan',$data1);
        }

        // $query = $this->db->get('simpan');
        // if($query->num_rows() > 0){
        //     $queryget = $this->db->get_where('simpan',['no_nasabah' => $no_nasabah, 'jenis_simpanan' => $js])->row_array();
        //     foreach($queryget as $row);
        //     $jumlah2 = $row['jumlah']+$jumlah;

        //     $this->db->set('jumlah',$jumlah2);
        //     $this->db->set('jenis_simpanan',$js);
        //     $this->db->update('simpan',$data1);
        // }else {
        //     $this->db->set('jenis_simpanan', $js);
        //     $this->db->insert('simpan',$data);
        // }
    }

    public function ambil($js, $jumlah, $no_nasabah){

        $data = [
                'no_nasabah' => $no_nasabah,
                'jumlah' => $jumlah,
                'jenis_simpanan' => $js,
                'created_at' => date('ymd')
                ];

        $this->db->insert('ambil',$data);

        // $query = $this->db->select('jumlah')->where(['jenis_simpanan' => $js])->get('simpan')->row_array();
        // foreach($query as $q);
        // $query1 = $q-$jumlah;

        // $data1 = [
        //     'created_at' => date('ymd')
        //     ];

        // $this->db->set('no_nasabah',$no_nasabah);
        // $this->db->set('jumlah',$query1);
        // $this->db->set('jenis_simpanan',$js);
        // $this->db->update('simpan',$data1);

    }

    public function pengambilan($no_nasabah){

        $js = $this->input->post('jenis_simpanan');

        $this->db->select('jenis_simpanan');
        $this->db->from('simpan');
        $this->db->where('jenis_simpanan',$js);
        $query = $this->db->get()->row_array();

        $this->db->set('jenis_simpanan',$js);
        $this->db->insert('simpan');
        
        if($query['no_nasabah'] == $no_nasabah){

            if($query['jenis_simpanan'] == $js){
            }else{
                $this->db->insert('simpan');
            }
        
        }

        // $jumlah = $this->db->get_where('simpan', ['no_nasabah' => $no_nasabah])->result_array();
        // $hasil = $jumlah['jumlah']-$this->input->post('jumlah_ambil');
    
        // $this->db->set('saldo',$hasil);
        // $this->db->where('no_nasabah', $no_nasabah);
        // $this->db->update('simpan');
    }


    public function update($keyword = null){

        $this->db->set('no_nasabah');
        $this->db->where('no_nasabah',$keyword);
        $this->db->update('simpanan');
    }

    
    // public function getDetailSimpanan($kode,$per='')
    // {
    //     $periode = '';
    //     $presaldo = 0;
    //     // $bunga = 0.0075;
    //     if($per)
    //         {
    //             $presaldo = $this->preSaldo($kode,$per);
    //             $periode = 'and DATE_FORMAT(tanggal, "%Y-%m") = "'.$per.'"';
    //         }
    //     $query = $this->db->query(
    //         'SELECT `nasabah`.*, `simpanan`.`jenis`, `simpanan`.`tanggal`, `simpanan`.`jumlah`, `simpanan`.`id`, @Balance := @Balance + `simpanan`.`jumlah` AS `saldo` 
    //         FROM (`nasabah`,(SELECT @Balance := '.$presaldo.') AS variableInit) JOIN `simpanan` ON `simpanan`.`no_nasabah`=`nasabah`.`no_nasabah` 
    //         WHERE `angota`.`no_nasabah` =  '.$kode.' '.$periode.' 
    //         ORDER BY simpanan.tanggal');

    //     $data = array();
    //     foreach ($query->result() as $k) 
    //     {
    //         array_push($data, array('id'=>$k->id, 'sld'=>$k->saldo));
    //     }
    //     // print_r($data);
    //     $this->db->update_batch('simpanan', $data, 'id'); 
    //     return $query->result();
    // }

    // public function gethistory($no_nasabah){
    //     $this->db->select('*');
    //     $this->db->where('history_simpanan.no_nasabah',$no_nasabah);
    //     $this->db->from('history_simpanan');
    //     $this->db->join('nasabah','nasabah.no_nasabah=history_simpanan.no_nasabah','left');
    //     $this->db->join('simpanan','simpanan.no_nasabah=history_simpanan.no_nasabah','left');
    //     $query = $this->db->get();

    //     return $query->row_array();
    // }

    // public function sum_simpan(){
    //     $this->db->select('(SELECT SUM(simpan.jumlah) FROM simpan WHERE simpan.jenis_simpanan=1) AS s_wajib', FALSE);
    //     $query = $this->db->get('simpan')->row_array();
    // }

    // public function getFormSimpan($keyword){

    //     $this->db->select('nasabah.id , nasabah.no_nasabah, nasabah.nama, simpanan.id, simpanan.saldo', FALSE);
    //     $this->db->from('nasabah');
    //     $this->db->join('(select * from simpanan where no_nasabah ='.$keyword.' order by tanggal desc limit 1) as simpanan','simpanan.no_nasabah=nasabah.no_nasabah', 'left');
    //     $this->db->where('nasabah.no_nasabah', $keyword);
    //     $this->db->group_by('simpanan.no_nasabah');
    //     return $query = $this->db->get()->result_array();
    // }
}