<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wards extends Model
{
    use HasFactory;
    protected $table = 'tbl_xaphuongthitran';
    protected $fillable = ['name_xaphuong', 'type','maqh'];
    public $timestamps = false;
    protected $primaryKey = 'xaid';
}
