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
        <center><h4>Halaman Tambah User</h4></center>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-4 mt-4">
            <form action="<?= base_url('user/add'); ?>" method="post">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="" name="username" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="" name="nama" value="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="keanggotaan">Keanggotaan</label>
                        <select class="form-control" id="keanggotaan" name="keanggotaan">
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
    
</body>
</html>