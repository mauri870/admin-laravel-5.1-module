<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	/*
	 * Admin Routes
	 * */
	Route::get('/', ['middleware' => 'auth', 'as'=>'admin.index','uses'=>'AdminController@index']);

	/*
	 * Offers Routes
	 * */
	Route::get('offers', ['middleware' => 'auth', 'as'=>'offer.index','uses'=>'OfferController@index']);
	Route::get('offers/s', ['middleware' => 'auth', 'as'=>'offer.add','uses'=>'OfferController@add']);
	Route::post('offers/new', ['middleware' => 'auth', 'as'=>'offer.post_add','uses'=>'OfferController@post_add']);

	Route::get('offers/delete/{id}', ['middleware' => 'auth', 'as'=>'offer.delete','uses'=>'OfferController@delete']);

	Route::get('offers/edit/{id}', ['middleware' => 'auth', 'as'=>'offer.edit','uses'=>'OfferController@edit']);
	Route::post('offers/edit/{id}', ['middleware' => 'auth', 'as'=>'offer.post_edit','uses'=>'OfferController@post_edit']);


	/*
	 * Gallery Routes
	 * */
	Route::get('gallery', ['middleware' => 'auth', 'as'=>'gallery.index','uses'=>'GalleryController@index']);

	Route::get('gallery/new', ['middleware' => 'auth', 'as'=>'gallery.add','uses'=>'GalleryController@add']);
	Route::post('gallery/new', ['middleware' => 'auth', 'as'=>'gallery.post_add','uses'=>'GalleryController@post_add']);

	Route::get('gallery/delete/{id}', ['middleware' => 'auth', 'as'=>'gallery.delete','uses'=>'GalleryController@delete']);

	Route::get('gallery/edit/{id}', ['middleware' => 'auth', 'as'=>'gallery.edit','uses'=>'GalleryController@edit']);
	Route::post('gallery/edit/{id}', ['middleware' => 'auth', 'as'=>'gallery.post_edit','uses'=>'GalleryController@post_edit']);
});