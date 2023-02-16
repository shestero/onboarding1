<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('about', function()
{
    return 'TODO: about json.';
});

Route::get('promote/{userid}', function($userid)
{
    $res = DB::table('users')
        ->where('id', $userid)
        ->update(['group_id' => 1]);

    return var_export($res, true);

})->where('userid', '[0-9]+')->middleware('admin');

Route::resource('users', UserController::class);
