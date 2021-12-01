<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="alert alert-primary" role="alert">
            <u>Note :</u><br> 
            Catat dan Simpan No Transaksi. Periksa kembali detail pinjaman dibawah sebelum di print.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">

                    <i class="fas fa-globe float-left mt-1 mr-2"></i>   <h5 class="font-weight-bolder">Koperasi Ubasyada<small class="float-right">Date transaksi</small></h5>
                    <hr>

                    <table class="table table-sm table-light">
                        <tr>
                            <td class="font-weight-normal">To : </td>
                            <th class="font-weight-normal">Kode Transaksi : <?= $nasabah['no_transaksi']; ?></th>
                        </tr>
                        <tr>
                            <th class="font-weight-normal">Nama :<?= $nasabah['nama']; ?></th>
                        </tr>
                        <tr>
                            <td class="font-weight-normal">No Nasabah : <u><?= $nasabah['no_nasabah']; ?></u> </td>
                        </tr>
                        <tr>
                            <td class="font-weight-normal">No Telp: <u><?= $nasabah['no_tlp']; ?></u></td>
                        </tr>
                    </table>

                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jumlah Pinjam</th>
                                <th scope="col">Lama Angsur</th>
                                <th scope="col">Angsuran Perbulan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td ><?= rupiah ($nasabah['jumlah']); ?></td>
                                <td><?= $nasabah['tenor']." bulan"; ?></td>
                                <td><?= rupiah($nasabah['angsuran_perbulan']); ?></td>
                                <td><?= rupiah($nasabah['jumlah']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <table class="table table-sm table-hovered">
                            <tr>
                                <th>Jumlah</th>
                                <th>:</th>
                                <td><?= $nasabah['jumlah']; ?></td>
                            </tr>
                            <tr>
                                <th>Biaya Administrator </th>
                                <th>:</th>
                                <td>2500</td>
                            </tr>

                            <tr>
                                <th>Keterangan </th>
                                <th>:</th>
                                <td>-</td>
                            </tr>
                    </table>
                    <br>
                    <form action="">
                        <button type="submit" class="btn btn-warning mx-2 my-2 float-right"> <i class="fas fa-print"></i> Print</button>
                        <a href="" class="btn btn-primary mt-2 float-right">Back</a> 
                    </form>
                </div>
            </div>
                    
        </div>
    </div>

    <br>
    <br>
    <br>
</div>

<?php 
    function rupiah($angka){
        $hasil_rupiah = "Rp". number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
?>