<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
     public $timestamps = false;
    protected $table = 'tbl_shipping';
    protected $fillable = ['shippingName','	shippingAddress','shippingPhone','shippingEmail','shippingNote','shipping_method'];
    protected $primaryKey = 'shippingID';
}
