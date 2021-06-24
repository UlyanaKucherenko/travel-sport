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

use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

Route::get('/locale/{name?}', "HomeController@locale")->name('locale');

Route::get('/', "HomeController@index")->name('home');
Route::get('/home', "HomeController@index");
Route::get('/member/{plan_name?}', "HomeController@member")->middleware('guest');

Route::post('/login', 'LoginUserController@login')->name('login');
Route::get('/logout', 'LoginUserController@logout')->name('logout');
Route::post('/register', 'RegisterUserController@registerUser')->name('register');

Route::post('/contact', 'HomeController@contact')->name('contact');

Route::prefix('member_area')->group(function () {

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', function () {
            return redirect('/member_area/dashboard');
        });

        Route::get('/profile', "MemberController@profile")->name("showMember");
        Route::post('/profile', 'MemberController@updateProfile')->name('updateProfile');

        Route::post('/set_confirm', 'MemberController@setConfirm')->name('setConfirm');
        Route::post('/sendWelcomeEmail', 'MemberController@sendWelcomeEmail')->name('sendWelcomeEmail');

        Route::get('/dashboard', 'MemberController@dashboard')->name('dashboard');
        Route::get('/manage', 'MemberController@manage')->name('manage');
        Route::get('/coach', 'MemberController@coach')->name('coach');

        Route::get('/books', 'BookController@index')->name('indexBook')->middleware('checkSubscribe');
        Route::get('/books/{id}', 'BookController@show')->name('showBook')->middleware('checkSubscribe');
        Route::post('/books', 'BookController@store')->name('books.store')->middleware('checkAdmin');
        Route::post('/books/sort', 'BookController@sort')->name('books.sort')->middleware('checkAdmin');
        Route::post('/books/randomSort', 'BookController@randomSort')->name('books.randomSort')->middleware('checkAdmin');

        Route::get('/booking-info', 'TrainingsController@bookingInfo')->name('booking-info');
        Route::post('/update-booking', 'TrainingsController@updateBooking')->name('update-booking-item');
        Route::post('/add-download', 'BookDownloadsController@create')->name('createBookDownload');

    });

});

Route::get('/privacy_policy', "HomeController@privacyPolicy")->name('privacy_policy');
Route::get('/terms_conditions', "HomeController@termsConditions")->name('terms_conditions');
Route::get('/refund_policy', "HomeController@refundPolicy")->name('refund_policy');

//Route::get('/home_unsubscribe', "HomeController@homeUnsubscribe")->name('home_unsubscribe');
//Route::get('/my_subscriptions', "HomeController@mySubscriptions")->name('my_subscriptions');
Route::get('/unsubscribe_user', "MemberController@unsubscribe")->middleware('auth')->name('unsubscribe');
Route::post('/unsubscribe_user', "HomeController@unsubscribe")->name('unsubscribePost');

Route::post('/getintouch', "HomeController@getInTouch")->name('getInTouch');
