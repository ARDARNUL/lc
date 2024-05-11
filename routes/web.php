<?php

use Src\Route;

Route::add('POST', '/signup', [Controller\Site::class, 'signup']);
Route::add('POST', '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['DELETE', 'GET'], '/profile', [Controller\Site::class, 'profile'])->middleware('auth');

Route::add('GET', '/viewMonster', [Controller\Monsters::class, 'viewMonster']);
Route::add('GET', '/viewTerminal', [Controller\Terminals::class, 'viewTerminal']);
Route::add('GET', '/tiers', [Controller\Moons::class, 'tiers']);
Route::add('GET', '/main', [Controller\Site::class, 'main']);
Route::add('GET', '/viewItem', [Controller\Items::class, 'viewItem']);
Route::add('GET', '/Forum', [Controller\Forums::class, 'Forum']);
Route::add('GET', '/viewMoon', [Controller\Moons::class, 'viewMoon']);

Route::add(['GET', 'POST'], '/addnew', [Controller\Site::class, 'addnew'])
->middleware('auth');

Route::add('DELETE', '/deleteUser', [Controller\Site::class, 'deleteUser'])->middleware('auth');
Route::add('DELETE', '/deleteMonster', [Controller\Monsters::class, 'deleteMonster'])->middleware('auth', 'admin');
Route::add('DELETE', '/deleteMoons', [Controller\Moons::class, 'deleteMoons'])->middleware('auth', 'admin');
Route::add('DELETE', '/deleteItems', [Controller\Site::class, 'deleteItems'])->middleware('auth', 'admin');
Route::add('DELETE', '/deleteNews', [Controller\Forums::class, 'deleteNews'])->middleware('auth', 'admin');

Route::add(['GET', 'POST'], '/redactMonster', [Controller\Monsters::class, 'redactMonster'])->middleware('auth', 'admin');
Route::add(['PUT', 'POST'], '/redactMoon', [Controller\Moons::class, 'redactMoon'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactItem', [Controller\Site::class, 'redactItem'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactProfile', [Controller\Site::class, 'redactProfile'])->middleware('auth', 'admin');

Route::add(['GET', 'POST'], '/comment', [Controller\Forums::class, 'comment'])->middleware('auth');
Route::add(['GET', 'POST'], '/createMonster', [Controller\Monsters::class, 'createMonster'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createMoons', [Controller\Moons::class, 'createMoons'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createItems', [Controller\Site::class, 'createItems'])->middleware('auth', 'admin');

Route::add('GET', '/User', [Controller\Site::class, 'User'])->middleware('auth');