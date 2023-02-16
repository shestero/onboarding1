<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageUploadController;
    use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//use app\Models\User;
class Users_view extends Eloquent {
    function __construct()
    {
        $this->setTable('users_view');
    }
}

Route::get('about', function()
{
    return 'About!';
})->name('about');

Route::get('users', function()
{
    $users = Users_view::all();
    return View::make('users')->with('users', $users);
    //return View::make('users');        
})->middleware(['auth', 'verified'])->name('users');;

Route::get('user/{id}', function($id) 
{
    $user = Users_view::firstWhere("id", $id);
    return View::make('user')->with('id', $id)->with('user', $user);
})->where('id', '[0-9]+')->middleware(['auth', 'verified']);

Route::get('user', function() 
{
    $id = Auth::user()->id;
    $user = Users_view::firstWhere("id", $id);
    return View::make('user')->with('id', $id)->with('user', $user);
})->where('id', '[0-9]+')->middleware(['auth', 'verified'])->name('user');

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
})->where('id', '[0-9]+');

Route::get('avatar-upload', [ ImageUploadController::class, 'avatarUpload' ])->
    middleware(['auth', 'verified'])->name('avatar-upload');
Route::post('avatar-upload', [ ImageUploadController::class, 'avatarUploadPost' ])->
    middleware(['auth', 'verified'])->name('avatar.upload.post');

require __DIR__.'/auth.php';
