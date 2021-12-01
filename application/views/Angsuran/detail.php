<h4 class="text-gray-900 mb-4" style="text-align:center;">Halaman Detail Angsuran</h4>
<div class="container">
    <div class="row mb-3">
        <di class="col">
            <div class="card">
                <div class="col mt-2">
                    <p>Pembayaran Angsuran ke-<b><?= $query['angsuran_ke']; ?></b>, Dengan Nomor Pinjaman  <b><?= $query['no_transaksi']; ?> </b> Berhasil.</p>
                </div>
            </div>
        </di>
    </div>
    <div class="row">
        <div class="col-sm">
                <?= $this->session->flashdata('message'); ?>
            
        </div>
    </div>

    <div class="card" >
        <div class="card-body">
            <div class="row">
                <div class="col">

                <?php ?>
                    <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <tr>
                            <th>No Pinjaman</th>
                            <th>No Nasabah</th>
                            <th>Angsuran Perbulan</th>
                            <th>Angsuran Ke</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td><?= $query['no_transaksi']; ?></td>
                            <td><?= $query['no_nasabah']; ?></td>
                            <td><?= rupiah($query['jumlah_bayar']); ?></td>
                            <td><?= $query['angsuran_ke']; ?></td>
                        </tr>
                    </table>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Angsuran Ke</th>
                                <td scope="col">: <input type="hidden" name="angsuran_ke"><?= $query['angsuran_ke']; ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Jumlah Bayar</th>
                                <td>: <input type="hidden" name="jumlah"><?= rupiah($query['jumlah_bayar']); ?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><input type="text" class="form-control" name="keterangan" id="" cols="20" rows="1"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                        <button type="submit" class="btn btn-success float-right"><i class="fas fa-print"></i> Print</button>
                        <a href="" class="btn btn-primary float-right mr-2">Back</a>
                </div>
            </div>
        </div>
    </div>
   
</div>
</div>
<?php function rupiah($angka){
            $hasil_rupiah = "Rp". number_format($angka,2,',','.');
            return $hasil_rupiah;
            }
        ?>
           