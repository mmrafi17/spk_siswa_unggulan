<style>
@media print{

    #cetak{
        display:none;
    }
}
</style>

<div class="container-fluid">
    <center><h4 class="text-gray-900 mb-4">LAPORAN PINJAMAN</h4></center>
    <div class="row">
        <div class="col ml-3 mr-3">

            <div class="card">
                <div class="card-body">

                <a href="#" target="_blank" id="cetak" class="btn btn-primary mb-2 float-right"><i class="fas fa-print"></i> Cetak</a>

                <form class="form-inline">
                    <div class="form-group">
                        <label for="no_nasabah" class="sr-only">Masukan No Nasabah</label>
                        <input type="text" readonly class="form-control-plaintext" id="no_nasabah" value="Masukan No Nasabah">
                    </div>
                    <div class="form-group mx-sm-1">
                        <label for="nasabah" class="sr-only">Masukan No Nasabah</label>
                        <input type="password" class="form-control" id="nasabah" placeholder="....">
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                
                </div>
            </div>
            
        </div>
    </div>
        
    <script>
            // window.print('#cetak');
    </script>
</div>
</div>