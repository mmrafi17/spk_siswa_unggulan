 <!-- Page Heading -->

<link rel="stylesheet" type="text/css" href="assets/chartjs/dist/Chart.min.css">
<script type="text/javascript" src="assets/chartjs/dist/Chart.min.js"> </script>

<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
  <!-- <div class="contents"> -->
        
    <!-- Begin Page Content -->
    <div class="container-fluid mb-4">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
          <div class="col-sm">
            <h3 class="h3 mb-0 text-gray-800"  style="text-align:center;">Dashboard</h3>
          </div>
        </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="row mt-5">
        
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nasabah</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Simpanan</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pinjam</div>
                                     </div>
                  <div class="col-auto">
                    <i class="fas fa-folder fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Angsuran</div>
                    
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>


          
        <!-- <div class="col mt-3">

          <div class="row">
            <div class="jumbotron">
              <h1 class="display-5">Statistik </h1>

              <canvas id="myChart" width="900" height="300"></canvas>

            </div>
          </div>
        
        </div> -->

    </div>
</div>
        
  <!-- </div> -->
</div>

        <!-- /.container-fluid -->

      <!-- End of Main Content -->    
 

<!-- <script>
// Bar Chart Example
// var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Nasabah', 'Simpanan', 'Pinjaman', 'Angsuran'],
        datasets: [{
            label: 'Statitik of Koperasi',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
 });
 </script>  -->

    
