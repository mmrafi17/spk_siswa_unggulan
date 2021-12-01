<div class="container-fluid">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Halaman Nasabah</h1>           
      </div>

    
    <div class="card">
    <div class="card-body">
        <?php if($this->session->flashdata('message')) :?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
       
        <a href="<?= base_url('nasabah/add');?>" class="btn btn-outline-primary mb-4">Tambah</a>
        
        <hr class="mt-0 mb-3">
            <div class="table-responsive">
            <table class="table table-bordered" id="table_id" >
                <thead class="alig-center">
                <tr class="table">
                    <th>No</th>
                    <th>No Nasabah</th>
                    <th>Nama</th>
                    <th colspan="1">Aksi</th>
                    <th colspan="">Simpan Pinjam</th>
                </tr>
                </thead>

                <tbody class="text-left">
                    <?php $no = 1; ?>
                    <?php foreach($get_all as $g):?>
                
                    <tr>
                        <td><?= $no++.'.'; ?></td>
                        <td><?= $g['no_nasabah'];?></td>
                        <td><a href="<?= base_url('nasabah/detail/'. $g['id']) ; ?>"><?= $g['nama']; ?></a></td>
                        <td>
                            <a href="<?= base_url('nasabah/edit/'. $g['id']) ;?>"><i class="fas fa-edit"></i></a> |
                            
                            <a href="<?= base_url('nasabah/delete/'. $g['id']) ;?>" 
                            onclick = "return confirm('Yakin Ingin Menghapus data?')">
                            <i class="fas fa-trash"></i></a>
                        </td>
                        <td>
                            <a href="<?= base_url('simpanan/add'); ?>">Simpan</a> |
                            <a href="<?= base_url('pinjaman');?>">Pinjam</a>
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