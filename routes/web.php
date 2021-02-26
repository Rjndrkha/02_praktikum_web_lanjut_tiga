<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;

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
//Practicum 1
//Nomer 2 
Route::get('/', function () {
   echo "Selamat Datang";
});
//Nomer 3
Route::get('/about', function () {
    echo "Hello My Name Rajendra Rakha";
 });
Route::get('/article/{id}', function ($id) {
    echo ("Ini Merupakan Halaman Article dengan id ".$id);


});
/*
//Practicum 2

Route::get('/',[PageController::class,'index']);
Route::get('/about',[PageController::class,'about']);
Route::get('/article/{id}',[PageController::class,'article']);
*/

//Practicum 3
Route::get('/',[PageController::class,'index']);

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{products}', [ProductController::class, 'showProducts'])->name('products.showproducts');
  });
  
  Route::get('/news', [NewsController::class, 'index'])->name('news.index');
  Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
  
  Route::group(['prefix' => 'program'], function () {
    Route::get('/{program}', [ProgramController::class, 'listProgram'])->name('program.list');
  });
  
  Route::get('/about', [AboutController::class, 'index'])->name('aboutus.index');
  Route::resource('contact', ContactController::class);
  