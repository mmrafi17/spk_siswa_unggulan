<div class="container-fluid">

    <h4 class="text-gray-900 mb-4" style="text-align:center;">Halaman Pinjaman</h4>           

    <?php $no_nasabah; ?>
    
    <div class="card">
    <div class="card-body">
        <?php if($this->session->flashdata('message')) :?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('pinjaman/add');?>" class="btn btn-outline-primary mb-2 mt-0">Tambah</a>
    
            <div class="table-responsive">
            <table class="table table-bordered" id="table_id" >
                <thead class="alig-center">
                <tr>
                    <th>No</th>
                    <th>No Nasabah</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="text-left">
                <?php $no = 1; ?>
                <?php foreach($get_all as $g):?>
                <tr>
                    <td><?= $no++.'.'; ?></td>
                    <td><?= $g['no_nasabah'];?></td>
                    <td><?= rupiah( $g['jumlah']);?></td>
                    <td><?= $g['tanggal'];?></td>    
                    <td>
                        <?php if($g['status'] == '1'){
                            echo"Lunas";
                        }else{
                            echo"Belum Lunas";
                        } ?>
                    <td>
                    <a href="<?= base_url('pinjaman/detail/'. $g['id']) ;?>"><i class="fas fa-info"></i></a>
                    <a href="<?= base_url('pinjaman/bayar/'. $g['id']) ;?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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