<?php
// session_start();
// include ("konfig/koneksi.php");


// echo "<i>cek sessionn dplus</i>";    
// echo "<pre>";    
// print_r($_SESSION['dplus']);    
//  echo "</pre>";  

// echo "<i>cek sessionn dmin</i>";    
// echo "<pre>";    
// print_r($_SESSION['dmin']);    
// echo "</pre>";  
?>

<div class="card ml-4">
    <div class="card-body">
        <div class="box-header">
            <h3 class="box-title">Nilai Preferensi</h3>
            <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <hr>

            <p>
                <a style="margin-bottom:10px" href="cetak.php" target="_blank" class="btn btn-info float-right"><span class='glyphicon glyphicon-print'></span>Cetak Laporan</a>
            </p>
        </div>

        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th ><center>Nomor</center></th>
                    <th ><center>Nama</center></th>
                    <th ><center>V<sub>i</sub></center></th>
                </tr>
            </thead>
            <tbody>
            <?php

            $i=1;
            $sortir = array();
            $a= $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif ASC;");
            echo "<tr>";

            while($da = $a->unbuffered_row()){

                    $idalt = $da->id_alternatif;
                
                    //ambil nilai
                    $n = $this->db->query("SELECT * FROM nilai_matriks WHERE id_alternatif='$idalt' ORDER BY id_nilai_matriks ASC");
                    
                    $c = 0;
                    $ymax = array();
                    
                    while($dn = $n->unbuffered_row()){
                        $idk = $dn->id_kriteria;
                        
                        //nilai kuadrat
                        $nilai_kuadrat=0;
                        $k= $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");

                        while($dkuadrat = $k->unbuffered_row()){
                            $nilai_kuadrat = $nilai_kuadrat + ($dkuadrat->nilai*$dkuadrat->nilai);
                        }

                        //hitung jml alternatif
                        $jml_alternatif= $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif asc;");
                        $jml_a= $jml_alternatif->num_rows();	

                        //nilai bobot kriteria (rata")
                        $bobot = 0;
                        $tnilai = 0;
                        
                        $k2 = $this->db->query("SELECT * FROM nilai_matriks WHERE id_kriteria='$idk' ORDER BY id_nilai_matriks ASC ");

                        while($dbobot = $k2->unbuffered_row()){
                            $tnilai = $tnilai + $dbobot->nilai;
                        }	
                        $bobot = $tnilai / $jml_a;
                        
                        //nilai bobot input
                        $b2 = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$idk'")->row();
                        $bot = $b2->bobot;
                        
                        $v=round(($dn->nilai/sqrt($nilai_kuadrat))*$bot);

                            $ymax[$c]=$v;
                            $c;
                            $mak=max($ymax);
                            $min=min($ymax);	
                        
                    }

                    $i++;

            }

            foreach($_SESSION['dplus'] as $key=>$dxmin){
                #ubah ke nol hasil akhir
                $nilaid = 0; 
                $nilaiPre = 0;     
                $nilai = 0;    
                    
                $jarakm = $_SESSION['dmin'][$key];
                $id_alt = $_SESSION['id_alt'][$key];
                
                //nama alternatif
                $nama = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alt'")->row();
                    
                //echo $jarakm." / <br> ";	
                //echo $dxmin." + ";	
                //echo $jarakm."<br><br>";	
                $nilaiPre = $dxmin + $jarakm;
                $nilaid = $jarakm/$nilaiPre;
                $nilai = round($nilaid,4);
                    
                //simpan ke tabel nilai preferensi
                $nm = $nama->nama_alternatif;
                
                $sql2 = $this->db->query("INSERT INTO nilai_preferensi (nama_alternatif, nilai) VALUES('$nm','$nilai')");
                
                //echo "insert into nilai_preferensi (nm_alternatif,nilai) values('$nm','$nilai')";
            }
            
            //ambil data sesuai dengan nilai tertinggi
            $i=1;
            $sql3= $this->db->query("SELECT * FROM nilai_preferensi ORDER BY nilai DESC");

            while($data3 = $sql3->unbuffered_row()){
                echo "<tr>
                <td>".$i."</td>
                <td>$data3->nama_alternatif</td>
                <td>$data3->nilai</td>
                </tr>";
                
                $i++;
            }
            
            
            //kosongkan tabel nilai preferensi
            $del= $this->db->query("DELETE FROM nilai_preferensi");

            echo "</tr>";
            ?>

            </tbody>
        </table>
    </div>
</div>
</div>