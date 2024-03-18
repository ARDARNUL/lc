<h2><?= $message ?? '' ?></h2>

<form class="flex flex-col" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label><input class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white" placeholder="Название монстра" type="text" name="name"></label>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white w-96 h-96 p-1 placeholder-white" placeholder="Описание" type="text" name="description"></textarea></label>
    <label><input class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white" placeholder="Здоровье" type="text" name="healt"></label>
    <label><input class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white" placeholder="Станится?" type="text" name="stunnable"></label>
    <button class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white">Изменить</button>
</form>