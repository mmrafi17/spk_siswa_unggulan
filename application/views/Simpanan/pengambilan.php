<?php $keyword = $this->input->get('no_nasabah'); ?>

<div class="container">
    

    <div class="row">
        <div class="col">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Pengambilan</h1>           
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <?php if(!$keyword){ ?>
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action="" method="get">
                <label for="no_nasabah" class="sr-only">No Nasabah</label>
                    <input class="form-control mr-sm-2" type="text"  id="no_nasabah" placeholder="Search" aria-label="Search" name="no_nasabah" onclick="return isNumberKey(event)" value="">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </nav>
        </div>
    </div>
    <?php } ?>
    
    <?php 
    if($keyword!=""){
        $result = $this->simpanan_m->getSimpan($keyword);
        $nasabah = $this->simpanan_m->getNasabah($keyword);

        foreach($result as $row);
        if(!$result){
            echo"<div class='alert alert-danger' role='alert'>
            Data tidak ada!
          </div>";
        }else{ 

            ?>
        
        <div class="card mb-5 ">
        <div class="card-body">
            <div class="row">     
                <div class="col">
                    <?php foreach ($nasabah as $w); ?>
                    <h5> Nama Nasabah : <?= $w['nama']; ?></h5>
                    <h5> No Nasabah : <?= $row['no_nasabah']; ?></h5>
                    <div class="table-responsive">
                    <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No </th>
                            <th scope="col">Wajib</th>
                            <th scope="col">Sukarela</th>
                            <th scope="col">Mudarabah</th>
                            <th scope="col">Qurban</th>
                            <th scope="col">Haji</th>
                        </tr>
                    </thead>                   

                        <?php 
                            //hasil dari jumlah semua simpanan berdasarkan jenis simpanan,eg:3 =js_mudarabah
                            $query1 = $this->db->select_sum('jumlah')->where('jenis_simpanan',1)->get('simpan')->row_array();
                            $query2 = $this->db->select_sum('jumlah')->where('jenis_simpanan',2)->get('simpan')->row_array();
                            $query3 = $this->db->select_sum('jumlah')->where('jenis_simpanan',3)->get('simpan')->row_array();
                            $query4 = $this->db->select_sum('jumlah')->where('jenis_simpanan',4)->get('simpan')->row_array();
                            $query5 = $this->db->select_sum('jumlah')->where('jenis_simpanan',5)->get('simpan')->row_array();
                            
                            $no=1;
                            
                            foreach($query1 as $q1);
                            foreach($query2 as $q2);
                            foreach($query3 as $q3);
                            foreach($query4 as $q4);
                            foreach($query5 as $q5);
                        ?>

                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ($q1) ? rupiah($q1) : '0'; ?></td>
                            <td><?= ($q2) ? rupiah($q2) : '0'; ?></td>
                            <td><?= ($q3) ? rupiah($q3) : '0'; ?></td>
                            <td><?= ($q4) ? rupiah($q4) : '0'; ?></td>
                            <td><?= ($q5) ? rupiah($q5) : '0'; ?></td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col">

                    <form action="<?= base_url('simpanan/pengambilan/'.$row['no_nasabah']);?>" method="post">
                    <div class="form-group">
                        <label for="jumlah">Jumlah Pengambilan</label>
                        <input type="number" class="form-control" id="jumlah" placeholder="" name="jumlah_ambil">
                        <?= form_error('jumlah','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group ">
                        <label for="jenis_simpanan">Jenis Simpanan</label>
                        <select class="form-control" id="jenis_simpanan" name="jenis_simpanan">
                            <option value="">Pilih</option>
                            <option value="1">Wajib</option>
                            <option value="2">Sukarela</option>
                            <option value="3">Mudarabah</option>
                            <option value="4">Qurban</option>
                            <option value="5">Haji</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                    </form>

                </div>
            </div>            
        </div>
    </div>
    <?php }
    }?>
</div>

</div>

    <?php function rupiah($angka){

    $rupiah = "Rp ". number_format($angka,2,',','.');
    return $rupiah;
    }
    ?>
        <script>
        function isNumberKey(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
        }
        </script>

        


    