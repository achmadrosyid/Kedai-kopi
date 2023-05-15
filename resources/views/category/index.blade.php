@extends('layouts.master')
@section('content')
<section class="buttom-header">
  <div class="container fluid">
    <div class="inner. col-lg-12">
          <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3" data-toggle="modal" data-target="#modal-detail">Add Category</button>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog">
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
        <label for="input-category">Category</label>
        <input type="category" class="form-control" id="input-category" placeholder="Input Category">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
                                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10%">No</th>
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
