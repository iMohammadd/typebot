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
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index');
Route::get('/test', function () {
    //return view('welcome');
    echo \App\Helper\Translate::trans('و') . "<hr>";
    $keys = \App\Helper\Translate::getKey();
    foreach ($keys as $k => $v) {
        echo '\'' . \App\Helper\Translate::convert($k) . "' => " . '\''. \App\Helper\Translate::convert($v) . "',<br>";
    }

});

Route::get('query', function (\Illuminate\Http\Request $request) {
    #$resp = new \App\Http\Controllers\BotController();
    #return $resp->conv($request->input('query'));
});


Route::get('/pages', 'HomeController@index');
