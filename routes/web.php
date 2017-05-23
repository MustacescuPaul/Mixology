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

Auth::routes();

Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/recipes_index','PagesController@getRetete')->name('all_recipes');

Route::get('search','PagesController@getSearch')->name('pages.searchRecipe');
Route::post('search','PagesController@postSearch')->name('pages.search');
Route::get('results','PagesController@getResults')->name('pages.results');
Route::post('delete/{id}','RecipesController@delete_flavour')->name('recipes.del');
Route::post('add/{id}','RecipesController@add_flavour')->name('recipes.add');
Route::resource('recipes','RecipesController');
Route::get('/afiseaza/{id}','PagesController@getAfiseaza')->name('pages.show');
Route::get('/top/{period}','PagesController@getTop')->name('pages.top');
Route::post('/test/{id}','RecipesController@postTest')->name('recipes.test');