<?php
################ ROTA PARA EXIBIR A IMAGEM ################
Route::get('img-render/{path?}/{tamanho?}/{imagem?}', [
    'as'   => 'imagem.render',
    'uses' => 'Bredi\Banner\Controllers\DashboardController@renderImagem',
]);

Route::get('arquivo/{pasta?}/{filename?}', [
    'as'   => 'arquivo.render',
    'uses' => 'Bredi\Banner\Controllers\DashboardController@arquivoDownload',
]);
