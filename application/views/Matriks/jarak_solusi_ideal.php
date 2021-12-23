<?php 
  $query = $this->db->get('kriteria'); 
  $j = $query->num_rows();
?>

<div class="card ml-4">
    <div class="card-body">
      <h1 class="card-title">Jarak Solusi Ideal</h1>
      <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <hr>
      <div class="box-header"><h3 class="box-title">Jarak Solusi Ideal Positif (D<sup>+</sup>)</h3></div>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th ><center>Nomor</center></th>
                    <th ><center>Nama</center></th>
                    <th ><center>D<sup>+</sup></center></th>
                </tr>
            </thead>
            <tbody>
            <?php
            //buat array kolom
            $i2=1;
            $i3=0;
            $maxarray=array();
            $a2= $this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC;");
            echo "<tr>";
            while($da2 = $a2->unbuffered_row()){
                    
                    $idalt2 = $da2->id_kriteria;
                
                    //ambil nilai
                    $n2 = $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idalt2'  ORDER BY id_nilai_matriks ASC");
                    
                    $jarakp2 =0;
                    $c2 = 0;
                    $ymax2 = array();
                    
                    while($dn2 = $n2->unbuffered_row()){
                        $idk2 = $dn2->id_kriteria;
                                    
                        //nilai kuadrat
                        $nilai_kuadrat2 = 0;
                        $k2= $this->db->query("SELECT * from nilai_matriks where id_kriteria='$idk2' order by id_nilai_matriks ASC ");
                        while($dkuadrat2 = $k2->unbuffered_row()){
                            $nilai_kuadrat2 = $nilai_kuadrat2+($dkuadrat2->nilai*$dkuadrat2->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif2 = $this->db->query("SELECT * from alternatif");
                        
                        $jml_a2=  $jml_alternatif2->num_rows();	
                        //nilai bobot kriteria (rata")
                        $bobot2 = 0;
                        $tnilai2 = 0;
                        
                        $k22 = $this->db->query("SELECT * from nilai_matriks where id_kriteria='$idk2'  order by id_nilai_matriks ASC ");
                        while($dbobot2 = $k22->unbuffered_row()){
                            $tnilai2=$tnilai2+$dbobot2->nilai;
                        }	
                        $bobot2 = $tnilai2/$jml_a2;
                        
                        //nilai bobot input
                        $b2= $this->db->query("SELECT * from kriteria where id_kriteria='$idk2'")->row_array();
                        $bot2 = $b2['bobot'];
                        
                        
                        $v2=round(($dn2->nilai/sqrt($nilai_kuadrat2))*$bot2,4);

                        $ymax2[$c2]=$v2;
                        $c2++;
                        
                    #cek benefit atau cost  
                    // echo $nbot2['sifat']." - ".$nbot2['nama_kriteria']."<br>";
                        
                    if($b2['atribut']=='benefit'){
                        $mak2=max($ymax2);
                    }else{
                        $mak2=min($ymax2);
                    }#cek benefit atau cost
                    
                }
            /*				
            echo "<i>ini ymax2</i>";    
            echo "<pre>";    
            print_r($ymax2);    
            echo "</pre>";  
            */    
                
                
                
            //echo $mak2."| ";    
                //hitung D+			
                foreach($ymax2 as $nymax2){
                    
                    $jarakp2=$jarakp2+pow($nymax2-$mak2,2);
                    
                }
                        
                //array max
                $maxarray[$i3]=$mak2;
                        
                //print_r($maxarray);
                //print_r(max($ymax2));			
                $i2++;
                $i3++;
            }
            //session array ymax
            $_SESSION['ymax']=$maxarray;
                
            /*    
            echo "<i>ini min  max</i>";    
            echo "<pre>";    
            print_r($maxarray);    
            echo "</pre>";    
            */
                
            //array baris
            $i=1;
            $ii=0;
            $dpreferensi=array();

            $a= $this->db->query("SELECT * from alternatif order by id_alternatif asc;");
            echo "<tr>";
            while($da= $a->unbuffered_row()){
                    
                    $idalt = $da->id_alternatif;
                
                    //ambil nilai			
                    $n = $this->db->query("SELECT * from nilai_matriks where id_alternatif='$idalt' order by id_nilai_matriks ASC");

                    $jarakp = 0;
                    $c = 0;
                    $ymax = array();
                    $arraymaks = array();
                    while($dn = $n->unbuffered_row()){
                        $idk = $dn->id_kriteria;
                                
                        //nilai kuadrat			
                        $nilai_kuadrat=0;
                        $k= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");
                        while($dkuadrat= $k->unbuffered_row()){
                            $nilai_kuadrat = $nilai_kuadrat+($dkuadrat->nilai*$dkuadrat->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif = $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif asc;");
                        
                        $jml_a = $jml_alternatif->num_rows();	
                        //nilai bobot kriteria (rata")
                        $bobot = 0;
                        $tnilai = 0;
                        
                        $k2 = $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");
                        while($dbobot= $k2->unbuffered_row()){
                            $tnilai = $tnilai+$dbobot->nilai;
                        }	
                        $bobot = $tnilai/$jml_a;
                        
                        //nilai bobot input
                        $b2 = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$idk'")->row_array();
                        $bot = $b2['bobot'];
                                    
                        $v = round(($dn->nilai/sqrt($nilai_kuadrat))*$bot,4);

                            $ymax[$c]=$v;
                            $c++;
                            $mak=max($ymax);
                    
                    }
                
            
            /*    
            echo "<i>ini bobot normalisasi</i>";        
            echo "<pre>";    
            print_r($ymax);    
            echo "</pre>";   
            */    
                
                        //hitung D+ 
                        foreach($ymax as $nymax=>$value){
                            $maks=$_SESSION['ymax'][$nymax];
                            //echo $maks." - ";
                            
                            //echo $value."| ";
                            
                            $final=sqrt($jarakp=$jarakp+pow($value-$maks,2));
                            //echo $jarakp." || ";
                        }
                
                    echo "<tr>
                    <td class='text-center'>$i</td>
                    <td>$da->nama_alternatif</td>
                    <td>".round($final,4)."</td>
                    </tr>";		
                    $dpreferensi[$ii]=round($final,4);
                    $_SESSION['dplus']=$dpreferensi;		
                    //print_r($ymax);
                
                    $i++;
                    $ii++;
                    
            }

            echo "</tr>";

            ?>

            </tbody>
            </table>
            <hr>
            <!-- tabel min -->

            <div class="box-header">
                <h3 class="box-title " >Jarak Solusi Ideal Negatif (D<sup>-</sup>)</h3>
            </div>

            <table class="table table-sm table-bordered">
            <thead>
            <tr>
            <th ><center>Nomor</center></th>
            <th ><center>Nama</center></th>
            <th ><center>D<sup>-</sup></center></th>
            </tr>
            </thead>
            <tbody>
            <?php
            //buat array kolom

            $i2=1;
            $i3=0;
            $minarray=array();
            $a2= $this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC;");
            echo "<tr>";
            while($da2 = $a2->unbuffered_row()){
                    
                    $idalt2 = $da2->id_kriteria;
                
                    //ambil nilai
                        
                        $n2= $this->db->query("SELECT * FROM nilai_matriks where id_kriteria='$idalt2' ORDER BY id_nilai_matriks ASC");
                    $jarakp2=0;
                    $c2=0;
                    $ymin2=array();
                    
                    while($dn2= $n2->unbuffered_row()){
                        $idk2 = $dn2->id_kriteria;
                                    
                        //nilai kuadrat
                        
                        $nilai_kuadrat2=0;
                        $k2= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk2' ORDER BY id_nilai_matriks ASC");

                        while($dkuadrat2 = $k2->unbuffered_row()){
                            $nilai_kuadrat2 = $nilai_kuadrat2+($dkuadrat2->nilai*$dkuadrat2->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif2= $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif asc;");
                        
                        $jml_a2= $jml_alternatif2->num_rows();	
                        //nilai bobot kriteria (rata")
                        $bobot2=0;
                        $tnilai2=0;
                        
                        $k22= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk2' ORDER BY id_nilai_matriks ASC ");

                        while($dbobot2 = $k22->unbuffered_row()){
                            $tnilai2 = $tnilai2 + $dbobot2->nilai;
                        }	

                        $bobot2 = $tnilai2/$jml_a2;
                        
                        //nilai bobot input
                        $b2= $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$idk2'")->row_array();
                        $bot2=$b2['bobot'];
                                    
                        $v2=round(($dn2->nilai/sqrt($nilai_kuadrat2))*$bot2,4);

                            $ymin2[$c2]=$v2;
                            $c2++;
                        
                        #cek benefit atau cost
                        if($b2['atribut']=='cost'){
                            $min2=max($ymin2);
                        }else{
                            $min2=min($ymin2);
                        }#cek benefit atau cost
                        
                            //$min2=min($ymin2);
                                        
                    }
                        
                    //hitung D+
                        
                        foreach($ymin2 as $nymin2){
                            
                            $jarakp2=$jarakp2+pow($nymin2-$min2,2);
                            //echo "--".$mak."---";
                        }
                
                    //array max
                    $minarray[$i3]=$min2;
                
                    //print_r($maxarray);
                    //print_r(max($ymax2));

                    $i2++;
                    $i3++;
            }
            //session array ymax
            $_SESSION['ymin']=$minarray;

            //array baris//////////////////////////////////////////////////
            $i=1;
            $ii=0;
            $id_alt=array();
            $a= $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif asc;");
            echo "<tr>";
            while($da= $a->unbuffered_row()){
                
                    $idalt=$da->id_alternatif;
                
                    //ambil nilai
                        
                        $n= $this->db->query("SELECT * FROM nilai_matriks WHERE id_alternatif='$idalt' ORDER BY id_nilai_matriks ASC");
                    $jarakp=0;
                    $c=0;
                    $ymax=array();
                    $arraymin=array();
                    while($dn= $n->unbuffered_row()){
                        $idk = $dn->id_kriteria;
                        
                        
                        //nilai kuadrat
                        
                        $nilai_kuadrat=0;
                        $k= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");
                        while($dkuadrat = $k->unbuffered_row()){
                            $nilai_kuadrat = $nilai_kuadrat+($dkuadrat->nilai*$dkuadrat->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif= $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif asc;");
                        
                        $jml_a= $jml_alternatif->num_rows();	
                        //nilai bobot kriteria (rata")
                        $bobot=0;
                        $tnilai=0;
                        
                        $k2= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk' order by id_nilai_matriks ASC ");
                        while($dbobot= $k2->unbuffered_row()){
                            $tnilai = $tnilai+$dbobot->nilai;
                        }	
                        $bobot = $tnilai/$jml_a;
                        
                        //nilai bobot input
                        $b2= $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$idk'")->row_array();
                        $bot=$b2['bobot'];
                            
                        $v=round(($dn->nilai/sqrt($nilai_kuadrat))*$bot,4);

                            $ymin[$c]=$v;
                            $c++;
                            $min=max($ymin);

                    }
                        //hitung D+
                        foreach($ymin as $nymin=>$value){
                            $mins=$_SESSION['ymin'][$nymin];
                        //	echo $mins." - ";
                            $final=sqrt($jarakp=$jarakp+pow($value-$mins,2));
                        //	echo $jarakp." || ";

                        }
                
                    echo "<tr>
                    <td class='text-center'>$i</td>
                    <td>$da->nama_alternatif</td>
                    <td>".round($final,4)."</td>
                    </tr>";		
                    //session min
                    $dpreferensi[$ii]=round($final,4);
                    $_SESSION['dmin']=$dpreferensi;	
                    // print_r($ymin);

                    //ambil id alternatif
                    $id_alt[$ii]=$da->id_alternatif;
                    $_SESSION['id_alt']=$id_alt;	
                    
                    $i++;
                    $ii++;
            }
            echo "</tr>";
            ?>
            </tbody>
        </table>

    </div>
    </div>
</div>