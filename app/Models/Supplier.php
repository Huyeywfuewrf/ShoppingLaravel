<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
/**
 * App\Models\Category
 *
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 * @property string $id
 * @property string $title
 * @property string $slugs
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $parent
 * @property-read int|null $parent_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $post
 * @property-read int|null $post_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlugs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */

class Supplier extends Model
{
    use HasFactory , Uuids;
    protected $table = 'tbl_suppliers';
    protected $primaryKey = 'supplierID';
    protected $fillable = ['supplierName', 'contactTitle', 'supplierAddress', 'supplierEmail', 'supplierPhone', 'supplierFax'];

    public function post()
    {
        return $this->hasMany('App\Models\Post', 'supplierID');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Supplier', 'parentID');
    }
    public function Supplier(): HasMany
    {
        return $this->hasMany('App\Models\Supplier', 'supplierID') ->with('Supplier');

    }
    //delete


}
