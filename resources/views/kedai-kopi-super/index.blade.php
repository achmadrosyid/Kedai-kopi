@extends('layouts.master') 
@section('content')

<section class="content">
  <div class="container fluid">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Produk </h3>
              </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9">
                    <div class="row">
                        @foreach($data as $row)
                        <div class="col-md-2 col-xs-4">
                          <div class="card " style="width: 10rem;">
                            <img class="card-img-top " src="/storage/{{ $row->img }}"  style="width: 10rem;" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $row->harga }}</h5>
                                <p class="card-text">{{ $row->nama }}</p>
                              <a href="#" class="btn btn-primary" style="width: 8rem;">Tambah</a>
                              <a href="#" class="btn btn-secondary" style="width: 8rem;">Keranjang</a>
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