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
<section class="content">
  {{-- produk list --}}
  <div class="container fluid ">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Produk </h3>
              </div>
              <div class="form-group" id="id_category">
                  <select name="tipe" id="tipe_categoryEdit" class="form-control select2" style="width: 30%;"> 
                      @foreach ($category as $val)
                          <option value="{{ $val->id }}">{{ $val->nama }}
                            <a href=""></a></option>
                      @endforeach
                  </select>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9">
                    <div class="row ">
                        @foreach($data as $row)
                        <div class="col-12">
                          <div class="card  " style="width: 16rem;">
                            <img class="card-img-top " src="/storage/{{ $row->img }}"  style="width: 16rem;" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $row->harga }}</h5>
                                <p class="card-text">{{ $row->nama }}</p>
                              <a href="#" class="btn btn-primary" style="width: 6rem;">Tambah</a>
                              <a href="#" class="btn btn-secondary" style="width: 6rem;">Keranjang</a>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
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
    {{-- <script src="{{ asset('functionjs/kedai-kopi-super.js') }}"></script> --}}
@endsection