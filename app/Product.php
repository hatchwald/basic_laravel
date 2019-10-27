<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * for manipulating data product
 */
class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','price'];

    public static function ins_prod($name_prd,$price_prd)
    {
        $data = new Product;
        $data->name = $name_prd;
        $data->price = $price_prd;
        $data->save();
    }

    public static function upd_prod($id,$name_prd,$price_prd)
    {
       $data = Product::find($id);
       $data->name = $name_prd;
       $data->price = (int)$price_prd;
       $data->save();
    }

    public static function del_prod($id)
    {
        $data = Product::find($id);
        $data->delete();
    }
}
