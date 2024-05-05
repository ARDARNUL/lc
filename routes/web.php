<?php

use Src\Route;

Route::add('POST', '/signup', [Controller\Site::class, 'signup']);
Route::add('POST', '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

Route::add('GET', '/viewMonster', [Controller\Monsters::class, 'viewMonster']);
Route::add('GET', '/main', [Controller\Site::class, 'main']);
Route::add('GET', '/Item', [Controller\Site::class, 'Item']);
Route::add('GET', '/Forum', [Controller\Site::class, 'Forum']);
Route::add('GET', '/Moons', [Controller\Site::class, 'Moons']);

Route::add(['DELETE', 'GET'], '/profile', [Controller\Site::class, 'profile'])
->middleware('auth');

Route::add(['GET', 'POST'], '/addnew', [Controller\Site::class, 'addnew'])
->middleware('auth');

Route::add('GET', '/deleteUser', [Controller\Site::class, 'deleteUser'])->middleware('auth');
Route::add('GET', '/deleteMonster', [Controller\Monsters::class, 'deleteMonster'])->middleware('auth', 'admin');
Route::add('GET', '/deleteMoons', [Controller\Site::class, 'deleteMoons'])->middleware('auth', 'admin');
Route::add('GET', '/deleteItems', [Controller\Site::class, 'deleteItems'])->middleware('auth', 'admin');
Route::add('GET', '/deleteNews', [Controller\Site::class, 'deleteNews'])->middleware('auth', 'admin');

Route::add(['GET', 'POST'], '/redactMonster', [Controller\Monsters::class, 'redactMonster'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactMoon', [Controller\Site::class, 'redactMoon'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactItem', [Controller\Site::class, 'redactItem'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactProfile', [Controller\Site::class, 'redactProfile'])->middleware('auth', 'admin');


Route::add(['GET', 'POST'], '/ticket', [Controller\Site::class, 'ticket'])->middleware('auth');
Route::add(['GET', 'POST'], '/comment', [Controller\Site::class, 'comment'])->middleware('auth');
Route::add(['GET', 'POST'], '/createMonster', [Controller\Monsters::class, 'createMonster'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createMoons', [Controller\Site::class, 'createMoons'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createItems', [Controller\Site::class, 'createItems'])->middleware('auth', 'admin');

Route::add('GET', '/User', [Controller\Site::class, 'User'])->middleware('auth');