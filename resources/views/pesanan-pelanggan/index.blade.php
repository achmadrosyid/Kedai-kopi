@extends('layouts.master')
@section('header-include')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/toastr/toastr.min.css') }}">
    <!-- Sweet alert -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/sweetalert2/sweetalert2.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m9=" crossorigin="anonymous"></script> --}}
    <input type="hidden" id="url">
    <input type="hidden" id="token" value="{{ csrf_token() }}">
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
                                    <table id="data-table" class="table table-bordered table-striped dataTable dtr-inline "
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5%">No</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Nama Pelanggan
                                                </th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Meja</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Status Pesanan
                                                </th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Status Pembayaran
                                                </th>
                                                <th class="text-center sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending" style="width: 10%">Opsi</th>
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

        <!-- pop up keranjang -->
        <div class="modal fade" id="modalPay" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idOrder">
                        <div class="table-responsive">
                            <table id="data-tabel" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No</th>
                                        <th style="width: 25%;">Produk</th>
                                        <th style="width: 20%;">Jumlah</th>
                                        <th style="width: 15%;">Diskon</th>
                                    </tr>
                                </thead>
                                <tbody id="tableOrder">

                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="total-keseluruhan">Total Keseluruhan</label>
                                <h4 id="totalHarga"></h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="button" id="bayar" class="btn btn-primary">Bayar</button>
                        <button type="button" id="antar" class="btn btn-success">Antarkan Pesanan</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <!-- Toastr -->
    <script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Sweet alert -->
    <script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('functionjs/pesanan-pelanggan.js') }}"></script>
@endsection
