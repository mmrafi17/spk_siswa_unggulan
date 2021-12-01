<?php $keyword = $this->input->get('no_nasabah');?>

<h3 style="text-align:center;">Halaman Tambah Pinjaman</h3>

<div class="container">

    <div class="col"> 
        <div class="form-group-row">
            
        <?php if(!$keyword){ ?>
            <div class="card mb-2">
                <div class="card-body">
                    <form class="form-inline" action="" method="get">
                        <label for="no_nasabah" class="form-label mr-2">Masukan No Nasabah</label>
                        <input class="form-control" type="text"  id="no_nasabah" placeholder="...." aria-label="Search" name="no_nasabah" onclick="return isNumberKey(event)" value="<?= $keyword; ?>">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>   
        <?php } ?>

            <?php if($keyword!=""){
                $result = $this->pinjaman_m->formPinjam($keyword);
                    foreach ($result as $row); 
                    if(!$result){
                        echo"<div class='alert alert-danger' role='alert'>
                        Nasabah Belum Terdaftar.
                        </div>";
                    }elseif($row['id'] > 0  && $row['status'] < $row['tenor']){ 
                        echo"<div class='alert alert-danger' role='alert'>
                        Pinjaman sebelumnya belum lunas.
                        </div>";
                    }else{
                        if($this->input->get('itung')){
                            $method = 'post';
                            $disabled = 'readonly';
                            $re_url = $_SERVER['REQUEST_URI'].'&itung=';
                        }else {
                            $method = 'get';
                            $disabled = '';
                            $re_url = '';
                        }
            ?>
                            
            <div class="card mb-5 float-center" >
                <div class="card-body mx-4">   
                    <form action="<?= base_url('pinjaman/add'); ?>" method="post">
                
                        <div class="form-group row">
                            <label for="no_nasabah" class="col-sm-2 col-form-label">No Nasabah</label>
                            <div class="col">
                                <input type="number" class="form-control form-control-sm" id="no_nasabah" placeholder="" name="no_nasabah" value="<?= $row['no_nasabah'];?>" readonly>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="anggota" class="col-sm-2 col-form-label">Pilih Anggota</label>
                            <div class="col">
                                <select class="form-control form-control-sm" id="anggota"  name="anggota" value="">
                                <?php foreach($anggota as $agt): ?>
                                <option><?= $agt['nama']; ?> (<?= $agt['no_nasabah']; ?>)</option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div> -->
                        
                
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col">
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="" value="<?= $row['nama'];?>" readonly>
                            </div>
                        </div>
                        
                        <div class="perhitungan">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="jumlah">Jumlah Pinjam (Rp)</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-sm" id="jumlah" name="jumlah" type="number" onfocus="startHitung()" onblur="akhirHitung()" value="<?php echo $this->input->post('jumlah')?>" required <?php echo $disabled?>/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="tenor">Tenor</label>
                            <div class="col">
                                <select name="tenor" id="tenor" class="form-control form-control-sm"  onfocus="startHitung()" onblur="akhirHitung()"
                                >
                                    <option value="">Pilih</option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                </select>
                            </div>
                            <label class="mx-2" >Kali, atau Nominal Angsuran</label>
                            <div class="col-sm-6">
                                <input <?php echo $disabled?> class="form-control form-control-sm" id="angsuran_perbulan" name="angsuran_perbulan" type="number" step="1" min="1" value="<?php echo $this->input->post('angsuran_perbulan')?>" />
                            </div>
                        </div>
                        </div>

                        <!-- <div class="form-group row mt-4">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Pinjam(Rp)</label>
                            <div class="col-sm-10">
                            <input class="form-control form-control-sm" id="jumlah" name="jumlah" type="text"  required />
                            </div>
                        </div> -->

                        <!-- <div class="form-group row mt-4">
                            <label for="tenor" class="col-sm-2 col-form-label">Tenor</label>
                            <div class="col-sm-2">
                            <select class="form-control" id="tenor" name="tenor">
                            <option value="6">6 bulan</option>
                            <option value="12">12 bulan</option>
                            <option value="32">32 bulan</option>
                            <option value="64">64 bulan</option>
                            </select>
                            </div>
                        </div> -->
                        
                        <div class="form-group row mt-4">
                            <label for="bunga" class="col-sm-2 col-form-label">Bunga % Per 6 bulan</label>
                            <div class="col-sm-4">
                            <input  type="text" class="form-control" id="bunga" name="bunga"  step="1" min="1" placeholder="5%"  readonly/>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="administrasi" class="col-sm-2 col-form-label">Biaya Administrasi</label>
                            <div class="col-sm-4">
                            <input  type="text" class="form-control " id="administrasi" name="administrasi"  step="1" min="1" value="2000" readonly/>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-4">
                            <input type="date" class="form-control" id="tanggal" placeholder="" name="tanggal">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control " id="keterangan" name="keterangan" step="1" min="1" value="<?= $this->input->post('keterangan'); ?>"/>
                            </div>
                        </div>
                        <button type="submit" name="proses" class="btn btn-primary  float-right">Save</button>
                    </form>
                    
                </div>
                        
                    
                </div>

                        <?php }?>
            <?php }?>
   
        </div>
    </div>
                
                            

</div>
</div>

<script text="text/javascript">
    function startHitung(){
        interval = setInterval("hitung()",1);
    }

    function hitung(){
        var bil1 = parseInt(document.getElementById("jumlah").value);
        var bil2 = parseInt(document.getElementById("tenor").value);
        jumlah = bil1 / bil2
        document.getElementById("angsuran_perbulan").value = jumlah;
    }
    function akhirHitung(){
        clearInterval(interval);
    }
</script>


<script text="text/javascript">
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

        return true;
    } 
</script>

