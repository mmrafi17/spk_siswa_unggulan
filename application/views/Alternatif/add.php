<?php 
    $this->db->select_max('id_alternatif', 'kode');
    $query = $this->db->get('alternatif')->row_array();
    $kode = $query['kode'];

    //membuat kode unik 
    $noUrut = (int) substr($kode, 2, 3);
    $noUrut++;

    //menjadikan Awalan karakter jadi C
    $char = "A";
    //%03s untuk mengatur 3 karakter di belakang 201353
    $idBaru = $char . sprintf("%02s", $noUrut);

?>


<div class="container-fluid mb-5">
    <div class="card">
    <div class="card-body">
    <h3 class="text-gray-900">Tambah Alternatif</h3>
    <form action="<?= base_url('alternatif_c/create');?>" method="post">
        <div class="form-group">
            <label for="id_alternatif">Kode Alternatif</label>
            <input type="text" class="form-control" id="id_alternatif" name="id_alternatif" value="<?= $idBaru; ?>" readonly>
            <?= form_error('id_alternatif','<div class="error-sm text-danger">','</div>');?>
        </div>
        <div class="form-group">
            <label for="nama_alternatif">Nama Alternatif </label>
            <input type="text" class="form-control" id="nama_alternatif" placeholder="" name="nama_alternatif">
            <?= form_error('nama_alternatif','<div class="error-sm text-danger">','</div>');?>

        </div>
        <div>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
            <button type="reset" class="btn btn-light  border-primary float-right mr-3">Batal</button>
        </div>
    </form>
    </div>

    </div>
</div>
</div>