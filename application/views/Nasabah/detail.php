<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Detail Nasabah</h1>           
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
       
            <?= $this->session->flashdata('message'); ?>
                <?php 
                    foreach ($get_id as $row): 
                    ?>

            <div class="card">
                <div class="card-header">
                    <h5 class="float-left"><?= $row['nama']; ?></h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-sm table-striped">

                        <tr>
                            <th>No Nasabah :</th>
                            <td><?= $row['no_nasabah']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin :</th>
                            <td><?= $row['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat :</th>
                            <td><?= $row['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>No Telp :</th>
                            <td><?= $row['no_tlp']; ?></td>
                        </tr>
                        <tr>
                            <th>Pendidikan :</th>
                            <td><?= $row['pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <th>Profesi :</th>
                            <td><?= $row['profesi']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk :</th> 
                            <td><?= $row['tgl_masuk']; ?></td> 
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="<?= base_url('nasabah/index');?>" class="btn btn-primary float-right mt-2">Kembali</a>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
        
                <?php endforeach;?>
                </div>
        </div>
    </div>

</div>
</div>