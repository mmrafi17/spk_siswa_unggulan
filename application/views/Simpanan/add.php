<?php $keyword = $this->input->get('no_nasabah');?>

<div class="container">
    <center><h3 class="h3 mb-0 text-gray-800">Halaman Tambah Simpanan</h3></center>
        <div class="row mb-4">
            <div class="col">
            
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php if(!$keyword){ ?>
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline" action="" method="get">               
                            <label for="no_nasabah" class="form-label mr-2">Masukan No Nasabah</label>
                            <input class="form-control mr-sm-2" type="text"  id="no_nasabah" placeholder="Search" aria-label="Search" name="no_nasabah" onclick="return isNumberKey(event)" value="<?= $keyword; ?>">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

  
    <div class="row mt-3">
        <div class="col">
        <?php 

        // $query1 = $this->db->get_where('simpanan',['no_nasabah'=> $keyword])->result_array();

        // if($query1){

        //     foreach($query1 as $q);
        //     $tambah_saldo = $q['saldo'] + 100000;

        //     echo$tambah_saldo;
            
        // }else{
        //     echo"input";
        // }

        ?>
     
            <?php 
            if($keyword!=""){
                $result = $this->simpanan_m->getNasabah($keyword);
                    foreach ($result as $row);
                    
                    if(!$result){
                        echo"<div class='alert alert-danger' role='alert'>
                        Nasabah Belum Terdaftar.
                        </div>";
                    }else{ 
                        ?>
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-4"></div>
                                    <div class="col">
                                        <form action="<?= base_url('simpanan/store/'.$row['no_nasabah']); ?>" method="post" class="my-0 mx-3">
                                            <div class="form-group"> 
                                                <label for="no_nasabah">No Nasabah</label>
                                                <input type="text" class="form-control" id="no_nasabah" placeholder="" name="no_nasabah" value="<?= $row['no_nasabah'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $row['nama'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah" placeholder="" name="jumlah">
                                                <?= form_error('jumlah','<div class="text-danger">','</div>');?>
                                            </div>
                                            <div class="form-group ">
                                                <label for="jenis_simpanan">Jenis Simpanan</label>
                                                <select class="form-control" id="jenis_simpanan" name="jenis_simpanan">
                                                    <option value="">Pilih</option>
                                                    <?php foreach($join_jenis as $row): ?>
                                                    <option value="<?= $row['id_jenis_simpanan']; ?>">
                                                        <?= $row['jenis_simpanan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="datetime" class="form-control" id="tanggal" placeholder="" name="tanggal" value="<?= date('Y-m-d'); ?>" readonly>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right">Save</button>
                                        </form>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>

                    <?php }?>
            <?php }?>    
        </div>
    </div>

</div>
<br>

        

        <script>
        function isNumberKey(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
        }
        </script>

        
</div>