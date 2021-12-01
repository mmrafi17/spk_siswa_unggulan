<div class="container-fluid">
<div class="row">
    <div class="col">
    <div class="alert alert-primary" role="alert">
 <u>Note :</u><br> 
  Catat dan Simpan No Transaksi. Periksa kembali detail pinjaman dibawah sebelum di print.
</div>
     
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col">
                <h5>Koperasi UBASYADA
                    <small class="float-right">Date transaksi: <?= date('Y-m-d'); ?></small>
            <hr>
                </h5>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4">
                From: 
            </div>
            <div class="col-4">
                To:
            </div>
            <div class="col-4">
                Kode Transaksi : <?= $nasabah['no_transaksi']; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <strong> KOPERSI SIMPAN PINJAM Ubasyada </strong>
            </div>
            <div class="col-4">
                <strong>Nama: <?= $nasabah['nama']; ?></strong>
            </div>
            <div class="col">
                <strong> No Nasabah : <?= $nasabah['no_nasabah']; ?></strong> 
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                Alamat :
            </div>
            <div class="col">
                No Nasabah : <u><?= $nasabah['no_nasabah']; ?></u>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                Phone :
            </div>
            <div class="col">
                Phone : <u><?= $nasabah['no_tlp']; ?></u>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                Email :
            </div>
            <div class="col-2">
                Email : <u></u>
            </div>
        </div>
    

        <hr>
        <div class="row ">
            <div class="col">
               <table class="table table-striped">
                   <thead>
                   <tr>
                       <th scope="col">Jumlah </th>
                       <th scope="col">Biaya Admin</th>
                       <th scope="col">Jenis Simpanan</th>
                       <th scope="col">Total</th>
                   </tr>
                   </thead>

                   <tbody>
                    <tr>
                        <td><?= number_format($nasabah['jumlah'] );?></td>
                        <td><?= number_format($biaya = '2000'); ?></td>
                        <td><?= $nasabah['jenis_simpanan']; ?></td>
                        <?php $total = $nasabah['jumlah']+$biaya; ?>
                        <td><?= number_format($total); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

            <div class="row mt-3 pb-2">
                <div class="col">
                    Keterangan : 
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-warning mx-2 float-right"> <i class="fas fa-print"></i> Print</button>
                    <a href="" class="btn btn-primary float-right">Back</a>   
                </div>
            </div>

    </div>
        

    </div>
    
    <br>
    <br>
    <br>

   

    </div>
</div>

</div>


























</div>