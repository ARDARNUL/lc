<?php

use Src\Route;

Route::add('POST', '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['DELETE', 'GET'], '/profile', [Controller\Site::class, 'profile'])->middleware('auth');

Route::add('GET', '/viewMonster', [Controller\Monsters::class, 'viewMonster']);
Route::add('GET', '/viewTerminal', [Controller\Terminals::class, 'viewTerminal']);
Route::add('GET', '/viewMoon', [Controller\Moons::class, 'viewMoon']);
Route::add('GET', '/viewItem', [Controller\Items::class, 'viewItem']);
Route::add('GET', '/viewScrab', [Controller\Scrabs::class, 'viewScrab']);
Route::add('GET', '/viewForum', [Controller\Forums::class, 'viewForum']);

Route::add(['GET', 'POST'], '/addnew', [Controller\Site::class, 'addnew'])
->middleware('auth');

Route::add(['DELETE', 'POST'],  '/deleteUser', [Controller\Site::class, 'deleteUser'])->middleware('auth');
Route::add(['DELETE', 'POST'],  '/deleteMonster', [Controller\Monsters::class, 'deleteMonster'])->middleware('auth', 'admin');
Route::add(['DELETE', 'POST'], '/deleteMoon', [Controller\Moons::class, 'deleteMoon'])->middleware('auth', 'admin');
Route::add(['DELETE', 'POST'],  '/deleteItem', [Controller\Items::class, 'deleteItem'])->middleware('auth', 'admin');
Route::add(['DELETE', 'POST'],  '/deleteScrab', [Controller\Scrabs::class, 'deleteScrab'])->middleware('auth', 'admin');
Route::add(['DELETE', 'POST'],  '/deleteNews', [Controller\Forums::class, 'deleteNews'])->middleware('auth', 'admin');

Route::add(['GET', 'POST'], '/redactMonster', [Controller\Monsters::class, 'redactMonster'])->middleware('auth', 'admin');
Route::add(['PUT', 'POST'], '/redactMoon', [Controller\Moons::class, 'redactMoon'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactItem', [Controller\Items::class, 'redactItem'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactScrab', [Controller\Scrabs::class, 'redactScrab'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/redactProfile', [Controller\Site::class, 'redactProfile'])->middleware('auth', 'admin');

Route::add(['GET', 'POST'], '/comment', [Controller\Forums::class, 'comment'])->middleware('auth');
Route::add(['GET', 'POST'], '/createMonster', [Controller\Monsters::class, 'createMonster'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createScrab', [Controller\Scrabs::class, 'createScrab'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createMoon', [Controller\Moons::class, 'createMoon'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createItem', [Controller\Items::class, 'createItem'])->middleware('auth', 'admin');

Route::add('POST', '/searchMonster', [Controller\Monsters::class, 'searchMonster'])->middleware('auth');