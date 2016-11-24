<?php

Route::get('/', [
    /*'uses' => 'HomeController@landing',*/
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('compras/{product}/{quantity}/{provider}', [
    'uses' => 'ShoppingController@add',
    'as' => 'shopping'
]);

Route::get('eliminar-compra/{p}',[
    'uses'  => 'ShoppingController@delete',
    'as'    => 'cartDelete'
]);


Route::get('presupuestar',[
    'uses'  => 'BudgetController@show',
    'as'    => 'budget'
]);
Route::get('presupuesto-nuevo',[
    'uses'  => 'BudgetController@add',
    'as'    => 'addBudget'
])->middleware('auth');

Route::get('producto/{slug}/{id}', [
    'uses' => 'ProductController@productDetailFront',
    'as' => 'productDetail'
]);

Route::post('finalizar-compra',[
    'uses' => 'OrderController@add',
    'as' => 'newOrder'
]);

Route::get('finalizar-compra', [
    'uses' => 'ProductController@checkout',
    'as' => 'checkout'
]);

Route::get('preguntas-frecuentes', [
    'uses' => 'HomeController@indexFaqs',
    'as' => 'faqs'
]);

//**************** Formulario de contacto ******************//
Route::get('contacto', [
    'uses' => 'HomeController@indexContact',
    'as' => 'contactForm'
]);

Route::post('contacto', [
    'uses' => 'HomeController@postContact',
    'as' => 'contactForm'
]);

Route::post('questions/new', [
    'uses' => 'ProductController@addQuestion',
    'as' => 'addQuestion'
]);

Route::post('searchBar', [
    'uses' => 'HomeController@searchBar',
    'as' => 'searchBar'
]);

/*
 * Ruta de productos
 * */

Route::get('productos/{name?}',[
    'uses' => 'HomeController@index',
    'as' => 'product'
]);

Route::get('productos-cercanos/',[
    'uses' => 'HomeController@CloseToMe',
    'as' => 'closeToMe'
]);


/********** PLANS **********/

Route::get('precios', [
    'uses' => 'PlanController@pricing',
    'as' => 'pricing'
]);

Route::get('detalle-de-plan/{slug}', [
    'as' => 'planDetail', 
    'uses' => 'PlanController@planDetail'
]);

Route::get('productos-recomendados', [
    'as' => 'recommended',
    'uses' => 'PositionAlgorithmController@index'
]);
Route::get('productos-agrosellers', [
    'as' => 'allProduct',
    'uses' => 'PositionAlgorithmController@products'
]);
Route::get('como-comprar',function(){
    return view('front.howBuy');
});
Route::get('como-vender',function(){
    return view('front.howSell');
});
Route::get('como-cotizar',function(){
    return view('front.howBudget');
});

Route::get('acerca-agrosellers',function(){
    return view('front.about');
});

/*** Ruta para recibir datos de zona pagos ***/

Route::post('zonapagos', [
    'as' => 'finalPay',
    'uses' => 'ShoppingController@finalPay'
]);