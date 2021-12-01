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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/helloBladeWithData2', [App\Http\Controllers\HelloBladeWithDataController::class,'test']);


Route::get("/hello", function () {
	print("<h1>Hello World!</h1>");
	return null;
});

Route::get("/whoAreYou/{name}", function($name) {  // （1）
	return "<h1>こんにちは".$name."さん</h1>";
});

Route::get("/helloBlade", function() {
	return view("hello");  // (1)
});

Route::get("/helloBladeWithData", function() {
	$data["name"] = "武者小路";  // (1)
	return view("helloWithData", $data);  // (2)
});

Route::get("/chap3", function() {
	$data["rand"] = rand(1, 3);
	return view("chap3.ifStatement", $data);
});


//Route::get("/chap4/helloBladeWithData", "HelloBladeWithDataController");
