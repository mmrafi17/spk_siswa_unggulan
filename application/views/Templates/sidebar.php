    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion font-weight-light" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-5">SPK Siswa Unggulan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <div class="sidebar-heading">
        <?= $user['username']; ?>
      </div>
      
      <li  <?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link" href="<?= base_url('admin');?>">
          <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li >
      <li <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link pt-0" href="<?= base_url('');?>">
        <i class="fas fa-users"></i>
          <span>Data Siswa</span></a>
      </li>
      <li <?= $this->uri->segment(1) == 'kriteria_c' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link pt-0" href="<?= base_url('kriteria_c');?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Kriteria</span></a>
      </li>
      <li <?= $this->uri->segment(1) == 'alternatif_c' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link pt-0" href="<?= base_url('alternatif_c');?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Alternatif</span></a>
      </li>
      <!-- <li <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link pt-0" href="<?= base_url('matriks_c');?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Nilai Matriks</span></a>
      </li> -->
      <!-- <li <?= $this->uri->segment(1) == 'matriks_c' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Matriks</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Matriks</h6>
            <a class="collapse-item" href="<?= base_url('matriks_c');?>">Nilai Matriks</a>
            <a class="collapse-item" href="cards.html">Nilai Matriks Ternormalisasi</a>
          </div>
        </div>
      </li>  -->
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Lainnya
      </div>


      <li <?= $this->uri->segment(1) == 'matriks_c' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-envelope-open-text"></i>
          <span>Matriks</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headin gTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('matriks_c');?>">Nilai Matriks</a>
            <a class="collapse-item" href="<?= base_url('matriks_c/normalisasi');?>">Matriks Ternormalisasi</a>
            <a class="collapse-item" href="<?= base_url('');?>">Matriks Preference</a>
            <a class="collapse-item" href="<?= base_url('');?>">Matriks Lainnya</a>
          </div>
        </div>
      </li>


       <!-- Nav Item - Pages Collapse Menu -->

       <?php if($user['level'] == 1) {?>
       <li <?= $this->uri->segment(1) == 'laporan' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-file-alt"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headin gTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('');?>">Nasabah</a>
            <a class="collapse-item" href="<?= base_url('');?>">Simpanan</a>
            <a class="collapse-item" href="<?= base_url('');?>">Pinjaman</a>
            <a class="collapse-item" href="<?= base_url('');?>">Angsuran</a>
          </div>
        </div>
      </li>
       <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setting
      </div>

      <!-- nav item setting user -->
      <li <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link" href="<?= base_url('user'); ?>"><i class="fas fa-users-cog"></i>
        <span>Data User</span>
        </a>
      </li>

      <li <?= $this->uri->segment(2) == 'profile_admin' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link" href="<?= base_url('admin/profile_admin'); ?>"><i class="fas fa-user-alt"></i>
        <span>Profile</span>
        </a>
      </li>

      <!-- <?php if($user['level'] == 1) { ?>
      <li <?= $this->uri->segment(1) == 'manage_user' || $this->uri->segment(1) == '' ? 'class="nav-item active"' :'class="nav-item"' ?>>
        <a class="nav-link" href="<?= base_url('manage_user'); ?>"><i class="fas fa-user-alt"></i>
        <span>Manage Users</span>
        </a>
      </li>
      <?php } ?> -->

      <li class="nav-item">
        <a class="nav-link"  data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>

     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->