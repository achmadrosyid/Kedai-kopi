@extends('layouts.master') 
 @section('content')
  
 <section class="content">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="small-box bg-secondary">
                  <div class="inner text-center">
                      <h6>Penjualan Hari Ini</h6>
                      <h2>Rp. 500.000</h2>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
              </div>
          </div>
      </div>

      <div style="width: 80%; margin: 0 auto;">
          <canvas id="penjualanChart"></canvas>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      var ctx = document.getElementById('penjualanChart').getContext('2d');
      var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
          datasets: [{
              label: 'Penjualan Tahun Ini',
              data: [100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650], // Data penjualan per bulan
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      };

      var myChart = new Chart(ctx, {
          type: 'bar',
          data: data,
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  </script>
</section>


@endsection