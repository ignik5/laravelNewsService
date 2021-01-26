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
$a=1;


Route::get('/','homecontroller@index') ->name('home');
  




route::group([
'prefix'=>'admin',
'namespace'=>'admin',
'as'=>'admin.',
'middleware'=>['auth','is_admin']

],function(){
    

//Route::get('/','Newscontroller@index')->name('index');
//Route::match(['get','post'], '/createnews','Newscontroller@createnews')->name('createnews');
//Route::get( '/edit/{news}','Newscontroller@edit')->name('edit');
//Route::post( '/update/{news}','Newscontroller@update')->name('update');
//Route::get( '/destroy/{news}','Newscontroller@destroy')->name('destroy');
Route::get('/users','userscontroller@index')->name('updateuser');
Route::get('/users/toggleAdmin/{user}','userscontroller@toggleAdmin')->name('toggleAdmin');
Route::match(['get', 'post'],'/category','categorycontroller@crate')->name('category');


Route::get('/parser', 'parsercontroller1@index')->name('parser');



Route::resource('/news', 'Newscontroller')->except('show');
Route::get('/news/{some}',function(){
    abort(404);
});
route::match(['get', 'post'], '/profile', 'profilecontroller@update')->name('updateprofile');

Route::get('/savepicture','indexcontroller@savepicture')->name('savepicture');

Route::get('/json1','indexcontroller@json1')->name('json1');


});

route::group([
    'prefix'=>'news',
    'as'=>'news.'
    ],function(){
Route::get('/', 'newscontroller@news')->name('index');
Route::get('/one/{news}', 'newscontroller@show')->name('show');

Route::group([    
    'as'=>'category.'
    ],function(){
     Route::get('/categories', 'categorycontroller@index')->name('index');
     Route::get('/category/{name}', 'categorycontroller@show')->name('show');
 });
 
});
route::match(['get', 'post'], '/profile', 'profilecontroller@update')->name('updateprofile');




Route::view('/veu', 'vue')->name('vue');
Auth::routes();
//Route::get('login','Auth\LoginController@ShowLoginForm')->name('login');
//Route::post('login','Auth\LoginController@login');
//Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('auth/vk','logincontroller@loginVK')->name('vklogin');
Route::get('auth/vk/response','logincontroller@responseVK')->name('vkresponse');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clear','cache@index', function(){
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
})->name('clear');