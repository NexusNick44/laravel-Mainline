<?php

namespace App\Models\Shop_Front;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    protected $fillable = [
        'type',
        'sector',
        'category',
    ];
}
