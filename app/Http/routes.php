<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/key', function() {
    return str_random(32);
});

// api and webservice.
header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

$app->get('/api/blog', function () {
	return App\Blog::all();
});

$app->get('/api/blog/{id}', function ($id) {
	return App\Blog::find($id);
});

$app->post('/api/blog', function (\Illuminate\Http\Request $request) {
	return App\Blog::create($request->all());
});

$app->put('/api/blog', function (\Illuminate\Http\Request $request) {
	return App\Blog::find($request->get('id'))->update($request->all());
});

$app->get('/api/blog/{id}/delete', function ($id) {
	return App\Blog::find($id)->delete();
});

$app->get('/api/blog/{id}/star', function ($id) {
	 $blog = App\Blog::find($id);
	 $star = $blog->star;
	 $blog->star = $star+1;
	 $blog->save();
	 return $blog;
});

$app->get('/api/blog/comment/{blog_id}', function ($blog_id) {
	return App\Comment::where('blog_id', '=',$blog_id)->get();
});

$app->get('/api/comment', function () {
	return App\Comment::all();
});

$app->post('/api/comment', function (\Illuminate\Http\Request $request) {
	return App\Comment::create($request->all());
});

$app->put('/api/comment', function (\Illuminate\Http\Request $request) {
	return App\Comment::find($request->get('id'))->update($request->all());
});

$app->delete('/api/comment', function (\Illuminate\Http\Request $request) {
	return App\Comment::find($request->get('id'))->delete();
});