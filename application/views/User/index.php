<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row-4">
        <i class="fas fa-users fa-3x"></i>
        <center><h4>Halaman Manage Users</h4></center>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-7">
            <?= $this->session->flashdata('message'); ?>
        <a href="<?= base_url('user/add'); ?>" class="btn btn-primary">Tambah</a>
            <div class="table-responsive">
            <table class="table table-stripes mt-4">
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Status</td>
                    <td>Setting</td>
                </tr>

                <?php $i=1; 
                    foreach ($query as $key => $value) { 
                    ?>
                <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $value['nama']; ?></td>
                        <td><?= $value['username']; ?></td>
                        <td><a href="<?= base_url('user/edit/'.$value['id_user']); ?>" class="badge badge-warning">Edit</a>                  
                        <a href="<?= base_url('user/delete/'.$value['id_user']); ?>" class="badge badge-danger" onclick="return confirm('yakin hapus data?')">Delete</a></td>                    
                </tr>
                <?php } ?>
            </table>
            </div>
        </div>
        <div class="col"></div>
    </div>

    </div>
    </div>
</body>
</html>