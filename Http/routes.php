<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::get('/', ['middleware' => 'auth', 'as'=>'admin.index','uses'=>'AdminController@index']);

	Route::get('offers', ['middleware' => 'auth', 'as'=>'admin.offers','uses'=>'AdminController@offers']);
	Route::get('offers/new', ['middleware' => 'auth', 'as'=>'admin.new_offer','uses'=>'AdminController@new_offer']);
	Route::post('offers/new', ['middleware' => 'auth', 'as'=>'admin.post_new_offer','uses'=>'AdminController@post_new_offer']);

	Route::get('offers/delete/{id}', ['middleware' => 'auth', 'as'=>'admin.delete_offer','uses'=>'AdminController@delete_offer']);

	Route::get('offers/edit/{id}', ['middleware' => 'auth', 'as'=>'admin.edit_offer','uses'=>'AdminController@edit_offer']);
	Route::post('offers/edit/{id}', ['middleware' => 'auth', 'as'=>'admin.post_edit_offer','uses'=>'AdminController@post_edit_offer']);

});