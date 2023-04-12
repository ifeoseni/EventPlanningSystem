<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\VendorTypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TellStoryController;
use App\Http\Controllers\EventCenterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerEventUsers');
Route::post('/register', [AuthController::class, 'register'])->name('registerEventUsers.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Event Type
Route::get('/add-event-type', [EventTypeController::class, 'create'])->name('addEventType');//->middleware(['auth']) this works when you are using controller;
Route::post('/add-event-type', [EventTypeController::class, 'store'])->name('addEventType.post');
Route::get('tell-your-story',[TellStoryController::class,'accessStoryForm'])->name('tellStory');
Route::post('tell-your-story',[TellStoryController::class,'store'])->name('tellStory.post');

//Vendor Type without authentication
// Route::get('/add-vendor-type', [VendorTypeController::class, 'create'])->name('addVendorType');
// Route::post('/add-vendor-type', [VendorTypeController::class, 'store'])->name('addVendorType.post');

//Admin Account 4
# Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
//     //Route::get('/Auth', [AdminController::class, 'index'])->name('admin.homepage');

# })->middleware('auth','role:4');
///before middleware for admin
// Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.homepage');
// Route::get('/admin/add-event-center', [EventCenterController::class, 'create'])->name('addEventCenterAdmin');
// Route::post('/admin/add-event-center', [EventCenterController::class, 'store'])->name('addEventCenterAdmin.post');

Route::middleware(['auth', 'adminusers'])->group(function () {//roleAdmin in kernel and we created middleware Admin
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.homepage');
    Route::get('/admin/add-event-center', [EventCenterController::class, 'create'])->name('addEventCenterAdmin');
    Route::post('/admin/add-event-center', [EventCenterController::class, 'store'])->name('addEventCenterAdmin.post');
});

Route::middleware(['auth', 'eventownerusers'])->group(function () {

});

Route::middleware(['auth', 'vendorusers'])->group(function () {

});

Route::middleware(['auth', 'eventcenterusers'])->group(function () {

});

Route::middleware(['auth', 'allusers'])->group(function () {
    Route::get('/add-vendor-type', [VendorTypeController::class, 'create'])->name('addVendorType');
    Route::post('/add-vendor-type', [VendorTypeController::class, 'store'])->name('addVendorType.post');
});
