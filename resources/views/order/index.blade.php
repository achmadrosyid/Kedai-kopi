@extends('layouts.master')
{{-- @include('layouts.navbar') --}}

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
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Produk </h3>
                <div class="text-right">
                    <a class="btn btn-primary btn-md" id='keranjang'> Keranjang</a>
                </div>
            </div>
            <div class="form-group" id="id_category">
                <select name="tipe" id="filter-category" onchange="getData()" class="form-control select2"
                        style="width: 100%;">
                    @foreach ($category as $val)
                        <option value="{{ $val->id }}">{{ $val->nama }}
                        </option>
                    @endforeach
                </select>
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9 table-responsive">
                        <div class="row " id="product">
                            @foreach ($data as $row)
                                <div class="col-lg-3 col-sm-6 col-xs-6">
                                    <div class="card " style="width: 12rem;">
                                        <img class="card-img-top " src="/storage/{{ $row->img }}"
                                             style="width: 12rem;height:12rem">
                                        <div class="card-body">
                                            <h5 class="card-title">Rp. {{ $row->harga }}</h5>
                                            <p class="card-text">{{ $row->nama }}</p>
                                            <a href="#" class="btn btn-primary" style="width: 6rem;" id="addToCart" data-id="{{$row->id}}" data-name="{{$row->nama}}">Tambah</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pop up keranjang -->
        <div class="modal fade" id="modalKeranjang" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pesanan <i id="loadingIcon" class="fas fa-spinner fa-spin"></i></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table table-responsive">
                          <table id="data-tabel" class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 25%;">Produk</th>
                                <th style="width: 5%;">Jumlah</th>
                                <th style="width: 20%;">Total</th>
                                <th style="width: 10%;" colspan="2" class="tex-center">Opsi</th>
                              </tr>
                            </thead>
                            <tbody id="tableCart">
                            </tbody>
                          </table>
                          <div class="form-group">
                            <label for="total-keseluruhan">Total Keseluruhan</label>
                            <h2 id="totalHarga"></h2>
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Pelanggan">
                          </div>
                        </div>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" id="bayar" class="btn btn-primary">Bayar</button>
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
    <script src="{{ asset('functionjs/order.js') }}"></script>
@endsection
