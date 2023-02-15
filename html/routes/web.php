<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ImageUploadController;
   
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

Route::get('login', function()
{
    return 'Login page.';
});



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

Route::get('user/{id}', function($id) 
{
    $user = Users_view::firstWhere("id", $id);
    return View::make('user')->with('id', $id)->with('user', $user);
});

Route::get('avatar/{id}', function($id)
{
    // TODO: check id is a valid user id
    $image = Storage::disk('s3')->get($id); // Storage::get($id);
    if (!$image)
        return "Error with <b>$id</b>";
        
    $mimetype = Storage::mimeType($image); // 'image/jpeg';
    return response($image)->withHeaders([
        'Content-Type' => $mimetype
      ]);
});

Route::get('avatar-upload', [ ImageUploadController::class, 'avatarUpload' ])->name('avatar-upload');
Route::post('avatar-upload', [ ImageUploadController::class, 'avatarUploadPost' ])->name('avatar.upload.post');
