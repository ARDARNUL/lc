<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello']);
   // ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/Monster', [Controller\Site::class, 'Monster']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/main', [Controller\Site::class, 'main']);         
Route::add('GET', '/Item', [Controller\Site::class, 'Item']);    
Route::add('GET', '/Forum', [Controller\Site::class, 'Forum']);    
Route::add('GET', '/Moons', [Controller\Site::class, 'Moons']);            
Route::add(['DELETE', 'GET'], '/profile', [Controller\Site::class, 'profile'])
->middleware('auth'); 
Route::add(['GET', 'POST'], '/addnew', [Controller\Site::class, 'addnew'])
->middleware('auth'); 
Route::add('GET', '/deleteUser', [Controller\Site::class, 'deleteUser'])->middleware('auth');
Route::add(['GET', 'POST'], '/ticket', [Controller\Site::class, 'ticket'])->middleware('auth');
Route::add(['GET', 'POST'], '/comment', [Controller\Site::class, 'comment'])->middleware('auth');
Route::add(['GET', 'POST'], '/createMonster', [Controller\Site::class, 'createMonster'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createMoons', [Controller\Site::class, 'createMoons'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createItems', [Controller\Site::class, 'createItems'])->middleware('auth', 'admin');
Route::add('GET', '/allTickets', [Controller\Site::class, 'AllTicket']);