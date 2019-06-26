<?php

Breadcrumbs::for('admin.shop-front', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.shop-front.shop-front'), route('admin.shop-front'));
});

Breadcrumbs::for('admin.shop-front.editBlocks', function ($trail) {
    $trail->parent('admin.shop-front');
    $trail->push(__('menus.backend.shop-front.blocks'), route('admin.shop-front.editBlocks'));
});
