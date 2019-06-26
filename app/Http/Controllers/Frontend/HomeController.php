<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Shop_Front\Blocks;
use Gloudemans\Shoppingcart\Facades\Cart;

/**
 * Class HomeController.
 */
class HomeController extends Controller
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
        return view('frontend.index', compact('block_1', 'block_2', 'block_3', 'block_4'));
    }

    public function buy()
    {
        Cart::destroy();
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        Cart::add('1239ad0', 'Product 2', 1, 10.00, null, ['unit_type' => 'Box']);
        //return view('frontend.index');
        Cart::setDiscount("85cf2e88abe296bb4bd4c5546b7d3081", 100);
        //Cart::store('test2');
        return Cart::content() . Cart::discount();
    }
}
