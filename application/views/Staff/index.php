 <!-- Page Heading -->

 <link rel="stylesheet" type="text/css" href="assets/chartjs/dist/Chart.min.css">
<script type="text/javascript" src="assets/chartjs/dist/Chart.min.js"> </script>

<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
        <div class="contents">
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <h5>Selamat Datang</h5>
        <div class="col mt-3">

          <div class="row">
            <div class="jumbotron">
              <h1 class="display-5">Hello!</h1>

              <canvas id="myChart" width="900" height="300"></canvas>

            </div>
          </div>
        
        </div>

      </div>

        

        
        
        </div>
        <!-- /.container-fluid -->

      <!-- End of Main Content -->    
 
        </div>
</div>

<script>
// Bar Chart Example
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Nasabah', 'Simpanan', 'Pinjaman', 'Angsuran'],
        datasets: [{
            label: '# of Votes',
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
</script>

    
