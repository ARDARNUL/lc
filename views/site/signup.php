<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <input class="bg-gray-400 rounded-lg text-white p-1 placeholder-white" placeholder="login" type="text" name="login">
   <input class="bg-gray-400 rounded-lg text-white p-1 placeholder-white" placeholder="password" type="password" name="password">
   <input class="bg-gray-400 rounded-lg text-white p-1" type="file" name="avatar" multiple accept="image/*,image/jpeg">
   <button class="bg-gray-400 rounded-lg text-white p-1" >Зарегистрироваться</button>
</form>
