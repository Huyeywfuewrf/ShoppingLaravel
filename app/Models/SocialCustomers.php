<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCustomers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_social';
    protected $fillable = ['provider_user_id', 'provider', 'user','provider_use_email'];
    protected $primaryKey = 'user_id';
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'user');
    }
}
