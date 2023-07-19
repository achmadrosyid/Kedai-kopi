@extends('layouts.master')
{{-- @include('layouts.navbar') --}}

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
    {{-- popular menu 1 --}}
  <div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
           <h3>150</h3>
             <p>New Orders</p>
          </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
  {{-- popular menu 2 --}} 
  <div class="col-lg-3 col-6"> 
    <div class="small-box bg-success">
      <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
           <p>Bounce Rate</p>
       </div>
       <div class="icon">
         <i class="ion ion-stats-bars"></i>
       </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
 {{-- popular menu 3 --}}   
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>44</h3>
           <p>User Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  {{-- popular menu 4 --}}  
    <div class="col-lg-3 col-6"> 
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>
            <p>Unique Visitors</p>
        </div>
        <div class="icon">
           <i class="ion ion-pie-graph"></i>
        </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Produk </h3>
              </div>
              <div class="form-group" id="id_category">
                  <select name="tipe" id="tipe_categoryEdit" class="form-control select2" style="width: 100%;"> 
                      @foreach ($category as $val)
                          <option value="{{ $val->id }}" onclick="Category()">{{ $val->nama }}
                            <script src="kedai-kopi-super.js"></script>
                          </option>
                      @endforeach
                  </select>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9 table-responsive">
                    <div class="row ">
                        @foreach($data as $row)
                        <div class="col-lg-2 col-sm-6 col-xs-6">
                          <div class="card  " style="width: 10rem;">
                            <img class="card-img-top " src="/storage/{{ $row->img }}"  style="width: 10rem;" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $row->harga }}</h5>
                                <p class="card-text">{{ $row->nama }}</p>
                              <a href="#" class="btn btn-primary" style="width: 6rem;">Tambah</a>
                              {{-- <a href="#" class="btn btn-secondary" style="width: 6rem;">Keranjang</a> --}}
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
</section>

@endsection
@section('script')
    <!-- Toastr -->
    <script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('functionjs/kedai-kopi-super.js') }}"></script> --}}
@endsection