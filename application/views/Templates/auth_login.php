<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url();?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

</head>

<!-- <body style="background-image: url('assets/img/ksp.jpg'); 
      
"> -->
<body class="bg-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
    <!-- <img src="assets/img/ksp.jpg" class="img-fluid mb-1 pt-2 rounded" alt="Responsive image" > -->
      <div class="col-lg-5">
        <div class="card o-hidden border-0 shadow-lg my-5 pt-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-4">
                  <div class="text-center">       
                      <small>
                      <?=
                        $this->session->flashdata('message');
                      ?>
                      </small>
                    <!-- <img src="<?= base_url(); ?>assets/img/ksu.jpg" class="img-thumbnail mb-1" alt="Responsive image" style="height:200px;width:200px;"> -->

                    <h1 class="h4 text-gray-900 mb-4  font-weight-light">Login Page</h1>
                  </div>
                  <form class="user" method="post" action="<?= base_url('auth/process');?>"">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a> |
                    <a class="small" href="register.html">Forgot Password</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url();?>/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
