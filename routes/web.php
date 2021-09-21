<?php

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;


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

Route::resources([
  'tag' => TagController::class,
  'product' => ProductController::class,
]);
  
Route::get('/send-mail', function () {

  Mail::to('newuser@example.com')->send(new MailtrapExample());

  return 'A message has been sent to Mailtrap!';

});

Route::get("/products", function(){
  
  if(Auth::check()){
    return redirect(route("product.index"));
  }
  return redirect(route("login"));
});

Route::get("/", function(){
   return redirect(route("login"));
  
});

Auth::routes(["verify"=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware("auth")->middleware("verified")->name('home');


