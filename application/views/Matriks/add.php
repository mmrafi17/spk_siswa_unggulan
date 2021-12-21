<div class="container-fluid mb-5">
    <div class="card">
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <h3 class="text-gray-900">Tambah Nilai Matriks</h3>
            <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <hr>
            
            <form action="<?= base_url('matriks_c/create'); ?>"method="post">
                <div class="form-group mb-0">
                    <label for="nama_alternatif" class="font-weight-bold">Alternatif</label>
                </div>
                <div class="form-group row">
                    <label for="id_alternatif" class="col-sm-2 col-form-label font-weight-light">Alternatif</label>
                    <div class="col-sm-0">
                        <select id="id_alternatif" class="form-control" name="id_alternatif">
                            <option selected>Pilih</option>
                            <?php foreach ($alternatif as $key => $value) {?>
                            <option value="<?= $value['id_alternatif']; ?>"><?= $value['id_alternatif']; ?>  <?= $value['nama_alternatif']; ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('id_alternatif','<div class="error-sm text-danger">','</div>');?>
                    </div>
                </div>
                <hr>
                <div class="form-group mb-0">
                    <label for="kriteria" class="font-weight-bold">Kriteria</label>
                    <?= form_error('kriteria','<div class="error-sm text-danger">','</div>');?>
                </div>
                <?php 
                    $i = 1;
                    //jumlah kriteria
                    $query = $this->db->query('SELECT * FROM kriteria');
                    $jumlah_kriteria =  $query->num_rows();

                    foreach ($kriteria as $key => $value) { 
                ?>
                <div class="form-group">
                    <label for="id_kriteria" class="font-weight-light"><?= $value['nama_kriteria']; ?></label>
                    <input type="hidden" name="id_kriteria<?= $i; ?>" value="<?= $value['id_kriteria']; ?>"/>
                    
                    <div class="form-check form-check-inline ml-4">
                        <input class="form-check-input" type="radio" name="nilai<?= $i; ?>" value="<?= $value['poin1']; ?>">
                        <label class="form-check-label font-weight-light" for="poin1"><?= $value['poin1']; ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"name="nilai<?= $i; ?>" value="<?= $value['poin2']; ?>">
                        <label class="form-check-label font-weight-light" for="poin2"><?= $value['poin2']; ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nilai<?= $i; ?>" value="<?= $value['poin3']; ?>">
                        <label class="form-check-label font-weight-light" for="poin3"><?= $value['poin3']; ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nilai<?= $i; ?>" value="<?= $value['poin4']; ?>">
                        <label class="form-check-label font-weight-light" for="poin4"><?= $value['poin4']; ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nilai<?= $i; ?>" value="<?= $value['poin5']; ?>">
                        <label class="form-check-label font-weight-light" for="poin5"><?= $value['poin5']; ?></label>
                    </div>
                </div>
                <?php 
                    $i++;
                    } ?>
                <div>
                    <button type="submit" class="btn btn-primary float-right" name="submit">Simpan</button>
                    <button type="reset" class="btn btn-light  border-primary float-right mr-3">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>