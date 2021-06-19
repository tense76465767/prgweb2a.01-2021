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

Route::get('/', 'App\Http\Controllers\TestController@show');
Route::get('/welcome/{id}', 'App\Http\Controllers\HelloController@welcome');

Route::get('/teachers', 'App\Http\Controllers\TeacherController@getTeachers');
Route::get('/teacheradd', 'App\Http\Controllers\TeacherController@showTeacherAdd');
Route::get('/teacheraddangular', 'App\Http\Controllers\TeacherController@showTeacherAddAngular');
Route::post('/teachers', 'App\Http\Controllers\TeacherController@postTeacher');
Route::get('/teachers/{id}', 'App\Http\Controllers\TeacherController@getTeacher');
Route::put('/teachers', 'App\Http\Controllers\TeacherController@putTeacher');

Route::get('/ajaxteachers', 'App\Http\Controllers\TeacherAjaxController@getTeachers');
Route::post('/ajaxteachers', 'App\Http\Controllers\TeacherAjaxController@postTeacher');
Route::put('/ajaxteachers', 'App\Http\Controllers\TeacherAjaxController@putTeacher');
Route::delete('/ajaxteachers/{id}', 'App\Http\Controllers\TeacherAjaxController@deleteTeacher');

Route::get('/resultjson', function () {
    return [
        'firstName' => 'Moises',
        'lastName' => 'Choque'
    ];
});

Route::get('/test/{id}', function ($id) {
    $data = [
        'one' => 'You selected one',
        'two' => 'You selected two'
    ];

    if (!array_key_exists($id, $data)) {
        abort(404, 'Not found');
    }

    return $data[$id] ?? "The record doesn't exist";
});

Route::get('/example', function () {
    $data = [
        'one' => 'You selected one',
        'two' => 'You selected two'
    ];

    $id = request('id');

    if (!array_key_exists($id, $data)) {
        abort(404, 'Not found');
    }

    return $data[$id] ?? "The record doesn't exist";
});
