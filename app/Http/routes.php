<?php

use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

/*ilk yaratılan v1*/

Route::get('/', 'ContentController@index');

Route::get('/{slug}', 'ContentController@showPost');

Route::get('/admin/post/{id}/edit', function($id){
    $post = Post::where('id', $id)->first();
    return view('admin.edit', ['post' => $post]);
});

Route::post('/admin/post/{id}/edit', 'Admin\ContentController@edit');

Route::get('admin', function () {
  return redirect('/admin/post');
});

$router->group([
  'namespace' => 'Admin',
  'middleware' => 'auth',
], function () {
  resource('admin/post', 'ContentController');
});

Route::delete('/admin/delete/{id}', function ($id) {
    Post::findOrFail($id)->delete();

    return redirect('/admin/post/');
});

Route::get('/admin/post/create/', function(){
    return view('admin.create');
});

Route::post('/admin/post/create/', 'Admin\ContentController@store'); 

// Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
