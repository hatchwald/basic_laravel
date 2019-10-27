<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * for manipulating data customer
 */
class customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','address'];

    public static function ins_cust($name_cust,$addr_cust)
    {
        $data = new customer;
        $data->name = $name_cust;
        $data->address = $addr_cust;
        $data->save();
    }

    public static function up_cust($id,$name_cust,$addr_cust)
    {
       $data = customer::find($id);
       $data->name = $name_cust;
       $data->address = $addr_cust;
       $data->save();
    }

    public static function del_cust($id)
    {
        $data = customer::find($id);
        $data->delete();
    }
}
