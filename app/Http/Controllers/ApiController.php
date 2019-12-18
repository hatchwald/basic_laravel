<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Product;
use App\customer;
use App\Sales;

class ApiController extends Controller{

	function api_prd(){
		$all_prd = Product::all();
		return json_encode($all_prd);
	}

	public function api_prd_ins(Request $req){
		$data =  $req->all();
		if (empty($data)) {
			return response("data will be inserted cannot be empty",401);
		}else if(empty($data['name']) || empty($data['price']) ){
			return response("some data still empty",401);
		}else{
			if(!is_numeric($data['price'])){
				return response("price value must be integer",401);
			}else{
				Product::ins_prod($data['name'],$data['price']);
				return response("data was successfull inserted",200);
			} 
		}
	}

	public function api_prd_upd(Request $req){
		$data = $req->all();
		if (empty($data)) {
			return response("data cannot be empty",401);
		}else if(empty($data['id'])){
			return response("id must be inserted",401);
		}else if(empty($data['name']) || empty($data['price'])){
			return response("some data still empty",401);
		}else{
			if (!is_numeric($data['id'])) return response("id value must be integer");
			if (!is_numeric($data['price'])) return response("price must be integer",401);
			if (empty(Product::find($data['id']))) return response("data not found",404);
			Product::upd_prod($data['id'],$data['name'],$data['price']);
			return response("success updated data",200);
		}
	}
}