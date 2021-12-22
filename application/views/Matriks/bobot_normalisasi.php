<?php 
  $query = $this->db->get('kriteria'); 
  $j = $query->num_rows();
?>

<div class="card ml-4">
    <div class="card-body">
      <h1 class="card-title">Nilai Bobot Ternormalisasi</h1>
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
                
                //ambil seluruh data pada tabel nilai matriks berdasarkan id alternatif dengan $id_alternatif 
                $query = $this->db->query("SELECT * FROM nilai_matriks WHERE id_alternatif='$id_alternatif' ORDER BY id_nilai_matriks ASC");
              ?>

              <?php 
                while($row = $query->unbuffered_row()){
                  $id_kriteria = $row->id_kriteria;
                  $kuadrat = 0;

                  // ambil seluruh data pada tabel nilai matriks berdasarkan id kriteria dengan $id_kriteria 
                  $query2= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$id_kriteria'");

                  while($row2 = $query2->unbuffered_row()){
                    $kuadrat = $kuadrat + ( $row2->nilai * $row2->nilai );
                  }

                  $jml_alternatif = $this->db->query("SELECT * FROM alternatif");
                  $jml_a= $jml_alternatif->num_rows();

                  //nilai bobot kriteria (rata")
                  $bobot=0;
                  $tnilai=0;  

                  $query3 = $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$id_kriteria' ");

                  while($row3= $query3->unbuffered_row()){
                    $tnilai = $tnilai + $row3->nilai;
                  }	

                  $bobot = $tnilai / $jml_a;

                  //nilai bobot input
                  $b2= $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$id_kriteria'")->row_array();

                  $bot=$b2['bobot'];


                ?>
                <td class="text-center"><?= round(($row->nilai/sqrt($kuadrat))*$bot,3); ?></td>

              <?php 
                }?>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
        <a href="<?= base_url('matriks_c/add')?>" class="btn btn-primary float-right mt-5">Tambah</a>
        <a href="#" class="btn border-primary text-primary float-right mr-2 mt-5">Cancel</a>
    </div>
    </div>
</div>
