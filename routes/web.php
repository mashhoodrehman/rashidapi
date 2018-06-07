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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

    Route::get('services', 'ServiceController@index')->name('services');
    Route::get('services/create', 'ServiceController@create')->name('services.create');
    Route::post('services', 'ServiceController@store')->name('services.store');
    Route::get('services/{service}/edit', 'ServiceController@edit')->name('services.edit');
    Route::put('services/{service}', 'ServiceController@update')->name('services.update');
    Route::get('services/{service}/delete', 'ServiceController@destroy')->name('services.destroy');

    Route::get('blogs', 'BlogController@index')->name('blogs');
    Route::get('blogs/create', 'BlogController@create')->name('blogs.create');
    Route::post('blogs', 'BlogController@store')->name('blogs.store');
    Route::get('blogs/{blog}/edit', 'BlogController@edit')->name('blogs.edit');
    Route::put('blogs/{blog}', 'BlogController@update')->name('blogs.update');
    Route::get('blogs/{blog}/delete', 'BlogController@destroy')->name('blogs.destroy');

    Route::get('supports', 'SupportController@index')->name('supports');
    Route::get('supports/{support}/delete', 'SupportController@destroy')->name('supports.destroy');

    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/create', 'AppointmentController@create')->name('appointments.create');
    Route::post('appointments', 'AppointmentController@store')->name('appointments.store');
    Route::get('appointments/{appointment}/edit', 'AppointmentController@edit')->name('appointments.edit');
    Route::put('appointments/{appointment}', 'AppointmentController@update')->name('appointments.update');
    Route::get('appointments/{appointment}/delete', 'AppointmentController@destroy')->name('appointments.destroy');

    Route::get('testimonials', 'TestimonialController@index')->name('testimonials');
    Route::get('testimonials/create', 'TestimonialController@create')->name('testimonials.create');
    Route::post('testimonials', 'TestimonialController@store')->name('testimonials.store');
    Route::get('testimonials/{testimonial}/edit', 'TestimonialController@edit')->name('testimonials.edit');
    Route::put('testimonials/{testimonial}', 'TestimonialController@update')->name('testimonials.update');
    Route::get('testimonials/{testimonial}/delete', 'TestimonialController@destroy')->name('testimonials.destroy');

    Route::get('galleries', 'GalleryController@index')->name('galleries');
    Route::get('galleries/create', 'GalleryController@create')->name('galleries.create');
    Route::post('galleries', 'GalleryController@store')->name('galleries.store');
    Route::get('galleries/{gallery}/edit', 'GalleryController@edit')->name('galleries.edit');
    Route::put('galleries/{gallery}', 'GalleryController@update')->name('galleries.update');
    Route::get('galleries/{gallery}/delete', 'GalleryController@destroy')->name('galleries.destroy');

    Route::get('availabilities', 'AvailabilityController@index')->name('availabilities');
    Route::get('availabilities/create', 'AvailabilityController@create')->name('availabilities.create');
    Route::post('availabilities', 'AvailabilityController@store')->name('availabilities.store');
    Route::get('availabilities/{availability}/edit', 'AvailabilityController@edit')->name('availabilities.edit');
    Route::put('availabilities/{availability}', 'AvailabilityController@update')->name('availabilities.update');
    Route::get('availabilities/{availability}/delete', 'AvailabilityController@destroy')->name('availabilities.destroy');

    Route::get('settings/edit', 'SettingController@edit')->name('settings.edit');
    Route::put('settings/{setting}', 'SettingController@update')->name('settings.update');

    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
