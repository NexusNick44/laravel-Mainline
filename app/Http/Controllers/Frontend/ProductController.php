<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Products\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Shop_Front\Blocks;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function getProduct($product_id)
    {
        $product = Products::where('product_id', $product_id)->first();
        if(empty($product))
            return redirect('/');

        return view('frontend.auth.product.show', compact('product'));
    }




}
