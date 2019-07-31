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
        $product = Products::where('product_id', $product_id)
            ->where('hide_product', '!=', 1)->first();

        $cart_content = Cart::content();

        if(empty($product))
            return redirect('/')->withFlashWarning('<h3>Search Found No Results!</h3>');

        return view('frontend.product.show', compact('product', 'cart_content'));
    }




}
