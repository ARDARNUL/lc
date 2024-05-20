<?php

use Src\Route;

Route::add('POST', '/addImage', [Controller\Site::class, 'addImage'])->middleware('auth');

Route::add('POST', '/signup', [Controller\Site::class, 'signup']);
Route::add('POST', '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/profile', [Controller\Site::class, 'profile'])->middleware('auth');

Route::add('GET', '/viewMonster', [Controller\Monsters::class, 'viewMonster']);
Route::add('GET', '/viewTerminal', [Controller\Terminals::class, 'viewTerminal']);
Route::add('GET', '/viewMoon', [Controller\Moons::class, 'viewMoon']);
Route::add('GET', '/viewItem', [Controller\Items::class, 'viewItem']);
Route::add('GET', '/viewScrab', [Controller\Scrabs::class, 'viewScrab']);
Route::add('GET', '/viewForum', [Controller\Forums::class, 'viewForum']);

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
Route::add('PUT', '/redactTerminal', [Controller\Terminals::class, 'redactTerminal'])->middleware('auth', 'admin');
Route::add('PUT', '/redactNews', [Controller\Forums::class, 'redactNews'])->middleware('auth', 'admin');

Route::add('POST', '/createTerminal', [Controller\Terminals::class, 'createTerminal'])->middleware('auth');
Route::add('POST', '/createComment', [Controller\Forums::class, 'createComment'])->middleware('auth');
Route::add('POST', '/createMonster', [Controller\Monsters::class, 'createMonster'])->middleware('auth', 'admin');
Route::add('POST', '/createScrab', [Controller\Scrabs::class, 'createScrab'])->middleware('auth', 'admin');
Route::add('POST', '/createMoon', [Controller\Moons::class, 'createMoon'])->middleware('auth', 'admin');
Route::add('POST', '/createItem', [Controller\Items::class, 'createItem'])->middleware('auth', 'admin');
Route::add('POST', '/addNew', [Controller\Forums::class, 'addNew'])->middleware('auth');

Route::add('GET', '/searchMonster', [Controller\Monsters::class, 'searchMonster'])->middleware('auth');