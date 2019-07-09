<?php

Breadcrumbs::for('admin.products', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.products.products'), route('admin.products'));
});

//Breadcrumbs::for('admin.products.edit', function ($trail) {
//    $trail->parent('admin.products');
////    $trail->push(__('menus.backend.shop-front.blocks'), route('admin.shop-front.edit'));
//});
