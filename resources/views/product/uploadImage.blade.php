@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upload Image Product</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{route('product.storeImage')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Nama Barang</label>
                                            <select name="products_id" class="form-control">
                                                @foreach($product as $val)
                                                    <option value="{{$val->id}}">{{$val->nama}}</option>
                                                @endforeach
                                            </select>
                                            @error('products_id') <div class="text-muted @error('products_id') is-invalid @enderror">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="photo" class="form-control-label">Foto Barang</label>
                                            <input type="file" name="photo" value="{{old('photo')}}"
                                                   accept="image/*"
                                                   class="form-control @error('photo') is-invalid @enderror"/>
                                            @error('photo') <div class="text-muted">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Simpan Foto Produk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
