@extends('layouts.master')
@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Laporan Penjualan</h3>
          <div class="text-right">
            <a class="btn btn-primary btn-md" id="cetak">Cetak</a>
          </div>
        </div>
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9 table-responsive">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-product">Tanggal Awal</label>
                  <input type="date" class="form-control" id="tanggalAwal" placeholder="Input">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-product">Tanggal Akhir</label>
                  <input type="date" class="form-control" id="tanggalAkhir" placeholder="Input">
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button class="btn btn-success" onclick="filter()"><i class="fas fa-filter"></i>
                  filter</button>
            </div>
            <br>
              <div class="row">
                          <div class="col-sm-12">
                        <table id="data-table" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                            <tr>
                                <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >No</th>
                                <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Tanggal</th>
                                <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Total Transaksi</th>
                                <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Total Penjualan</th>
                            </tr>
                            <tr>
                              <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >1</th>
                              <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >20/09/2023</th>
                              <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">25</th>
                              <th class="text-center" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Rp. 1.580.000</th>
                            </tr>
                            </thead>
                        </table>
                      </div>
                    </div>
              
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
