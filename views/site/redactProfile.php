<h2><?= $message ?? '' ?></h2>

<form class="flex flex-col" method="post">
<input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF()?>"/>
<input class="bg-gray-400 rounded-lg text-white p-1 m-2 placeholder-white" placeholder="login" type="text" name="login">
   <label class="bg-gray-400 rounded-lg text-white p-1 m-2 placeholder-white">
        Аватар <input type="file" name="avatar" accept="image/*">
    </label>
   <button class="bg-gray-400 rounded-lg text-white p-1" >Редактировать</button>
</form>