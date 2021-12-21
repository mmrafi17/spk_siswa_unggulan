    <div class="card ml-4">
    <div class="card-body">
        <h1 class="card-title">Kriteria</h1>
        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <table class="table table-sm table-bordered font-weight-normal">
          <thead class="thead-light">
            <tr>
              <th class="font-weight-bold">No</th>
              <th class="font-weight-bold">Kode Kriteria</th>
              <th class="font-weight-bold">Nama Kriteria</th>
              <th class="text-center">Bobot</th>
              <th class="text-center">Poin 1</th>
              <th class="text-center">Poin 2</th>
              <th class="text-center">Poin 3</th>
              <th class="text-center">Poin 4</th>
              <th class="text-center">Poin 5</th>
              <th class="text-center">Atribut</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($query as $row) {
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['id_kriteria']; ?></td>
              <td><?= $row['nama_kriteria']; ?></td>
              <td class="text-center"><?= $row['bobot']; ?></td>
              <td class="text-center"><?= $row['poin1']; ?></td>
              <td class="text-center"><?= $row['poin2']; ?></td>
              <td class="text-center"><?= $row['poin3']; ?></td>
              <td class="text-center"><?= $row['poin4']; ?></td>
              <td class="text-center"><?= $row['poin5']; ?></td>
              <td><?= $row['atribut']; ?></td>
              <td class="text-center">
                <a href="<?= base_url('kriteria_c/edit/').$row['id_kriteria'];?>"><i class="far fa-edit text-warning"></i></a>
                <a href="<?= base_url('kriteria_c/delete/').$row['id_kriteria'];?>" onclick = "return confirm('Yakin Ingin Menghapus data?')"><i class="far fa-trash-alt text-danger"></i>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>

        <a href="<?= base_url('kriteria_c/add')?>" class="btn btn-primary float-right mt-5">Tambah</a>
        <a href="#" class="btn border-primary text-primary float-right mr-2 mt-5">Batal</a>
    </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>