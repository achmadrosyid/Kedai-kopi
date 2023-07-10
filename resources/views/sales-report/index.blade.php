@extends('layouts.master')
@section('content')
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
