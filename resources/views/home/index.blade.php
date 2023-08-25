@extends('layouts.master') 
 @section('content')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

        <!-- penjualan harian -->
          <div class="col-md-6 col-9">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Penjualan Hari Ini</h4>
                <input type="text" class="col-md-6 col-md-9"> 
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>               
              </div>
             </div>
          </div>

          <!-- .keuntungan harian-->
          <div class="col-md-6 col-9">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Keuntungan Hari Ini</h4>
                <input type="text" class="col-md-6 col-md-9"> 
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
             </div>
            </div>
          </div>
        </div> 

        <!-- grafik laporan penjualan -->
        <div class="card col-md-6 col-md-12 ">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  
                  
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas> 
                  <div class="col-4 text-center">
                    <div id="sparkline-3">

                    </div>
                      <div class="text-white">Sales
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
           
       </div>
     </div>
</section>
@endsection