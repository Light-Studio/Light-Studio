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




Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{

Route::get('/', 'PagesController@getIndex')->name('index');




Route::get('/blog', 'BlogController@getBlog')->name('blog');
Route::get('/blog/{slug}', ['as' => 'blog.view', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');

Route::get('/test/projects', 'PagesController@getProjects')->name('projects');

Route::group(['prefix' => 'admin'], function () {



Route::get('/index', 'PagesController@getIndexVoyager')->name('voyager.index');
Route::post('/projects/{project}/upload', 'Voyager\VoyagerProjectController@uploadImage')->name('voyager.projects.upload');

Route::delete('/projects/{project}/upload/{projectimage}', 'Voyager\VoyagerProjectController@destroyImage')->name('voyager.projects.upload.destroy');

    Voyager::routes();
});

});

Route::get('/translation', 'PagesController@getTranslationsVoyager')->name('voyager.translations');
Route::post('/', 'PagesController@postContact');
Route::get('/fr/tags/{tag}', 'ShowTagsController@getTag')->name('fr.tags.view');
Route::get('/en/tags/{tag}', 'ShowTagsController@getEnTag')->name('en.tags.view');



