@extends('layouts.master')
@section('content')
<!-- tombol tambah produk -->
<section class="buttom-header">
  <div class="container fluid">
        <div class="inner. col-lg-12">
          <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3 " data-toggle="modal" data-target="#modal-create">New Product</button>
        </div>
  </div>
</section>

<!-- pop up tambah produk -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="inputGroupFileAddon02" >Upload</span>
              </div>
            </div>
        <label for="input-category">Category</label>
        <div class="form-group">
          <select class="custom-select" required>
            <option value="">Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <div class="invalid-feedback"> Example invalid custom select feedback
          </div>
        </div>
        <label for="input-product">Name Product</label>
        <input type="product" class="form-control" id="input-product" placeholder="Input product">
        <label for="input-description">Description</label>
        <input type="description" class="form-control" id="input-description" placeholder="Input description">
        <label for="input-status">Status</label>
        <input type="status" class="form-control" id="input-status" placeholder="Input status">
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

<!-- tabel produk -->
 <section class="content">
    <div class="container fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Product </h3>
          </div>
          <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                      <div class="col-sm-12">
                          <div id="example1_filter" class="dataTables_filter">
                                <label> Search: 
                                    <input type="search" class="form-control form-control-md" placeholder="" aria-controls="example1">
                                </label>
                                </div>
                            </div>
                  </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                          <thead>
                          <tr>
                            <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5%">No</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10%">Image</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%">Name Product</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 20%">Category</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10%">Status</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10%">Price</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 20%">Action</th>
                        </tr>
                          </thead>
                        <tbody>
                          <tr class="odd">
                            <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="even">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="odd">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="even">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="odd">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="even">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="odd">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="even">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="odd">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr>
                          <tr class="even">
                          <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                            <td>
                              <figure class="figure">
                                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                              </figure>
                            </td>
                            <td>Nasigorang</td>
                            <td>Food</td>
                            <td>Ready</td>
                            <td>Price</td>
                            <td>
                              <button type="button" class="extrasmall. btn-blok btn-warning btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Edit</button> 
                              <button type="button" class="extrasmall. btn-blok btn-danger btn-xs col-4" data-toggle="modal" data-target="#modal-pay">Delete</button>
                            </td>
                          </tr></tbody>
                </table>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                </div>
                        <div class="col-sm-12 col-md-7">
                          <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                              <li class="paginate_button page-item previous disabled" id="example1_previous">
                                <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                              </li><li class="paginate_button page-item active">
                                <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                              </li><li class="paginate_button page-item ">
                                <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                              </li><li class="paginate_button page-item ">
                                <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                              </li><li class="paginate_button page-item ">
                                <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                              </li><li class="paginate_button page-item ">
                                <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                              </li><li class="paginate_button page-item ">
                                <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                              </li><li class="paginate_button page-item next" id="example1_next">
                                <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                              </li>
                            </ul>
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
