<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    echo \App\Helper\Translate::trans('\n') . "<hr>";
    $keys = \App\Helper\Translate::getKey();
    foreach ($keys as $k => $v) {
        echo $k . ': ' . \App\Helper\Translate::convert($k) . " => " . $v . ': '. \App\Helper\Translate::convert($v) . "<br>";
    }

});

Route::get('query', function (\Illuminate\Http\Request $request) {

});
