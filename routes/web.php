<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\TenderTypeController;

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
    return redirect()->route('login');
});

// Auth::routes();
Auth::routes([
    'register' => false, // Register Routes...
]);
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');
//Route::get('/logout',[LogoutController::class,'index'])->name('logout.index');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('tender_types', TenderTypeController::class);
    Route::resource('tenders', TenderController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('designations', DesignationController::class);
});

Route::resource('buyers', BuyerController::class);
Route::resource('proposals', ProposalController::class);
Route::get('proposals/created/{id}',[ProposalController::class,'created']);
Route::get('proposals/shortfinallisted/{status_id}',[ProposalController::class,'shortfinallist']);

Route::get('vendors',[UserController::class,'vendor']);


