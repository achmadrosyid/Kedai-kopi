@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Grafik Penjualan</h1>

        <div class="row">
            <div class="col-md-6">
                <canvas id="chartHarian"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="chartBulanan"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <canvas id="chartTahunan"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Data grafik harian
        var dataHarian = {
            labels: ['Hari 1', 'Hari 2', 'Hari 3', 'Hari 4', 'Hari 5'],
            datasets: [{
                label: 'Penjualan Harian',
                data: [10, 20, 30, 25, 15],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Data grafik bulanan
        var dataBulanan = {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
            datasets: [{
                label: 'Penjualan Bulanan',
                data: [100, 200, 150, 180, 120],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Data grafik tahunan
        var dataTahunan = {
            labels: ['Tahun 1', 'Tahun 2', 'Tahun 3', 'Tahun 4', 'Tahun 5'],
            datasets: [{
                label: 'Penjualan Tahunan',
                data: [500, 600, 700, 800, 900],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Konfigurasi opsi grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Membuat grafik harian
        var chartHarian = new Chart(document.getElementById('chartHarian'), {
            type: 'bar',
            data: dataHarian,
            options: options
        });

        // Membuat grafik bulanan
        var chartBulanan = new Chart(document.getElementById('chartBulanan'), {
            type: 'bar',
            data: dataBulanan,
            options: options
        });

        // Membuat grafik tahunan
        var chartTahunan = new Chart(document.getElementById('chartTahunan'), {
            type: 'bar',
            data: dataTahunan,
            options: options
        });
    </script>
</body>
</html>


<div class="row">
  <div class="col-12">
    <div class="card flat">
      <div class="card-header card-header-blue">
          <span class="card-title">Laporan Penjualan</span>
      </div>
      <div class="card-body">
        
        <div id="select-product" style="display: none;" class="row mb-1">
          <label for="product" class="col-sm-2 col-form-label">Produk</label>
          
        </div>

        <hr>
        <h6 class="mb-3">Periode Laporan</h6>
        <div class="row mb-3">
          <div class="col-sm-2">
            <div class="form-check">
              <input class="form-check-input check-mode" type="radio" name="periode" id="byTanggal" value="by_tanggal">
              <label class="form-check-label" for="byTanggal">
              Hari
              </label>
            </div>
          </div>
          <div class="col-sm-2">
            <input class="form-control date-picker" id="tgl_awal" name="tgl_awal" data-date-format='dd-mm-yyyy' autocomplete="off" onkeypress="return false;"
              value="<?= date('d-m-Y') ?>"
            >
          </div>
          <div class="col-sm-1" style="text-align:center; padding:0px !important;">s/d</div>
          <div class="col-sm-2">
            <input class="form-control date-picker" id="tgl_akhir" name="tgl_akhir" data-date-format='dd-mm-yyyy' autocomplete="off" onkeypress="return false;"
              value="<?= date('d-m-Y') ?>"
            >
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-2">
            <div class="form-check">
              <input class="form-check-input check-mode" type="radio" name="periode" id="byBulan" value="by_bulan">
              <label class="form-check-label" for="byBulan">
              Bulan
              </label>
            </div>
          </div>
          <div class="col-sm-3">
            <select class="form-control" id="bulan" name="bulan" required>
              <option value="">Pilih Bulan</option>
              <?php 
              $bulan = date('m');
              $array_bulan=array(
                  '01'=>'Januari',
                  '02'=>'Februari',
                  '03'=>'Maret',
                  '04'=>'April',
                  '05'=>'Mei',
                  '06'=>'Juni',
                  '07'=>'Juli',
                  '08'=>'Agustus',
                  '09'=>'September',
                  '10'=>'Oktober',
                  '11'=>'November',
                  '12'=>'Desember'
              );
              foreach ($array_bulan as $key => $value) { ?>
                  <option 
                  <?php if($bulan==$key){
                      echo " selected";
                  } ?> 
                  value="<?= $key ?>"><?= $value ?></option>    
              <?php } ?>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="number" class="form-control" name="tahun" id="tahun" value="<?= date('Y') ?>">
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-2">
            <div class="form-check">
              <input class="form-check-input check-mode" type="radio" name="periode" id="byTahun" value="by_tahun">
              <label class="form-check-label" for="byTahun">
              Tahun
              </label>
            </div>
          </div>
          <div class="col-sm-5">
            <input type="number" class="form-control" name="tahunan" id="tahunan" value="<?= date('Y') ?>">
          </div>
        </div>
        <hr class="mt-4">
        <div>
          <a href="javascript:;" onclick="printReport()" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp; Cetak PDF</a>
          {{-- <a href="javascript:;" class="btn btn-success"><i class="fa fa-file-excel-o"></i>&nbsp; Export Excel</a> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
