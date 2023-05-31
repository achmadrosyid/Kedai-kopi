@extends('layouts.master')
@section('header-include')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m9=" crossorigin="anonymous"></script>--}}
<input type="hidden" id="url">
<input type="hidden" id="token" value="{{csrf_token()}}">
@endsection
@section('content')

<!-- tombol tambah kasir -->
<section class="buttom-header">
  <div class="container fluid">
    <div class="inner. col-lg-12">
          <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3" data-toggle="modal" data-target="#modal-create">New Cashier</button>
    </div>
  </div>
</section>

<!-- pop up tambah kasir -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="input-username">Username</label>
              <input type="username" class="form-control" id="input-username" placeholder="Input username">
              <label for="input-password">password</label>
              <input type="password" class="form-control" id="input-password" placeholder="Input password">
              <label for="input-No. Hp">No. Hp</label>
              <input type="No. Hp" class="form-control" id="input-No. Hp" placeholder="Input No. Hp">
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- tabel kasir -->
<br>
 <section class="content">
    <div class="container fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Cashier </h3>
          </div>
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9">
                        <div class="row">
                            <div class="col-sm-12">
                          <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                              <thead>
                              <tr>
                                  <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5%">No</th>
                                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%">User Name</th> 
                                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 20%">Password</th>
                                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 20%">No HP</th>
                                  <th class="text-center sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 20%">Action</th>
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
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('AdminLTE/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{asset('functionjs/cashier.js')}}"></script>
@endsection