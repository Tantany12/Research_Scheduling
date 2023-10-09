<?php

use App\Http\Controllers\ResearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::get('Schedule', function () {
    return view('/seeSchedule');
});

Route::get('/', function () {
    return view('WelcomePage');
});

Route::get('dashboard', function () {
    return view ('/dashboard');
});

Route::get('adminSchedule', function () {
    return view ('/adminSchedule');

});




Auth::routes();
Route::post('/assign-research', [App\Http\Controllers\ResearchController::class, 'assignResearch'])->name('assignResearch');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/editData/{id}', [App\Http\Controllers\ResearchController::class, 'editData'])->name('editData');

Route::get('/view-pdf/{filename}', [App\Http\Controllers\ResearchController::class, 'viewData'])->name('view-pdf');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'sendFailedLoginResponse'])-> name('sendFailedLoginResponse');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'login'])-> name('logins');


Route::group(['middleware' => 'user', 'auth'], function () {
    Route::get('/searchData', [App\Http\Controllers\ResearchController::class, 'search'])->name('searchData');
    Route::get('/seeSchedule', [App\Http\Controllers\HomeController::class, 'researchData'])->name('Schedule');
    Route::get('/seeSchedule', [App\Http\Controllers\HomeController::class, 'paginationLinks'])->name('Pagination');
    Route::resource('datas', ResearchController::class);
});

Route::group(['middleware' => 'admin', 'auth'], function () { 
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin'); 
    Route::get('/adminSchedule', [App\Http\Controllers\ResearchController::class, 'adminScheduleAdmin'])->name('adminSchedule');
    Route::get('/adminSchedule', [App\Http\Controllers\ResearchController::class, 'adminData']);
    Route::get('/adminSchedule', [App\Http\Controllers\ResearchController::class, 'pagination_Admin'])->name('PaginationAdmin');
    Route::get('/dashboard', [App\Http\Controllers\ResearchController::class, 'dashboard'])->name('admin.dashboard');     
   
    Route::post('/updateData/{id}', [App\Http\Controllers\ResearchController::class, 'updateData'])->name('updateData');
    Route::post('/delete/{id}', [App\Http\Controllers\ResearchController::class, 'deleteData'])->name('delete');
});
