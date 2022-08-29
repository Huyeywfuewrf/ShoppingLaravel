<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_category';
    protected $primaryKey = 'categoryID';
    public $timestamps = false;

    protected $fillable = ['categoryName', 'categoryDescription', 'categoryStatus','slug_category_product', 'meta_keywords'];

    public function category(): HasMany
    {
        return $this->hasMany('App\Models\CategoryModel', 'categoryID');
    }
}
