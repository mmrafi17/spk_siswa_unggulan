<div class="container-fluid mb-5">
    <div class="card">
    <div class="card-body">
    <h3 class="text-gray-900">Ubah Alternatif</h3>
    <form action="<?= base_url('alternatif_c/update');?>" method="post">
        <div class="form-group">
            <label for="id_alternatif">Kode Alternatif</label>
            <input type="text" class="form-control" id="id_alternatif" name="id_alternatif" value="<?= $query['id_alternatif'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_alternatif">Nama Alternatif </label>
            <input type="text" class="form-control" id="nama_alternatif" placeholder="" name="nama_alternatif" value="<?= $query['nama_alternatif'];?>">
        </div>
        <div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
    </div>

    </div>
</div>
</div>