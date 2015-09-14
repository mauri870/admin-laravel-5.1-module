<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::get('/', ['middleware' => 'auth', 'as'=>'admin.index','uses'=>'AdminController@index']);
});