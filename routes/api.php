<?php

// use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('System')->prefix('v1')->group(function () {
    Route::resource('users', 'UsersController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('roles', 'RolesController');
    Route::post('/users/storerole/{id}', 'UsersController@StoreRoles')->name('users.sync');
    Route::delete('/users/destroyrole/{role}/{id}', 'UsersController@DestroyRole')->name('users.detach');
});

Route::get('cors_example', function () {
    return ['status' => 'ok'];
});
