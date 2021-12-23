<?php 
  $query = $this->db->get('kriteria'); 
  $j = $query->num_rows();
?>

<div class="card ml-4">
    <div class="card-body">
      <h1 class="card-title">Nilai Ideal Positif/Negatif</h1>
      <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <div class="box-header"><h3>Matriks Ideal Positif (A<sup>+</sup>)</h3></div>
      <table class="table table-sm table-bordered mb-5">
        <thead>
            <tr>
                <th colspan="<?php echo $j; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $query5 = $this->db->query("SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria ASC;");
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
    
    <hr>

    <!-- tabel min -->
    <div class="box-header">
        <h3>Matriks Ideal Negatif (A<sup>-</sup>)</h3>
    </div>

    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th colspan="<?php echo $j; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $hk = $this->db->query("SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria ASC;");
                while($dhk = $hk->unbuffered_row()){

                    echo"<th>$dhk->nama_kriteria</th>";
                }
                ?>
            </tr>
            <tr>
                <?php
                for($n=1;$n<=$j;$n++){

                    echo"<th>y<sub>$n</sub><sup>-</sup></th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=0;
            $a= $this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC;");
            echo "<tr>";
            while($da = $a->unbuffered_row()){
                    $idalt=$da->id_kriteria;
                
                    //ambil nilai
                    $n= $this->db->query("SELECT * FROM nilai_matriks where id_kriteria='$idalt'  ORDER BY id_nilai_matriks ASC");
                    
                    $c=0;
                    $ymax=array();
                    while($dn = $n->unbuffered_row()){
                        $idk = $dn->id_kriteria;
                        
                        
                        //nilai kuadrat
                        $nilai_kuadrat=0;
                        $k= $this->db->query("SELECT * FROM nilai_matriks where id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");
                        while($dkuadrat = $k->unbuffered_row()){
                            $nilai_kuadrat = $nilai_kuadrat+($dkuadrat->nilai*$dkuadrat->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif= $this->db->query("SELECT * FROM alternatif");
                        $jml_a = $jml_alternatif->num_rows();	
                        //nilai bobot kriteria (rata")
                        $bobot = 0;
                        $tnilai = 0;
                        
                        $k2= $this->db->query("SELECT * FROM nilai_matriks where id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");
                        while($dbobot = $k2->unbuffered_row()){
                            $tnilai = $tnilai + $dbobot->nilai;
                        }	
                        $bobot=$tnilai/$jml_a;
                        
                        //nilai bobot input
                        $b2= $this->db->query("SELECT * FROM kriteria where id_kriteria='$idk'");
                        $nbot = $b2->unbuffered_row();
                        $bot = $nbot->bobot;
                        
                        
                        $v=round(($dn->nilai/sqrt($nilai_kuadrat))*$bot,4);

                            $ymax[$c]=$v;
                            $c++;
                    }
                    
                    if($nbot->atribut == 'cost'){
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