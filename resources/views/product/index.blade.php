@extends('layouts.master')
@section('header-include')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/toastr/toastr.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m9=" crossorigin="anonymous"></script> --}}
    <input type="hidden" id="url">
    <input type="hidden" id="token" value="{{ csrf_token() }}">
@endsection
@section('content')
    <!-- tombol tambah produk -->
    <section class="buttom-header">
        <div class="container fluid">
            <div class="inner. col-lg-12">
                <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3" data-dismiss="modal"
                    onclick="create()">New Product
                </button>
            </div>
        </div>
    </section>

    <!-- pop up tambah produk -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" name="form" enctype="multipart/form-data">
                        <img id="preview-image" width="300px">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputImage" >
                                    <label class="custom-file-label" for="inputGroupFile02"
                                        aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="img" class="btn-primary">Upload</span>
                                </div>
                            </div>
                            <label for="input-category">Category</label>
                            <div class="form-group" id="id_category">
                                <select name="tipe" id="tipe_category" class="form-control select2" style="width: 100%;">
                                    @foreach ($category as $val)
                                        <option value="{{ $val->id }}">{{ $val->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"> Example invalid custom select feedback
                                </div>
                            </div>
                            <label for="input-product">Name Product</label>
                            <input type="product" class="form-control" id="nama" placeholder="Input product">
                            <label for="input-description">Description</label>
                            <input type="description" class="form-control" id="description" placeholder="Input description">
                            <label for="input-status">Status</label>
                            <input type="status" class="form-control" id="status" placeholder="Input status">
                            <label for="input-harga">Harga</label>
                            <input type="harga" class="form-control" id="harga" placeholder="Input harga">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="simpan" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- tabel produk -->
    <section class="content">
        <div class="container fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">Product </h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/product/uploadImage" class="btn btn-primary btn-sm"><i class="fa fa-image"></i> Image Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="data-table" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="text-center sorting sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 5%">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 10%">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 10%">Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 10%">Product</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 10">Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 10%">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 10%">Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 30%">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">

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
@section('script')
    <!-- Toastr -->
    <script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('functionjs/product.js') }}"></script>
@endsection

