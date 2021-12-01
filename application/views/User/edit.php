<div class="container">
    <div class="row-4">
        <center><h4>Halaman Edit User</h4></center>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-4 mt-4">
        <form action="<?= base_url('user/edit'); ?>" method="post">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="<?= $query['username']; ?>" name="username" value="<?= $query['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="<?= $query['nama']; ?>" name="nama" value="<?= $query['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="<?= $query['email']; ?>" name="email" value="<?= $query['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="<?= $query['password']; ?>" name="password" value="<?= $query['password']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="keanggotaan">Keanggotaan</label>
                        <select class="form-control" id="keanggotaan" name="keanggotaan" placeholder="<?= $query['keanggotaan']; ?>" value="<?= $query['keanggotaan']; ?>">
                            <option value="">Pilih</option>
                            <option value="1">Admin</option>
                            <option value="2">Staff</option>
                            <option value="3">Nasabah</option>
                        </select>
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
                </div>
            </form>          
        </div>
        <div class="col"></div>
    </div>

</div>
</div>
