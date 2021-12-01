<div class="container-fluid">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Halaman Simpanan</h1>           
      </div>

    
    <div class="card" >
    <div class="card-body">
        <?php if($this->session->flashdata('message')) :?>
            <div class="alert alert-success" role="alert">
                <small>
                    <?= $this->session->flashdata('message'); ?>
                </small>
            </div>
        <?php endif; ?>
                
        <a  href="<?= base_url('simpanan/add');?>" class="btn btn-outline-primary mb-3">Simpan</a>
        <a  href="<?= base_url('simpanan/pengambilan');?>" class="btn btn-outline-primary mb-3 ml-3">Ambil</a>
        
        <hr class="mt-0">
            
            <?php
            // $result = $this->simpanan_m->getFormSimpan();
            // if(!$result){
            //     echo"tidak ada data";
            // }else{
            // foreach($result as $row);
            // ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="table_id" >
                <thead class="alig-center">
                <tr class="table">
                        <th>No</th>
                        <th>No Nasabah</th>
                        <th>Nama</th>
                        <th>Setting</th>
                    </tr>
                </thead>

                <tbody class="text-left">
                    <?php 
                        $no = 1;
                        foreach ($query as $value):
                    ?>
                    <tr>
                        <td><?= $no++.'.'; ?></td>
                        <td><?= $value['no_nasabah'];?></td>
                        <td><?= $value['nama'];?></td>    
                        <td><a href="<?= base_url('simpanan/detail_simpanan/'. $value['no_nasabah']) ;?>"> <i class="fas fa-info"> </i></a>
                        <a href="<?= base_url('simpanan/detail_simpanan/'. $value['no_nasabah']) ;?>"> <i class="fas fa-trash"> </i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
    </div>
    </div>


<?php function rupiah($angka){

    $rupiah = "Rp" . number_format($angka,2,',','.');
    return $rupiah;
}
?>
</div>
</div>