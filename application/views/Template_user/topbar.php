<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    
<div class="top-bar bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6"></div> 
            <div class="col-lg-4 ml-lg-auto col-md-6"></div> 
        </div>
    </div>
</div>

<!-- Main Content -->
<div id="content">

    <div class="top-bar">
                <div class="row bg-dark pl-4 pt-2">
                    <i class="fas fa-map-marker-alt mx-2 my-1 text-light"></i>  
                    <p class="font-weight-light text-light"> Jl. Dewi Sartika Gg. Nangka No2. Ciputat, Tangerang Selatan </p>
                </div>
    </div>
  <!-- Topbar -->
  <div class="container-fluid mt-4 mb-4" >
   
    <nav class="navbar navbar-expand-lg bg-warning rounded">
        <a class="navbar-brand h2 text-light" href="<?= base_url('template_user'); ?>">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="nav-link text-light" href="<?= base_url('template_user/fitur'); ?>">Features</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="<?= base_url('template_user/about'); ?>">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="#">Setting</a>
        </li>
        </ul>
    </div>
    <div class="row">
        <a href="<?= base_url('template_user/login'); ?>" class="navbar-brand text-light h4">Login</a>
    </div>
    </nav>

  </div>
  <!-- End of Topbar -->
  