@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Customer</div>

                <div class="card-body">
                <p>
                    <button id="ins_form2" class="btn btn-outline-success">Insert</button>
                </p>
                    <table class="table" id="cust_table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Customer</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($all_customer)
                                @foreach($all_customer as $customer)
                                    <tr>
                                        <th scope="row">{{ $numbs++ }}<input class="cls_ids" type="hidden" name="prd_ids" value="{{ $customer->id }}"></th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td><button type="button" class="btn btn-outline-primary upd_btn">Update </button> <button type="button" class="btn btn-outline-danger del_btn">Delete</button></td>
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
<div class="modal fade" id="mod_cust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="form_cust">
            @csrf
            <input type="hidden" name="action" value="ins_cust" id='act_form2'>
            <input type="hidden" name="id_cust" id="id_cust">
            <div id="body_form_cust">
                <div class="form-group">
                    <label for="">Customer Name</label>
                    <input type="text" class="form-control" name="cust_nms" id="cust_nms" placeholder="Insert Customer Name">
                </div>
                <div class="form-group">
                    <label for="">Customer Address</label>
                    <input type="text" class="form-control" name="cust_addr" id="cust_addr" placeholder="Insert Address Customer">
                </div>
            </div>
            
            <div id="del_areas_cust" style="display:none">
            Apakah anda Yakin akan menghapus Customer <span></span> ??
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sbmt_cust">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
