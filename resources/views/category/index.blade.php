@extends('layouts.master')
@section('content')
<section class="buttom-header">
  <div class="container fluid">
    <div class="inner. col-lg-12">
          <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3">Add Category</button>
    </div>
  </div>
</section>
<br>
 <section class="content">
    <div class="container fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Category </h3>
          </div>
            <div class="card-body">
                 <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                          <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                              <thead>
                              <tr>
                                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name Produk</th> 
                              </tr>
                              </thead>
                              <tbody>
                              <tr class="odd">
                                  <td class="dtr-control sorting_1" tabindex="0">1</td>
                                  <td>Food</td>
                              </tr>
                              <tr class="even">
                                  <td class="dtr-control sorting_1" tabindex="0">1</td>
                                  <td>Drink</td>
                              </tr><tr class="odd">
                                  <td class="dtr-control sorting_1" tabindex="0">1</td>
                                  <td>Snack</td>                           
                              </tr></tbody>
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
