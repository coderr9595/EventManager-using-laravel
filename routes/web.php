<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\userAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;


Route::get('/', [DashboardController::class,'index']);
Route::get('/about',function(){
    return view('about');
});
Route::get('/contact',function(){
    return view('contact');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/log',[userAuth::class,'check']);
Route::get('/register', function () {
    return view('register');
});
Route::post('/reg',[userAuth::class,'save']);

Route::get('/logout',[userAuth::class,'logout']);

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::delete('events/{event}/cancel', [EventController::class, 'cancelRegistration'])->name('events.cancel');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');

Route::get('/admin/manage-events', [AdminController::class, 'manageEvents'])->name('admin.events.index');
Route::get('/admin/events/{id}/edit', [AdminController::class, 'edit'])->name('admin.events.edit');
Route::delete('/admin/events/{id}', [AdminController::class, 'destroy'])->name('admin.events.destroy');

Route::get('/admin/events/{id}/edit', [AdminController::class, 'edit'])->name('admin.events.edit');
Route::put('/admin/events/{id}', [AdminController::class, 'update'])->name('admin.events.update');

Route::get('/my-events', [EventController::class, 'showMyEvents'])->name('events.myEvents');
