<?php

// All route names are prefixed with 'admin.'.

Route::get('products', 'ProductsController@index')->name('products');
Route::get('products/all', 'ProductsController@all')->name('products.all');

Route::get('products/{product_id}', 'ProductsController@edit')->name('products.edit');
//Route::post('products/update', 'ProductsController@update')->name('products.update');

//Route::get('shop-front/carousel', 'ShopFrontController@editCarousel')->name('products.editCarousel');
//Route::post('shop-front/carousel/update', 'ShopFrontController@updateCarousel')->name('products.updateCarousel');
