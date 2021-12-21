<div class="card ml-4" >
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <h1 class="card-title">Alternatif</h1>
        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <table class="table table-sm table-bordered">
          <thead class="thead-light">
            <tr>
                <th class="text-center font-weight-bold">No</th>
                <th class="text-center font-weight-bold">Kode Alternatif</th>
                <th class="text-center font-weight-bold">Nama Alternatif</th>
                <th class="text-center font-weight-bold">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
              $no = 1;
              foreach ($query as $row)
              {
            ?>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $row['id_alternatif']; ?></td>
                <td class="text-center"><?= $row['nama_alternatif']; ?></td>
                <td class="text-center">
                <a href="<?= base_url('alternatif_c/edit/').$row['id_alternatif'];?>"><i class="far fa-edit text-warning"></i></a>
                <a href="<?= base_url('alternatif_c/delete/').$row['id_alternatif'];?>" onclick = "return confirm('Yakin Ingin Menghapus data?')"><i class="far fa-trash-alt text-danger"></i>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <a href="<?= base_url('alternatif_c/add')?>" class="btn btn-primary float-right">Add</a>
        <a href="#" class="btn border-primary text-primary float-right mr-2">Cancel</a>
    </div>
    </div>
</div>

<!-- untuk modal supaya alertnya hilang bisa pake kondisi  dengan misal a hidden dan b muncul -->

<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal Alternatif</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('alternatif_c/create');?>" method="post">
        <div class="modal-body">
              <div class="mb-3">
                  <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
                  <input type="text" class="form-control" id="kode_alternatif" aria-describedby="emailHelp" name="kode_alternatif" value="<?= set_value('kode_alternatif'); ?>">
                  <?= form_error('kode_alternatif','<div class="error-sm text-danger">','</div>');?>
                  <div id="emailHelp" class="form-text"></div>
              </div>
              <div class="mb-3">
                  <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                  <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" value="<?= set_value('nama_alternatif'); ?>">
                  <?= form_error('nama_alternatif','<div class="error-sm text-danger">','</div>');?>
              </div>
              <!-- <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>