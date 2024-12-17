<?php

use App\Http\Controllers\{
    TestControllers,
    ProfileController
};
use Illuminate\Support\Facades\Route;
use App\Services\Calculator;
use App\Models\User;

// app()->bind(Calculator::class, function(){
//     return new Calculator();
// });

Route::get('/', function () {
    dd(app()->make(Calculator::class)->add(1,3));
    //return view('welcome');
});

Route::controller(TestControllers::class)->group(function(){
    Route::get('call', 'index')->name('index');
    Route::get('facade', 'callStaticFacades')->name('callStaticFacades');
    Route::get('services', 'servicesExample')->name('servicesExample');
    Route::get('second-highest-record', 'secondHighestRecored');
    Route::get('cacade-on-delete-user-post', 'userPostDelete');
    Route::get('core-php-codes', 'corePhp');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
