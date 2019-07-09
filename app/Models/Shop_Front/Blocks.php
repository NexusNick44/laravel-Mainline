<?php

namespace App\Models\Shop_Front;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop_Front\Blocks
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop_Front\Blocks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop_Front\Blocks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop_Front\Blocks query()
 * @mixin \Eloquent
 */
class Blocks extends Model
{
    protected $fillable = [
        'title',
        'text',
    ];
}
