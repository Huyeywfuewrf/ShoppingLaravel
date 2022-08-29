<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_details';
    protected $fillable = ['productID','order_code','productName','	productPrice','product_sales_quantity','product_coupon','product_feeship'];
    public $timestamps = false;
    protected $primaryKey = 'order_details_id';
    public function product(){
        return $this->belongsTo('App\Models\product','productID');
    }
}
