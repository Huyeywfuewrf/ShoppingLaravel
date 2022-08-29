<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_social';
    protected $fillable = ['provider_user_id', 'provider', 'user','provider_use_email'];

    public function login(){
        return $this->belongsTo('App\Models\Login', 'user');
    }
}
