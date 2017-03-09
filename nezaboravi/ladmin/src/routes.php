<?php

//Logged in users/admin cannot access or send requests these pages
Route::group(['middleware' =>  ['admin_guest','web']], function ()
{
    // Route::get('admin_register', 'Nezaboravi\Ladmin\Http\Controllers\Admin\RegisterController@showRegistrationForm');
    // Route::post('admin_register', 'Nezaboravi\Ladmin\Http\Controllers\Admin\RegisterController@register');
    Route::get('admin', 'Nezaboravi\Ladmin\Http\Controllers\Admin\LoginController@showLoginForm');
    Route::post('admin/login', 'Nezaboravi\Ladmin\Http\Controllers\Admin\LoginController@login');
    //Password reset routes
    Route::get('admin_password/reset', 'Nezaboravi\Ladmin\Http\Controllers\Admin\ForgotPasswordController@showLinkRequestForm');
    Route::post('admin_password/email', 'Nezaboravi\Ladmin\Http\Controllers\Admin\ForgotPasswordController@sendResetLinkEmail');
    Route::get('admin_password/reset/{token}', 'Nezaboravi\Ladmin\Http\Controllers\Admin\ResetPasswordController@showResetForm');
    Route::post('admin_password/reset', 'Nezaboravi\Ladmin\Http\Controllers\Admin\ResetPasswordController@reset');
});
//Only logged in admins can access or send requests to these pages
Route::group(['middleware' => 'admin_auth'], function ()
{
    Route::any('admin/logout', 'Nezaboravi\Ladmin\Http\Controllers\Admin\LoginController@logout');
    Route::any('admin/dashboard', 'Nezaboravi\Ladmin\Http\Controllers\Admin\DashboardController@index');

});
/*

Route::group(['middleware' => ['web']], function ()
{
    Route::get('/admin', 'Nezaboravi\Ladmin\Http\Controllers\Admin\SessionsController@create');
    Route::post('/admin/login', 'Nezaboravi\Ladmin\Http\Controllers\Admin\SessionsController@store');
});*/