<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Products\Products
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Products query()
 * @mixin \Eloquent
 */
class Products extends Model
{
    //protected $primaryKey = 'product_id';
    protected $guarded = 'product_id';
    protected $fillable = [
        'description',
    ];
}
