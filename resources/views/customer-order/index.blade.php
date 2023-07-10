@extends('layouts.master')
@section('header-include')

<!-- Toastr -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/toastr/toastr.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m9=" crossorigin="anonymous"></script>--}}
<input type="hidden" id="url">
<input type="hidden" id="token" value="{{csrf_token()}}">
@endsection
@section('content')

  <!-- tombol tambah customer order -->
  <section class="buttom-header">
      <div class="container fluid">
          <div class="inner. col-lg-12">
              <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3" data-dismiss="modal"
                      onclick="create()">New Order
              </button>
          </div>
      </div>
  </section>

  {{-- tabel customer order --}}
  <br>
  <section class="content">
      <div class="container fluid">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pesanan Pelanggan </h3>
            </div>
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">           
                <div class="row">
                  <div class="col-sm-12">
                    <table id="data-table" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                      <tr>
                      <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5%">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Nama Pelanggan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Meja</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Pesanan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Jumlah</th>
                      <th class="text-center sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10%">Keterangan</th>
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
        <!-- pop up new order -->
        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Pesanan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              
              <div class="modal-body">
              <div class="form-group">
                  <div class="form-group">
                      <label>Tanggal Pesanan:</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                      </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation">
                      </div>
                </div>
                
                <label for="input-customer">Nama Pelanggan</label>
                <input type="customer" class="form-control" id="input-customer" placeholder="Input customer">
                <label for="input-table">Meja</label>
                <input type="table" class="form-control" id="input-table" placeholder="Input table">
                <label for="input-status">Status</label>
                <input type="status" class="form-control" id="input-status" placeholder="Input status">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end pop up new order -->

        <!-- pop up payment -->
        <div class="modal fade" id="modal-pay" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
              <div class="form-group">
                  <div class="form-group">
                      <label>Tanggal Pesanan:</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                      </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation">
                      </div>
                </div>
                
                <label for="input-customer">Nama Pelanggan</label>
                <input type="customer" class="form-control" id="input-customer" placeholder="Input customer">
                <label for="input-amount">Jumlah</label>
                <input type="amount" class="form-control" id="input-amount" placeholder="Input amount">
                <label for="input-discount">Diskon</label>
                <input type="discount" class="form-control" id="input-discount" placeholder="Input discount">
                <label for="input-total">Total</label>
                <input type="total" class="form-control" id="input-total" placeholder="Input total">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Bayar</button>
              </div>
            </div>
          </div>
        </div>
  </section>

@endsection
@section('script')
    <!-- Toastr -->
    <script src="{{asset('AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('AdminLTE/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('functionjs/customer-order.js')}}"></script>
@endsection