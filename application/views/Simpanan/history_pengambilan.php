<div class="container">
    <div class="col">
    <h2 >History Pengambilan</h2> 
        <div class="row">
        
            <div class="card">
            <small>
            <?= $this->session->flashdata('message'); ?>
            </small>

         
            <div class="card-body">
            <table class="table table-bordered" id="table_id">
           
                <thead> 
                    <tr>
                    <td> No</td>
                        <td>No Nasabah</td>
                        <td>Jumlah</td>
                        <td>Tanggal </td>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1;?>
                <?php foreach ($getbyno_ktp as $key => $value):?>
                    <tr>
                        <td><?= $no++?></td>
                        <th> <?= $value['no_nasabah'];?></th>
                        <th> <?= $value['jumlah'];?></th>
                        <th> <?= $value['tanggal'];?></th>
                    </tr>
                </tbody>
            <?php endforeach;?>
            </table>
            <br>
            
            
            </div>

            </div>
            </div>

        
        </div>
    </div>
</div>