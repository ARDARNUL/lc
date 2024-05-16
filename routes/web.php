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

Route::add(['GET', 'POST'], '/addNew', [Controller\Forums::class, 'addNew'])
->middleware('auth');

Route::add('DELETE',  '/deleteUser', [Controller\Site::class, 'deleteUser'])->middleware('auth');
Route::add('DELETE',  '/deleteMonster', [Controller\Monsters::class, 'deleteMonster'])->middleware('auth', 'admin');
Route::add('DELETE', '/deleteMoon', [Controller\Moons::class, 'deleteMoon'])->middleware('auth', 'admin');
Route::add('DELETE',  '/deleteItem', [Controller\Items::class, 'deleteItem'])->middleware('auth', 'admin');
Route::add('DELETE',  '/deleteScrab', [Controller\Scrabs::class, 'deleteScrab'])->middleware('auth', 'admin');
Route::add('DELETE', '/deleteNews', [Controller\Forums::class, 'deleteNews'])->middleware('auth', 'admin');
Route::add('DELETE', '/deleteTerminal', [Controller\Terminals::class, 'deleteTerminal'])->middleware('auth', 'admin');

Route::add('PUT', '/redactMonster', [Controller\Monsters::class, 'redactMonster'])->middleware('auth', 'admin');
Route::add('PUT', '/redactMoon', [Controller\Moons::class, 'redactMoon'])->middleware('auth', 'admin');
Route::add('PUT', '/redactItem', [Controller\Items::class, 'redactItem'])->middleware('auth', 'admin');
Route::add('PUT', '/redactScrab', [Controller\Scrabs::class, 'redactScrab'])->middleware('auth', 'admin');
Route::add('PUT', '/redactProfile', [Controller\Site::class, 'redactProfile'])->middleware('auth', 'admin');
Route::add('PUT', '/redactTerminal', [Controller\Terminals::class, 'redactTerminal'])->middleware('auth', 'admin');

Route::add(['GET', 'POST'], '/createTerminal', [Controller\Terminals::class, 'createTerminal'])->middleware('auth');
Route::add(['GET', 'POST'], '/createComment', [Controller\Forums::class, 'createComment'])->middleware('auth');
Route::add(['GET', 'POST'], '/createMonster', [Controller\Monsters::class, 'createMonster'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createScrab', [Controller\Scrabs::class, 'createScrab'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createMoon', [Controller\Moons::class, 'createMoon'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/createItem', [Controller\Items::class, 'createItem'])->middleware('auth', 'admin');

Route::add('GET', '/searchMonster', [Controller\Monsters::class, 'searchMonster'])->middleware('auth');