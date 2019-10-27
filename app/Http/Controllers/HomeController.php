<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Product;
use App\customer;
use App\Sales;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function form_a()
    {
        $data = [];
        $data['all_product'] = Product::all();
        $data['numbs'] = 1;
        return view('form1',$data);
    }

    public function form_b()
    {
        $data = [];
        $data['all_customer'] = customer::all();
        $data['numbs'] = 1;
        return view('form2',$data);
    }

    public function form_ins_prd(Request $req)
    {
      if( isset($_POST['prd_nm_ins'],$_POST['prd_prc_ins']) && !empty($_POST['prd_prc_ins']) && !empty($_POST['prd_nm_ins']) ){
          if(isset($_POST['action'])){
              switch ($_POST['action']) {
                  case 'ins_new':
                        Product::ins_prod($_POST['prd_nm_ins'],$_POST['prd_prc_ins']);
                      break;
                  
                  case 'upd_dat':
                    if(isset($_POST['ids_upd']) && !empty($_POST['ids_upd'])){
                        Product::upd_prod($_POST['ids_upd'],$_POST['prd_nm_ins'],$_POST['prd_prc_ins']);   
                    }
                    break;

                  default:
                    // Product::ins_prod($_POST['prd_nm_ins'],$_POST['prd_prc_ins']);
                      break;
              }
          }
      }else if(isset($_POST['ids_upd']) && !empty($_POST['ids_upd'])){
          if(isset($_POST['action'])){
              if($_POST['action'] == 'del_dat'){
                Product::del_prod($_POST['ids_upd']);
              }
          }
      }
      return redirect('product');
    }

    public function form_cust(Request $req)
    {
        if( isset($_POST['cust_nms'],$_POST['cust_addr']) && !empty($_POST['cust_addr']) && !empty($_POST['cust_nms']) ){
            if(isset($_POST['action'])){
                switch ($_POST['action']) {
                    case 'ins_cust':
                          customer::ins_cust($_POST['cust_nms'],$_POST['cust_addr']);
                        break;
                    
                    case 'upd_cust':
                      if(isset($_POST['id_cust']) && !empty($_POST['id_cust'])){
                          customer::up_cust($_POST['id_cust'],$_POST['cust_nms'],$_POST['cust_addr']);   
                      }
                      break;
  
                    default:
                      // Product::ins_prod($_POST['prd_nm_ins'],$_POST['prd_prc_ins']);
                        break;
                }
            }
        }else if(isset($_POST['id_cust']) && !empty($_POST['id_cust'])){
            if(isset($_POST['action'])){
                if($_POST['action'] == 'del_cust'){
                  customer::del_cust($_POST['id_cust']);
                }
            }
        }
        return redirect('customer');
    }

    public function sales()
    {
        $data = [];
        $data['numbs'] = 1;
        $data['all_customer'] = customer::all();
        $data['all_data_sales'] = Sales::all();
        $data['all_product'] = Product::all();
        return view('form3',$data);

    }

    public function sales_ins()
    {
        if (isset($_POST['cust_name_sale'],$_POST['prd_name_sale']) && !empty($_POST['cust_name_sale']) && !empty($_POST['prd_name_sale'])) {
            Sales::ins_sales_order($_POST['cust_name_sale'],$_POST['prd_name_sale']);
        }
        return redirect('sales');
    }

}
