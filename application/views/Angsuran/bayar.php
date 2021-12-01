<div class="container">
    <div class="row">
        <div class="col">
            
            <div class="card" >
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <tr>
                                <th>No Pinjaman</th>
                                <th>No Nasabah</th>
                                <th>Angsuran Perbulan</th>
                                <th>Sisa Tenor</th>
                                <th>Status</th>
                            </tr>
                            <?= $key = $this->input->get('no_transaksi'); ?>
                            <?php 
                            if($key){
                                $query = $this->db->like('no_transaksi',$key)->get('pinjaman')->row_array();
                                if(!$query){
                                    echo"data transaksi tidak ada";
                                }else{
                            ?>

                            <form action="<?= base_url('angsuran/proses_bayar?'); ?>" method="post">
                            <tr>
                                <td>
                                    <input type="hidden" value=" <?= $query['id']; ?>">
                                    <input type="hidden" name="no_pinjaman" value="<?= $this->db->get('no_transaksi'); ?>"><?= $key; ?>
                                </td>
                                <td><input type="hidden" name="no_nasabah" value="<?= $query['no_nasabah']; ?>" required><?= $query['no_nasabah']; ?></td>
                                <td><input type="hidden" name="angsuran_perbulan" value="<?= $query['angsuran_perbulan']; ?>"><?= rupiah($query['angsuran_perbulan']); ?></td>
                                <td><input type="hidden" name="sisa_tenor" value="<?= $query['sisa_tenor']; ?>"><?= $query['sisa_tenor']; ?></td>
                                <td><input type="hidden" name="status">Open</td>
                            </tr>
                            <!-- <tr>
                                <th colspan="2">Total</th>
                                <td colspan="3"><?= rupiah($jumlahnominal); ?></td>
                            </tr> -->
                                <?php }
                                } ?>
                        </table>
                        </div>
                                <button type="submit" name="bayar" value="bayar" class="btn btn-warning float-right"><i class="fas fa-credit-card"></i> Bayar</button>
                                <a href="" class="btn btn-primary float-right mr-2">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
