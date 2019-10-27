@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Product</div>

                <div class="card-body">
                <p>
                    <button id="ins_form1" class="btn btn-outline-success">Insert</button>
                </p>
                    <table class="table" id="prod_tables">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($all_product)
                                @foreach($all_product as $product)
                                    <tr>
                                        <th scope="row">{{ $numbs++ }}<input class="cls_ids" type="hidden" name="prd_ids" value="{{ $product->id }}"></th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
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
<div class="modal fade" id="mod_ins_form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="form_prd_ins">
            @csrf
            <input type="hidden" name="action" value="ins_new" id='act_form'>
            <input type="hidden" name="ids_upd" id="ids_upd">
            <div id="body_form_prd">
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="prd_nm_ins" id="prd_nm_ins" placeholder="Insert Product Name">
                </div>
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="number" class="form-control" name="prd_prc_ins" id="prd_prc_ins" placeholder="Insert Product Price">
                </div>
            </div>
            
            <div id="del_areas" style="display:none">
            Apakah anda Yakin akan menghapus Product <span></span> ??
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sbmt_ins_prd">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
