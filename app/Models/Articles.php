<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['post_title', 'post_content', 'post_status', 'post_desc','post_image','cate_post_id'];
    protected $table = 'tbl_posts';
    protected $primaryKey = 'post_id';
    public  function cate_post()
    {
        return $this->belongsTo('App\Models\Post', 'cate_post_id');
    }
}
