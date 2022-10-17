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

Route::get('/student', function () {
    return view('student_manage');
})->name('student');

Route::get('/edit', function () {
    return view('student_edit');
});

Route::get('/add', function () {
    return view('add');
});

Route::post('/student', function () {
    return view('student_manage');
})->middleware('editor');

Route::get('/delete', function () {

})->middleware('delete');