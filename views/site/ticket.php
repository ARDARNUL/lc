<form class="flex flex-col" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 w-96 h-96 placeholder-white" placeholder="Описание Тикета" type="text" name="description"></textarea></label>
    <button class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white">Добавить тикет</button>
</form>