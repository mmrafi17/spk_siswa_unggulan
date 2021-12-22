<?php 
  $query = $this->db->get('kriteria'); 
  $j = $query->num_rows();
?>

<div class="card ml-4">
    <div class="card-body">
      <h1 class="card-title">Nilai Ideal Positif/Negatif</h1>
      <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th colspan="<?php echo $j; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $query5 = $this->db->query("SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria asc;");
                while($row5= $query5->unbuffered_row()){

                    echo"<th>$row5->nama_kriteria</th>";
                }
                ?>
            </tr>
            <tr>
                <?php
                for($n=1;$n<=$j;$n++){
                    echo"<th>y<sub>$n</sub><sup>+</sup></th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $query = $this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC;");

            echo "<tr>";
            while($row = $query->unbuffered_row()){
                    
                    $id_kriteria = $row->id_kriteria;
                
                    //ambil nilai
                        $query1= $this->db->query("SELECT * FROM nilai_matriks where id_kriteria='$id_kriteria'  ORDER BY id_nilai_matriks ASC");
                    
                    $c=0;
                    $ymax = array();
                    while($row1 = $query1->unbuffered_row()){
                        $id_kriteria = $row1->id_kriteria;
                        
                        
                        //nilai kuadrat
                        
                        $nilai_kuadrat = 0;
                        $query2 = $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$id_kriteria' ORDER BY id_nilai_matriks ASC");

                        while($row2 = $query2->unbuffered_row()){
                            $nilai_kuadrat = $nilai_kuadrat+($row2->nilai * $row2->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif= $this->db->query("SELECT * FROM alternatif");
                        $jml_a = $jml_alternatif->num_rows();	
                        //nilai bobot kriteria (rata")
                        $bobot=0;
                        $tnilai=0;
                        
                        $query3= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$id_kriteria'  ORDER BY id_nilai_matriks ASC ");

                        while($row3 = $query3->unbuffered_row()){
                            $tnilai = $tnilai+$row3->nilai;
                        }	
                        $bobot = $tnilai/$jml_a;
                        
                        //nilai bobot input
                        $query4 = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$id_kriteria'")->row_array();
                        $bot = $query4['bobot'];
                        
                        
                        $v = round(($row1->nilai/sqrt($nilai_kuadrat))*$bot,4);

                            $ymax[$c] = $v;
                            $c++;
                    }
                    
                    if($query4['atribut'] == 'benefit'){
                    //echo "<pre>";    
                    //print_r($ymax);    
                    //echo "</pre>";    
                
                    echo "<td>".max($ymax)."</td>";
                    }else{
                    echo "<td>".min($ymax)."</td>";
                    }
            }
            echo "</tr>";
            ?>
        </tbody>
    </table>

        <a href="<?= base_url('matriks_c/add')?>" class="btn btn-primary float-right mt-5">Tambah</a>
        <a href="#" class="btn border-primary text-primary float-right mr-2 mt-5">Cancel</a>
    </div>
    </div>
</div>