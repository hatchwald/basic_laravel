@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Sales Order Data</div>

                <div class="card-body">
                <p>
                    <button id="ins_order" class="btn btn-outline-success">Insert</button>
                </p>
                    <table class="table" id="prod_tables">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Product Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($all_data_sales)
                                @foreach($all_data_sales as $sales)
                                    <tr>
                                        <th scope="row">{{ $numbs++ }}</th>
                                        <td>{{ $sales->customer }}</td>
                                        <td>{{ $sales->product }}</td>
                                    </tr>
                                @endforeach
                            @endisset   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="sale_ord_mod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Sales Order Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="sale_form">
            @csrf
                <div class="form-group">
                    <label for="">Customer Name</label>
                    <select class="form-control" id="cust_name_sale" name="cust_name_sale">
                        <option value="" disabled>Select Customer</option>
                        @isset($all_customer)
                            @foreach( $all_customer as $customer)
                                <option > {{$customer->name}} </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="hidden" name="prd_name_sale" id="prd_hid">
                    <select multiple class="selectpicker form-control" id="prd_name_sale">
                        @isset($all_product)
                            @foreach($all_product as $product)
                                <option>{{$product->name}}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sbmt_ins_sale">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
