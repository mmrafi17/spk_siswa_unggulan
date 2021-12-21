<div class="container-fluid mb-5">
    <div class="card">
        <div class="card-body">
            <h3 class="text-gray-900">Edit Kriteria</h3>
            <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <hr>
            <form action="<?= base_url('kriteria_c/confirm_edit'); ?>" method="post">

                <div class="form-group row">
                    <label for="id_kriteria" class="col-sm-2 col-form-label">Id Kriteria</label>
                    <div class="col-sm-0">
                        <input type="text" class="form-control" name="id_kriteria" id="id_kriteria" value="<?= $query['id_kriteria']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row" style="width: 47rem;">
                    <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-0">
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $query['nama_kriteria']; ?>">
                    </div>
                </div>

                <div class="form-group row" style="width: 30rem;">
                    <label for="bobot_kriteria" class="col-sm-2 col-form-label">Bobot</label>
                    <div class="col-sm-0">
                        <input type="number" class="form-control" id="bobot_kriteria" placeholder="" name="bobot_kriteria" value="<?= $query['bobot']; ?>">
                    </div>
                        <!-- <?= form_error('bobot_kriteria','<div class="error-sm text-danger">','</div>');?> -->
                </div>

                <div class="form-row mb-4">
                    <label for="poin" class="col-sm-0 col-form-label">Poin </label>
                    <div class="col">
                        <input type="text" class="form-control font-weight-lighter" placeholder="Poin 1" name="poin1" id="poin" value="<?= $query['poin1']; ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control font-weight-lighter" placeholder="Poin 2" name="poin2" id="poin" value="<?= $query['poin2']; ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control font-weight-lighter" placeholder="Poin 3" name="poin3" id="poin" value="<?= $query['poin3']; ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control font-weight-lighter" placeholder="Poin 4" name="poin4" id="poin" value="<?= $query['poin4']; ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control font-weight-lighter" placeholder="Poin 5" name="poin5" id="poin" value="<?= $query['poin5']; ?>">
                    </div>
                </div> 

                 <div class="form-group row" style="width: 30rem;">
                    <label for="atribut_kriteria" class="col-sm-2 col-form-label">Atribut</label>
                    <div class="col-sm-0">
                        <select class="form-control" readonly id="atribut_kriteria" name="atribut_kriteria" >
                            <option readonly><?= $query['atribut'];?></option>
                        </select>
                    </div>
                <?= form_error('atribut_kriteria','<div class="error-sm text-danger">','</div>');?>
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