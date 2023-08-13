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
    <!-- tabel Order -->
    <section class="content">
        <div class="container fluid">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pesanan</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9 table-responsive">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <table id="data-table"
                                           class="table table-bordered table-striped dataTable dtr-inline"
                                           aria-describedby="example1_info">
                                        <thead>
                                        <tr>
                                            <th class="text-center sorting sorting_asc" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 5%">No
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Nama Produk
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Jumlah
                                            </th>
                                            <th class="text-center sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 10%">Keterangan
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <div class="text-right">
                                        <a href="#" class="btn btn-primary btn-md"><i class="ion ion-bag"></i> Bayar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pop up edit kategori -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form" name="form">
                            <input type="hidden" id="id">
                            <div class="form-group">
                                <label for="input-category">Kategori</label>
                                <input type="text" class="form-control" id="category-edit" placeholder="Input Category">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" id="editSimpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- pop up Hapus -->
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form" name="form">
                            <input type="hidden" id="id">
                            <div class="form-group">
                                <label for="input-delete">Apakah yakin ingin menghapus data</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" id="delete" class="btn btn-danger">Hapus</button>
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
    <script src="{{asset('functionjs/keranjang.js')}}"></script>
@endsection
