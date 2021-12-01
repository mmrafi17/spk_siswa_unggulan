<?php $key = $this->input->get('no_transaksi'); ?>
<h4 class="text-gray-900 mb-4" style="text-align:center;">Halaman Pembayaran Angsuran</h4>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <?= $this->session->flashdata('message'); ?>
            
            <form action="" method="get" <?= ($key == '') ? '': 'class="d-none"'; ?> >
                <div class="form-row">
                    <div class="form-group mr-2 mt-2">
                        <label for="no_transaksi" class="col">Masukan No Transaksi Pinjam</label>
                    </div> 
                    <div class="form-group">
                        <input type="text" name="no_transaksi" class="form-control" placeholder="......">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary ml-2"><i class="fas fa-search"></i> </button>
                    </div>
                </div>    
            </form>
        </div>
    </div>

    <?php 
    if($key){
        $query = $this->db->like('no_transaksi',$key)->get('pinjaman')->row_array();
        if(!$query){

            echo"<div class='alert alert-danger' role='alert'>
            Data Pinjaman Tidak Ada.
            </div>";
        }elseif($query['jumlah'] == 0){

            echo"<div class='alert alert-success' role='alert'>
            Data Pinjaman Sudah Lunas.
            </div>";
        }else{
            ?>
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
                       
                        <form action="<?= base_url('angsuran/proses_bayar/'.$query['id']);?>" method="post">
                            <tr>
                                <td>
                                    <input type="hidden" value=" <?= $query['id']; ?>">
                                    <input type="hidden" name="no_pinjaman" value="<?= $key; ?>"><?= $key; ?>
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
                    </table>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <div class="table-responsive">
                    <table class="table">
                        <?php 
                        
                        $query2 = $this->db->like('no_transaksi',$key)->get('angsuran_pinjaman')->row_array();
                        
                        $this->db->select('*');
                        $this->db->order_by('angsuran_ke','desc');
                        $query3 = $this->db->get('angsuran_pinjaman')->row_array();?>
                        <thead>
                            <tr>
                                <th scope="col">Angsuran Ke</th>
                                <td scope="col">: <input type="hidden" name="angsuran_ke" value="<?= $query2['angsuran_ke']; ?>"><?= $query3['angsuran_ke']; ?></td>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">Jumlah Bayar</th>
                                    <td>: <input type="hidden" name="jumlah_bayar" value="<?= $query2['jumlah_bayar']; ?>"><?= rupiah($query2['jumlah_bayar']); ?></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><input type="text" class="form-control" name="keterangan" id="" cols="20" rows="1"/></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                            <button type="submit" name="bayar" value="bayar" class="btn btn-warning float-right"><i class="fas fa-credit-card"></i> Bayar</button>
                            <a href="" class="btn btn-primary float-right mr-2">Back</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }
    }     
    ?>
</div>
</div>
<?php function rupiah($angka){
            $hasil_rupiah = "Rp". number_format($angka,2,',','.');
            return $hasil_rupiah;
            }
        ?>
           