<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;
    protected $table = 'tbl_feeship';
    protected $fillable = ['fee_matp ', 'fee_maqh ','fee_xaid','fee_feeship'];
    public $timestamps = false;
    protected $primaryKey = 'fee_id ';

    public  function  city(){
        return $this->belongsTo('App\Models\City','fee_matp');
    }
    public  function  province(){
        return $this->belongsTo('App\Models\Province' ,'fee_maqh');
    }
    public  function  wards(){
        return $this->belongsTo('App\Models\Wards' ,'fee_xaid');
    }
}
