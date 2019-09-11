<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products\Products;
use Illuminate\Http\Request;
use App\Models\Auth\User;
use App\Models\Shop_Front\Blocks;
use Gloudemans\Shoppingcart\Facades\Cart;

/**
 * Class HomeController.
 */
class ShopController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $block_1 = Blocks::find(1);
        $block_2 = Blocks::find(2);
        $block_3 = Blocks::find(3);
        $block_4 = Blocks::find(4);

        return view('frontend.index', compact('block_1','block_2', 'block_3', 'block_4'));
    }

    public function buy(Request $request)
    {

        $product =  $request->all();

        Cart::destroy();
//        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        Cart::add($request->input('product_id'), $request->input('product_id'),
            $request->input('quant'), $request->input('price'), null, ['unit_type' => $request->input('unit_type')]);
//        //return view('frontend.index');
//        Cart::setDiscount("85cf2e88abe296bb4bd4c5546b7d3081", 100);
//        CALL STORE WHEN PAYMENT METHOD IS TRIGGERED
        //Cart::store('test2');
        //return Cart::count();
        return view('frontend.cart.cart');

    }

    public function cart(){

        return view('frontend.cart.cart');
    }

    public function getCartContents(Request $request)
    {
        $product =  $request->all();
        $cart_content = Cart::content();

        $cart_product = $cart_content->where('id', $request->input('product_id'))->where('options.unit_type', $request->input('unit_search'));
        foreach ($cart_product as $product){
            return $product->qty;
        }

    }

}
