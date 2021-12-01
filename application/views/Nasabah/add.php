<div class="container">
    <div class="col">
        <div class="row">

    
        <div class="card mb-5">
            
            <div class="card-header text-center"> 
             <h5>Tambah Nasabah</h5>
            </div>
            <div class="card-body">
                <!-- 
                    // $this->db->select_max('no_ktp');
                    // $query = $this->db->get('nasabah')->row_array();
                    // $query2 = $query['no_ktp'];
                    // $substring = substr($query2,6,4);
                    // $ples = $substring+1;
                    // $ples2 = sprintf('%03s',$ples);
                    // var_dump($ples2);

                -->

                <form action="<?= base_url('nasabah/add');?>" method="post">
                    <div class="form-row ">
                        <div class="form-group ml-1">
                            <label for="no_ktp">No Ktp</label>
                            <input type="text" class="form-control" id="no_ktp" placeholder="" name="no_ktp"  value="<?= set_value('no_ktp'); ?>">
                            <?= form_error('no_ktp','<div class="error-sm text-danger">','</div>');?>
                        </div>
                        <div class="form-group ml-2">
                            <label for="nama">Nama </label>
                            <input type="text" class="form-control mr-5" id="nama" placeholder="" name="nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama','<div class="error-sm text-danger">','</div>');?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <?php foreach ($gender as $key => $jk):?>
                        <option><?= $jk?></option>
                        <?php endforeach;?>
                        <?= form_error('jenis_kelamin','<div class="error-sm text-danger">','</div>');?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat');?>"></textarea>
                        <?= form_error('alamat','<div class="error-sm text-danger">','</div>');?>
                    </div>
                    <div class="form-group-row">
                    <div class="form-group ">
                        <label for="no_tlp">No Telp</label>
                        <input type="number" class="form-control" id="no_tlp" placeholder="" name="no_tlp" value="<?= set_value('no_tlp'); ?>">
                        <?= form_error('no_tlp','<div class="error-sm text-danger">','</div>');?>
                    </div>
                    </div>
                    <div class="form-group ">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" placeholder="" name="pendidikan" value="<?= set_value('pendidikan'); ?>">
                        <?= form_error('pendidikan','<div class="error-sm text-danger">','</div>');?>
                    </div>
                    <div class="form-group ">
                        <label for="profesi">Profesi</label>
                        <input type="text" class="form-control" id="profesi" placeholder="" name="profesi" value="<?= set_value('profesi'); ?>">
                        <?= form_error('profesi','<div class="error-sm text-danger">','</div>');?>
                    </div>
              
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control form-control-sm" id="tgl_masuk" placeholder="" name="tgl_masuk" value="<?= set_value('tgl_masuk'); ?>">
                        <?= form_error('tgl_masuk','<div class="error-sm text-danger">','</div>');?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Save</button>
                </form>

            </div>
        
        </div>

        </div>
</div>
</div>
                            