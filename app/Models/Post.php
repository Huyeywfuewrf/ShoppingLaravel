<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_post';
    protected $fillable = ['cate_post_name', 'cate_post_status','cate_post_desc'];
    public $timestamps = false;
    protected $primaryKey = 'cate_post_id';
}
