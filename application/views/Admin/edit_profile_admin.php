<div class="container">
    <div class="row">
        <div class="col">
            <h4>Halaman Edit Profile User</h4>
        </div>
    </div>
    



                <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-8">
                <div class="card-body">
                <form action="<?= base_url('admin/edit'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="img"></label>
                        <input type="file" class="form-control-file" id="img" name="img">
                    </div>
                    <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="" value="<?= $user['nama']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?= $user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="" value="<?= $user['date_created']; ?>">
                    </div>

                    <p>
                    <button class="btn btn-warning float-right mb-3 " type="submit">  Save</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            
        

</div>
</div>
