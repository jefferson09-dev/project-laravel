<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
     return view('startbootstrap.index');
});
Route::get('/register', function(){
     return view('startbootstrap.register');
});