<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    protected $table = 'tbl_coupon';
    protected $fillable = ['couponName', 'couponCode', 'couponTime','couponCondition','couponNumber'];
    public $timestamps = false;
    protected $primaryKey = 'couponID';
}
