<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
   <input class="bg-gray-400 rounded-lg text-white p-1 placeholder-white" placeholder="login" type="text" name="login">
   <input class="bg-gray-400 rounded-lg text-white p-1 placeholder-white" placeholder="password" type="password" name="password">   
   <label class="bg-gray-400 rounded-lg text-white p-1 placeholder-white">
        Пикча <input type="file" name="avatar" accept="image/*">
    </label>
   <button class="bg-gray-400 rounded-lg text-white p-1" >Зарегистрироваться</button>
</form>
