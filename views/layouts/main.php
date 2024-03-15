<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="https://cdn.tailwindcss.com"></script>
   <title>lethal Company</title>
</head>
<body>
<header>

<div class="flex justify-end gap-4 bg-gray-400 text-gray-200 p-2">
       <?php
       if (!app()->auth::check()):
           ?>
           <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
           <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
       <?php
       else:
           ?>
           <a href="<?= app()->route->getUrl('/profile') ?>">Профиль <?= app()->auth::user()->name ?>
           <a href="<?= app()->route->getUrl('/logout') ?>">Выход <?= app()->auth::user()->name ?></a>
       <?php
       endif;
       ?>
   </div>

   <nav class="flex justify-around bg-gray-400 text-gray-200 p-2">

            <a href="<?= app()->route->getUrl('/Monster') ?>">Монстры</a>

            <a href="<?= app()->route->getUrl('/Item') ?>">Предметы</a>

            <a href="<?= app()->route->getUrl('/Moons') ?>">Луны</a>
            
            <a href="<?= app()->route->getUrl('/Forum') ?>">Обсуждения</a>
   </nav>
   
</header>
<main>
   <?= $content ?? '' ?>
</main>
</body>
</html>
