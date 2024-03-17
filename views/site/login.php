<h2>Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
   ?>
   <form method="post">
       <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
       <input class="bg-gray-400 rounded-lg text-white p-1 placeholder-white" placeholder="login" placeholder="login" type="text" name="login">
       <input class="bg-gray-400 rounded-lg text-white p-1 placeholder-white" placeholder="password" type="password" name="password">
       <button class="bg-gray-400 rounded-lg text-white p-1">Войти</button>
   </form>
<?php endif;
