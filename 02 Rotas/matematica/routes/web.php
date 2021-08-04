<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/usuario/{nome?}/{sobrenome?}', function ($a=null,$b=null) {
    if (isset($a)&&isset($b)) echo "<h1> Olá $a $b </h1>";
    if (isset($a)&&isset($b)==false) echo "<h1> Olá $a </h1>";
    if (isset($a)==false) echo "<h1> Olá caro usuário!!!! </h1>";
})->where('nome','[A-Za-z]+')
->where('sobrenome','[A-Za-z]+');

Route::get('/tabuada/{num}', function ($num) {
    echo "<h1> Tabuada do número $num </h1>";
    for($i = 0; $i<=10; $i++){
       echo "<h3>$i X $num = ".$i*$num."</h3>";     
    }
})->where('num','[0-9]+');

Route::prefix('/ferramentas')->group(function(){
    Route::get('/pares', function(){
        return view('pares');
    });

    Route::get('/impares', function(){
        //números impares
        echo "1, 3, 5";
    });
});
