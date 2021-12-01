<div class="container-fluid">
    
    <div class="row">
        <div class="col">

        <div class="card">
            <div class="card-header">
                <h5>Koperasi UBASYADA
                    <small class="float-right"><?= date('d-M-Y'); ?></small>
                </h5>
            </div>
            
            <div class="card-body">
            
                <div class="row">
                    <div class="col">
                        <strong> No Nasabah: <?= $query['no_nasabah']; ?></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Wajib</th>
                                    <th>Sukarela</th>
                                    <th>Mudarabah</th>
                                    <th>Qurban</th>
                                    <th>Haji</th>
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
                                    <td>1</td>
                                <td> <?= ($q1) ? rupiah($q1) : '0'; ?> </td>
                                <td> <?= ($q2) ? rupiah($q2) : '0'; ?> </td>
                                <td> <?= ($q3) ? rupiah($q3) : '0'; ?> </td>
                                <td> <?= ($q4) ? rupiah($q4) : '0' ; ?> </td>
                                <td> <?= ($q5) ? rupiah($q5) : '0'; ?> </td>
                                </tr>

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <table class="table table-sm table-hoverless">
                            <tr>
                                <td><strong> Debit  </strong></td>
                                <td>:</td>
                                <td><?= rupiah($query['saldo']); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kredit </strong></td>
                                <td>:</td>
                                <td><?= rupiah($query['saldo']); ?></td>
                            </tr>  
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-warning mx-2 float-right"> <i class="fas fa-print"></i> Print</button>
                        <a href="" class="btn btn-primary float-right">Back</a>   
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>

</div>
</div>


<?php function rupiah($angka){

$rupiah = "Rp " . number_format($angka,2,',','.');
return $rupiah;
}
?>