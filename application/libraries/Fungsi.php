<?php 

Class Fungsi{
    
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function count_nasabah(){
        $this->ci->load->model('nasabah_m');
        return $this->ci->nasabah_m->get()->num_rows();
    }

    function count_simpanan(){
        $this->ci->load->model('simpanan_m');
        return $this->ci->simpanan_m->get()->num_rows();
    }

    function count_pinjam(){
        $this->ci->load->model('pinjaman_m');
        return $this->ci->pinjaman_m->get()->num_rows();
    }

    function count_angsuran(){
        $this->ci->load->model('angsuran_m');
        return $this->ci->angsuran_m->get()->num_rows();
    }
}

?>