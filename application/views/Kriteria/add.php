<?php 
    $this->db->select_max('id_kriteria', 'kode');
    $query = $this->db->get('kriteria')->row_array();
    $kode = $query['kode'];

    //membuat kode unik 
    $noUrut = (int) substr($kode, 2, 3);
    $noUrut++;

    //menjadikan Awalan karakter jadi C
    $char = "C";
    //%03s untuk mengatur 3 karakter di belakang 201353
    $idBaru = $char . sprintf("%02s", $noUrut);

?>

<div class="container-fluid mb-2">
    <div class="card">
        <div class="card-body">
            <h3 class="text-gray-900">Tambah Kriteria</h3>
            <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <hr>
        <form action="<?= base_url('kriteria_c/create');?>" method="post">
            <div class="form-group row">
                <label for="id_kriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
                <div class="col-sm-0">
                    <input type="text" class="form-control font-weight-light" name="id_kriteria" id="id_kriteria" value="<?= $idBaru; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-0">
                    <input type="text" class="form-control font-weight-light" id="nama_kriteria" name="nama_kriteria" placeholder="....">
                </div>
                <?= form_error('nama_kriteria','<div class="error-sm text-danger">','</div>');?>
            </div>
            <div class="form-group row">
                <label for="bobot_kriteria" class="col-sm-2 col-form-label">Bobot</label>
                <div class="col-sm-0">
                    <select class="form-control font-weight-light" id="bobot_kriteria" name="bobot_kriteria">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
            <?= form_error('bobot_kriteria','<div class="error-sm text-danger">','</div>');?>
                <label for="atribut_kriteria" class="col-sm-2 col-form-label">Atribut</label>
                <div class="col-sm-2">
                    <select class="form-control font-weight-light" id="atribut_kriteria" name="atribut_kriteria">
                        <?php foreach ($att as $key => $a){ ?>
                        <option><?= $a?></option>
                        <?php };?>
                    <?= form_error('atribut_kriteria','<div class="error-sm text-danger">','</div>');?>
                    </select>
                </div>
            </div>
            <div class="form-row mb-4">
                <label for="poin" class="col-sm-0 col-form-label">Poin </label>
                <div class="col">
                    <input type="text" class="form-control font-weight-lighter" placeholder="Poin 1" name="poin1" id="poin1">
                </div>
                <div class="col">
                    <input type="text" class="form-control font-weight-lighter" placeholder="Poin 2" name="poin2" id="poin2">
                </div>
                <div class="col">
                    <input type="text" class="form-control font-weight-lighter" placeholder="Poin 3" name="poin3" id="poin3">
                </div>
                <div class="col">
                    <input type="text" class="form-control font-weight-lighter" placeholder="Poin 4" name="poin4" id="poin4">
                </div>
                <div class="col">
                    <input type="text" class="form-control font-weight-lighter" placeholder="Poin 5" name="poin5" id="poin5">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                <button type="reset" class="btn btn-light  border-primary float-right mr-3">Batal</button>
            </div>
        </form>
        </div>

    </div>
</div>
</div>