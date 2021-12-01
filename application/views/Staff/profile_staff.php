<div class="container">
    <div class="row">
        <div class="col">
            <h4>Halaman Profile User</h4>
        </div>
    </div>
    



                <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="<?= base_url('assets/img/icon.png'); ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text">Status : <?= $user['username']; ?></p>
                    <p class="card-text">Email : <?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y') . $user['date_created'];?></small></p>
                    <p><a href="<?= base_url('admin/edit_profile'); ?>" class="btn btn-warning float-right mb-4">Edit</a></p>
                </div>
                </div>
            </div>
            </div>
            
        

</div>
</div>
