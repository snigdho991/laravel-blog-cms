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

	Route::get('/test', function () {
		return App\Post::find(1)->user;
	});


	Route::post('/subscribe', function () {
		$emailAddress = request('email');
		$listId = '9a0fe26c30';

		$check = Mailchimp::check($listId, $emailAddress);

		if(!$check){

			Mailchimp::subscribe($listId, $emailAddress, $mergeFields = [], $confirm = false);

			Session::flash('info', 'Email subscribed successfully into our newsletter !');
			return redirect()->back();
		} else {
			Session::flash('warning', 'Email has been already subscribed in our newsletter !');
			return redirect()->back();
		}
		
	});


	Route::get('/', [
		'uses' => 'FrontEndController@index',
		'as'   => 'index'
	]);


	Route::get('/results', function () {
		$posts = App\Post::where('title', 'like', '%' . request('query') . '%')->get();
		return view('search')->with('posts', $posts)
    						 ->with('title', 'Search result for ' . request('query'))
    					     ->with('settings', App\Setting::first())
    					     ->with('categories', App\Category::orderBy('created_at', 'desc')->take(5)->get())
    					     ->with('query', request('query'));
	});

	Route::get('/post/{slug}', [
		'uses' => 'FrontEndController@singlePost',
		'as'   => 'post.single'
	]);

	Route::get('/category/{slug}', [
		'uses' => 'FrontEndController@category',
		'as'   => 'category.single'
	]);

	Route::get('/tag/{id}', [
		'uses' => 'FrontEndController@tag',
		'as'   => 'tag.single'
	]);



Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/dashboard', [
		'uses' => 'HomeController@index',
		'as'   => 'home'
	]);

	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as'   => 'post.create'
	]);

	Route::get('/posts', [
		'uses' => 'PostsController@index',
		'as'   => 'posts'
	]);

	Route::post('/post/store', [
		'uses' => 'PostsController@store',
		'as'   => 'post.store'
	]);

	Route::get('/post/delete/{id}', [
		'uses' => 'PostsController@destroy',
		'as'   => 'post.delete'
	]);

	Route::get('/post/trashed', [
		'uses' => 'PostsController@trashed',
		'as'   => 'post.trashed'
	]);

	Route::get('/post/kill/{id}', [
		'uses' => 'PostsController@kill',
		'as'   => 'post.kill'
	]);

	Route::get('/post/edit/{id}', [
		'uses' => 'PostsController@edit',
		'as'   => 'post.edit'
	]);

	Route::post('/post/update/{id}', [
		'uses' => 'PostsController@update',
		'as'   => 'post.update'
	]);

	Route::get('/post/restore/{id}', [
		'uses' => 'PostsController@restore',
		'as'   => 'post.restore'
	]);

	Route::get('/post/editTrashed/{id}', [
		'uses' => 'PostsController@editTrashed',
		'as'   => 'post.editTrashed'
	]);

	Route::get('/category/create', [
		'uses' => 'CategoriesController@create',
		'as'   => 'category.create'
	]);

	Route::get('/categories', [
		'uses' => 'CategoriesController@index',
		'as'   => 'categories'
	]);

	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as'   => 'category.edit'
	]);

	Route::get('/category/delete/{id}', [
		'uses' => 'CategoriesController@destroy',
		'as'   => 'category.delete'
	]);

	Route::post('/category/store', [
		'uses' => 'CategoriesController@store',
		'as'   => 'category.store'
	]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as'   => 'category.update'
	]);

	Route::get('/tag/create', [
		'uses' => 'TagsController@create',
		'as'   => 'tag.create'
	]);

	Route::get('/tags', [
		'uses' => 'TagsController@index',
		'as'   => 'tags'
	]);

	Route::get('/tag/edit/{id}', [
		'uses' => 'TagsController@edit',
		'as'   => 'tag.edit'
	]);

	Route::get('/tag/delete/{id}', [
		'uses' => 'TagsController@destroy',
		'as'   => 'tag.delete'
	]);

	Route::post('/tag/store', [
		'uses' => 'TagsController@store',
		'as'   => 'tag.store'
	]);

	Route::post('/tag/update/{id}', [
		'uses' => 'TagsController@update',
		'as'   => 'tag.update'
	]);


	Route::get('/users',[
		'uses' => 'UsersController@index',
		'as'   => 'users'
	]);

	Route::get('/user/create',[
		'uses' => 'UsersController@create',
		'as'   => 'user.create'
	])->middleware('admin');

	Route::post('/user/store',[
		'uses' => 'UsersController@store',
		'as'   => 'user.store'
	])->middleware('admin');

	Route::get('/user/admin/{id}',[
		'uses' => 'UsersController@admin',
		'as'   => 'user.admin'
	])->middleware('admin');

	Route::get('/user/delete/{id}',[
		'uses' => 'UsersController@destroy',
		'as'   => 'user.delete'
	]);

	Route::get('/user/remove-admin/{id}',[
		'uses' => 'UsersController@remove_admin',
		'as'   => 'user.not.admin'
	])->middleware('admin');

	Route::get('/user/profile',[
		'uses' => 'ProfileController@index',
		'as'   => 'user.profile'
	]);

	Route::post('/user/profile/update',[
		'uses' => 'ProfileController@update',
		'as'   => 'user.profile.update'
	]);

	Route::get('/settings',[
		'uses' => 'SettingsController@index',
		'as'   => 'settings'
	])->middleware('admin');

	Route::post('/settings/update',[
		'uses' => 'SettingsController@update',
		'as'   => 'settings.update'
	])->middleware('admin');

});

