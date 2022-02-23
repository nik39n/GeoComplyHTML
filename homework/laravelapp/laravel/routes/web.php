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

//Route::get('/', function () {
//    return view('home.index', []);
//})->name('home.index');
//
//Route::get('/contact',function(){
//    return view('home.contact');
//})->name("conact.index");


Route::get('/',[\App\Http\Controllers\HomeController::class,'home'])->name('home.index');
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('home.contact');
Route::get('/single',AboutController::class);




Route::resource('posts',PostsController::class);


//Route::get('/posts', function() use ($posts){
//    request()->all();
//    return view('posts.index',['posts' => $posts]);
//});
//
//
//
//Route::get('/posts/{id}',function($id) use ($posts){
//
//    abort_if(!isset($posts[$id]),404);
//    return  view('posts.show', ['post' => $posts[$id]]);
//})->where([
//    'id' => '[0-9]+'
//])->name('posts.show');
//
//
//Route::get('/recent-posts/{days_ago?}',function($daysAgo = 20){
//    return  'posts from'   . $daysAgo . ' days ago';
//})->name('posts.recent.index');

//Route::prefix('/fun')->name('fun')->group(function() use ($posts){
//    Route::get('/responses',function() use ($posts){
//        return response($posts,201)->header('Content-Type', 'application/json')->cookie('My_Cookie','Piotr Jura',3600);
//    });
//    Route::get('/redirect', function(){
//        return redirect('/contact');
//    });
//    Route::get('/back', function(){
//        return back();
//    });
//    Route::get('/named-route', function(){
//        return redirect()->route('posts.show',['id' => 1]);
//    });
//    Route::get('/away', function(){
//        return redirect()->away('https://google.com');
//    });
//    Route::get('/json', function() use ($posts){
//        return response()->json($posts);
//    });
//    Route::get('/download', function() use ($posts){
//        return response()->download(public_path('/daniel.jpg'),'face.jpg');
//    });
//});


