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


  {{-- tabel Pesanan Pelanggan --}}
  <section class="content">
      <div class="container fluid">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pesanan Pelanggan </h3>
            </div>
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 table-responsive">           
                <div class="row">
                  <div class="col-sm-12">
                    <table id="data-table" class="table table-bordered table-striped dataTable dtr-inline " aria-describedby="example1_info">
                    <thead>
                      <tr>
                      <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5%">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Nama Pelanggan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Meja</th>
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
      
      <!-- pop up edit pesanan-->
      <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Pesanan</h5>
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
                <input type="customer" class="form-control" id="nama" placeholder="Input customer">
                <label for="input-amount">Meja</label>
                <input type="amount" class="form-control" id="meja" placeholder="Input amount">
                <label for="input-discount">Nama Produk</label>
                <input type="discount" class="form-control" id="produk" placeholder="Input discount">
                <label for="input-total">Jumlah</label>
                <input type="total" class="form-control" id="jumlah" placeholder="Input total">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="delete" >batal</button>
                <button type="button" class="btn btn-primary" id="editSimpan">Simpan</button>
              </div>
            </div>
          </div>
        </div>
  </section>
        <!-- pop up payment -->
        <div class="modal fade" id="modalPay" tabindex="-1" role="dialog">
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
                      <input type="date" class="form-control float-right" id="reservation">
                      </div>
                </div>
                
                <label for="input-customer">Nama Pelanggan</label>
                <input type="customer" class="form-control" id="nama" placeholder="Input customer">
                <label for="input-amount">Jumlah</label>
                <input type="amount" class="form-control" id="jumlah" placeholder="Input amount">
                <label for="input-discount">Diskon</label>
                <input type="discount" class="form-control" id="diskon" placeholder="Input discount">
                <label for="input-total">Total</label>
                <input type="total" class="form-control" id="total" placeholder="Input total">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="delete">batal</button>
                <button type="button" class="btn btn-primary" id="bayar">Bayar</button>
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
    <script src="{{asset('functionjs/pesanan-pelanggan.js')}}"></script>
@endsection