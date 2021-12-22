<?php 
  $query = $this->db->get('kriteria'); 
  $j = $query->num_rows();
?>

<div class="card ml-4">
    <div class="card-body">
      <h1 class="card-title">Nilai Matriks</h1>
      <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <table class="table table-bordered table-sm">
        <thead class="thead-light">
            <tr>
              <th scope="row" rowspan="2" class="text-center">No</th>
              <th scope="row" rowspan="2">Nama</th>
              <th scope="col" class="text-center" colspan="<?= $j; ?>">Kriteria</th>
            </tr>
            <tr>
            <?php 
            $no = 1;
            foreach($kriteria as $value){ ?>
                <td class="text-center"><?= $value['id_kriteria']; ?></td>
            <?php  } ?>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($alternatif as $key => $value): ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= $value['nama_alternatif']; ?></td>
              <?php 
                $id_alternatif = $value['id_alternatif'];
                $query = $this->db->query("SELECT * FROM nilai_matriks WHERE id_alternatif='$id_alternatif' ORDER BY id_nilai_matriks ASC");
              ?>
              <?php while($row = $query->unbuffered_row()){ ?>
                <td class="text-center"><?= $row->nilai; ?></td>
              <?php }?>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
        <a href="<?= base_url('matriks_c/add')?>" class="btn btn-primary float-right mt-5">Tambah</a>
        <a href="#" class="btn border-primary text-primary float-right mr-2 mt-5">Cancel</a>
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