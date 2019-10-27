<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = ['id','customer','product'];

    public static function ins_sales_order($name,$product)
    {
        $data = new Sales;
        $data->customer = $name;
        $data->product = $product;
        $data->save();
    }
}
