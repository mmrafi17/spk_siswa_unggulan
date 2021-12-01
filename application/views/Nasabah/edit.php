<div class="container-fluid mb-5">
    <center><h4 class="text-gray-900">Halaman Edit Nasabah</h4></center>    
    
    <div class="row">
        <div class="col">

        <div class="card">
        <div class="card-header">
        <h3>Edit Data</h3>
        </div>

        <div class="card-body">
        <form action="<?= base_url('nasabah/update');?>" method="post">
            <div class="form-group">
                <label for="no_nasabah">No Nasabah</label>
                <input type="hidden" class="form-control" name="id" value="<?= $row['id'];?>">
                <input type="number" class="form-control" id="no_nasabah" name="no_nasabah" value="<?= $row['no_nasabah'];?>">
            </div>
            <div class="form-group">
                <label for="nama">nama </label>
                <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $row['nama'];?>">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="" name="alamat" value="<?= $row['alamat'];?>">
            </div>
            <div class="form-group">
                <label for="no_tlp">No Telp</label>
                <input type="text" class="form-control" id="no_tlp" placeholder="" name="no_tlp" value="<?= $row['no_tlp'];?>">
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" placeholder="" name="pendidikan" value="<?= $row['pendidikan'];?>">
            </div>
            <div class="form-group">
                <label for="profesi">Profesi</label>
                <input type="text" class="form-control" id="profesi" placeholder="" name="profesi" value="<?= $row['profesi'];?>">
            </div>

            <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
        </div>

        </div>
    </div>
</div>
</div>