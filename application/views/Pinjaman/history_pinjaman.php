<div class="container">
    <div class="col">
    <h2>History Pinjaman</h2> 
        <div class="row">
        
            <div class="card">
            <?php if($this->session->flashdata('message')) :?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>

         
            <div class="card-body">
            <table class="table table-bordered" id="table_id">
           
                <thead> 
                    <tr>
                    <td> No</td>
                        <td>No Nasabah</td>
                        <td>Jumlah</td>
                        <td>Lama</td>
                        <td>Angsuran Ke</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1;?>
                <?php foreach ($getbyno_nasabah as $key => $value):?>
                    <tr>
                        <td><?= $no++?></td>
                        <th> <?= $value['no_nasabah'];?></th>
                        <th> <?= $value['jumlah'];?></th>
                        <th> <?= $value['lama'];?></th>
                        <th> <?= $value['angsuran_ke'];?></th>
                        <th> <?= $value['nominal'];?></th>
                        <th> <?= $value['tanggal'];?></th>
                        <td>belum bayar</td>
                    </tr>
                </tbody>
            <?php endforeach;?>
            </table>
            <br>
            
            <a href="<?= base_url('pinjaman/index');?>" class="btn btn-primary ">Back</a>
            
            
            </div>

            </div>
            </div>

        
        </div>
    </div>
</div>