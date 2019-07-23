<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shop_Front\Blocks;
use Illuminate\Http\Request;

class ShopFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.shop_front.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function editBlocks()
    {
        $blocks = Blocks::all();
        return view('backend.shop_front.blocks.edit', compact('blocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBlocks(Request $request)
    {
        Blocks::truncate();
        foreach( $request->title as $key => $val){
            $db = Blocks::create(['title' => $request->title[$key],
                'text'  => $request->text[$key],
            ]);
        }

        return redirect(route('admin.shop-front.editBlocks'))->withFlashSuccess('The Block were successfully edited.');



//        $product = Categories::find($id);
//        $input = $request->all();
//        $product->update($input);
        //return redirect(route('admin.categories.index'))->withFlashSuccess('The product was successfully edited.');
        //return $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMenu()
    {
        $blocks = Blocks::all();
        return view('backend.shop_front.blocks.edit', compact('blocks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
