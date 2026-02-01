<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;



Route::get('/', function () {
     return view('startbootstrap.index');
});
Route::get('/register', function() {
     return view('startbootstrap.register');
});
Route::post('/register', [UsersController::class, 'create']);