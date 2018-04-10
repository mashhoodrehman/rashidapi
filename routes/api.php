<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->name('api.')->middleware('cors')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::post('/login', 'LoginController@authenticate')->name('login');
        Route::post('/register', 'RegisterController@register')->name('register');
        Route::post('/verify-mobile', 'RegisterController@verifyMobile')->name('verifyMobile');
        Route::post('/forgot-password', 'RegisterController@sendResetLinkEmail')->name('forgotPassword');
    });
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('services', 'ServiceController@index')->name('services');
        Route::get('blogs', 'BlogController@index')->name('blogs');
        Route::get('testimonials', 'TestimonialController@index')->name('testimonials');
        Route::get('galleries', 'GalleryController@index')->name('galleries');
        Route::get('availabilities', 'AvailabilityController@index')->name('availabilities');
        Route::get('settings', 'SettingController@index')->name('settings');
        Route::post('support', 'SupportController@store')->name('support');
        Route::get('appointments/{appointment}/cancel', 'AppointmentController@cancelAppointment')->name('appointment.cancel');
        Route::get('appointments', 'AppointmentController@index')->name('appointment.index');
        Route::post('appointments/filter-by-date', 'AppointmentController@filterByDate')->name('appointment.filterByDate');
        Route::post('appointments', 'AppointmentController@store')->name('appointment.store');
    });
});
