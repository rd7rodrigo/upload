<?php

Route::get('controle/banners', [
    'uses' => 'Bredi\Banner\Controllers\Controle\BannerController@index',
    'as'   => 'controle.banner.index',
]);

Route::get('controle/teste', function () {
    dd('teste', __DIR__, base_path('packages'));
});
