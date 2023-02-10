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

//use app\Models\User;
class Users_view extends Eloquent {
    function __construct()
    {
        $this->setTable('users_view');
    }
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function()
{
    return 'About!';
});

Route::get('users', function()
{
    $users = Users_view::all();
    return View::make('users')->with('users', $users);

    //return View::make('users');        
});

