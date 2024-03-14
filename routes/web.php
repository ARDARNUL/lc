<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'], '/Monster', [Controller\Site::class, 'Monster']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/main', [Controller\Site::class, 'main']);         
Route::add('GET', '/Item', [Controller\Site::class, 'Item']);    
Route::add('GET', '/Forum', [Controller\Site::class, 'Forum']);    
Route::add('GET', '/Moons', [Controller\Site::class, 'Moons']);            