<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use app\Models\User as Users_view;
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
    return redirect('dashboard'); // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use Illuminate\Support\Facades\Storage;

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('users', function () {
    $users = Users_view::all();

    return View::make('users')->with('users', $users);
})->middleware(['auth', 'verified'])->name('users');

Route::get('user/{id}', function ($id) {
    $user = Users_view::firstWhere('id', $id);

    return View::make('user')->with('id', $id)->with('user', $user);
})->where('id', '[0-9]+')->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->get('user', function () {
    $id = Auth::user()->id;
    $user = Users_view::firstWhere('id', $id);

    return View::make('user')->with('id', $id)->with('user', $user);
})->name('user');

Route::get('promote/{userid}', function ($userid) {
    $res = DB::table('users')->where('id', $userid)->update(['group_id' => 1]);

    return var_export($res, true);
})->where('userid', '[0-9]+')->middleware('admin');

Route::get('user.delete/{userid}', function ($userid) {
    $res = DB::table('users')->where('id', $userid)->delete();

    return var_export($res, true);
})->where('userid', '[0-9]+')->middleware('admin');

Route::get('avatar-upload', [ImageUploadController::class, 'avatarUpload'])->
    middleware(['auth', 'verified'])->name('avatar-upload');
Route::post('avatar-upload', [ImageUploadController::class, 'avatarUploadPost'])->
    middleware(['auth', 'verified'])->name('avatar.upload.post');

require __DIR__.'/auth.php';
