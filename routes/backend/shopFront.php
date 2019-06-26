<?php


use App\Http\Controllers\Backend\ShopFrontController;

// All route names are prefixed with 'admin.'.

Route::get('shop-front', [ShopFrontController::class, 'index'])->name('shop-front');

Route::get('shop-front/blocks', 'ShopFrontController@editBlocks')->name('shop-front.editBlocks');
Route::post('shop-front/blocks/update', 'ShopFrontController@updateBlocks')->name('shop-front.updateBlocks');

Route::get('shop-front/carousel', 'ShopFrontController@editCarousel')->name('shop-front.editCarousel');
Route::post('shop-front/carousel/update', 'ShopFrontController@updateCarousel')->name('shop-front.updateCarousel');
