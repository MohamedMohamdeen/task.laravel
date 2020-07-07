<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
route::group(['prefix'=>'admin'],function(){
route::group(['middleware'=>'role:super_admin'],function(){
// route user
Route::get('/users', 'userController@index')->name('users');
Route::get('/adduUer', 'userController@create')->name('users.create');
Route::get('/editUser/{id}', 'userController@edit')->name('users.edit');
Route::post('/adduUer','userController@store')->name('users.store');
Route::post('/editUser/{id}', 'userController@update')->name('updata.user');
Route::get('/deleteUser/{id}', 'userController@destroy')->name('delete.user');

// route roles
Route::get('/roles', 'RoleController@index')->name('Roles');
Route::get('/addRoles', 'RoleController@create')->name('Roles.create');
Route::get('/editRoles/{id}', 'RoleController@edit')->name('Roles.edit');
Route::post('/addRoles', 'RoleController@store')->name('Roles.store');
Route::post('/editRoles/{id}', 'RoleController@update')->name('Roles.updata');
Route::get('/delateRoles/{id}', 'RoleController@destroy')->name('Roles.delete');
// route tickets
Route::get('/tickets', 'TicketController@index')->name('tickets');
Route::get('/addTickets', 'TicketController@create')->name('tickets.create');
Route::get('/editTickets/{id}', 'TicketController@edit')->name('tickets.edit');
Route::post('/addTickets', 'TicketController@store')->name('tickets.store');
Route::post('/editTickets/{id}', 'TicketController@update')->name('tickets.updata');
Route::get('/delateTickets/{id}', 'TicketController@destroy')->name('tickets.delete');

});
Route::get('/home', 'HomeController@index')->name('home');
// ticket user
Route::get('/tickets/{user}', 'TicketController@Tickets_user')->name('Tickets_user');
// route settings
Route::get('/profile/{id}', 'userController@show')->name('profile');
Route::post('/profile/{id}', 'userController@update_profile')->name('profile.updata');

});
