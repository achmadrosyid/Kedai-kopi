@extends('layouts.master')
@section('content')
<section class="buttom-header">
  <div class="container fluid">
        <div class="inner. col-lg-12">
          <button type="button" class="extrasmall. btn-blok btn-primary btn-md col-3" data-toggle="modal" data-target="#modal-create">New Order</button>
        </div>
  </div>
</section>

<!-- pop up new order -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <div class="form-group">
          <div class="form-group">
              <label>Date range:</label>
              <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="far fa-calendar-alt"></i>
              </span>
              </div>
              <input type="text" class="form-control float-right" id="reservation">
              </div>
        </div>
        
        <label for="input-customer">Name Customer</label>
        <input type="customer" class="form-control" id="input-customer" placeholder="Input customer">
        <label for="input-table">Table</label>
        <input type="table" class="form-control" id="input-table" placeholder="Input table">
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
<!-- end pop up new order -->

<br>
 <section class="content">
    <div class="container fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order </h3>
          </div>
    <div class="card-body">
      <div class="row">
          <div class="col-sm-12 col-md-6">
              <div id="example1_filter" class="dataTables_filter">
                    <label> Search: 
                          <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                    </label>
              </div>
          </div>
      </div>
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">           
          <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                <tr>
                  <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5%">No</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 20%">Name Customer</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 20%">Table</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 20%">Count</th>
                  <th class="text-center sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10%">Payment</th>
              </tr>
                </thead>
              <tbody>
                <tr class="odd">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                  <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9" data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr><tr class="even">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9"data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="odd">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9"data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="even">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9"data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="odd">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td> 
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9"data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="even">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9" data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="odd">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                  <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9" data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="even">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                  <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9" data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                  <tr class="odd">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9" data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr>
                <tr class="even">
                  <td class="text-center dtr-control sorting_1" tabindex="0">1</td>
                  <td>Udin</td>
                  <td>4</td>
                  <td>50000</td>
                  <td>
                    <button type="button" class="extrasmall. btn-blok btn-primary btn-sm col-9" data-toggle="modal" data-target="#modal-pay">Pay</button>
                  </td>
                </tr></tbody>
              </table>
         </div>
       </div>

       <!-- pop up payment -->
       <div class="modal fade" id="modal-pay" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Payment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                <div class="form-group">
                    <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation">
                        </div>
                  </div>
                  
                  <label for="input-customer">Name Customer</label>
                  <input type="customer" class="form-control" id="input-customer" placeholder="Input customer">
                  <label for="input-amount">Amount</label>
                  <input type="amount" class="form-control" id="input-amount" placeholder="Input amount">
                  <label for="input-discount">discount</label>
                  <input type="discount" class="form-control" id="input-discount" placeholder="Input discount">
                  <label for="input-total">Total</label>
                  <input type="total" class="form-control" id="input-total" placeholder="Input total">
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary">Delete</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Pay</button>
                </div>
              </div>
            </div>
          </div>

          <!-- end pop up payment -->


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
                    </li></ul>
                  </div></div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection
