<h2><?= $message ?? '' ?></h2>

<form class="flex flex-col" method="post">
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 w-96 h-96 placeholder-white" placeholder="Название" type="text" name="name"></textarea></label>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 w-96 h-96 placeholder-white" placeholder="Описание" type="text" name="description"></textarea></label>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 w-96 h-96 placeholder-white" placeholder="Здоровье" type="text" name="healt"></textarea></label>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 w-96 h-96 placeholder-white" placeholder="Станится?" type="text" name="stunnable"></textarea></label>

    <button class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white">Создать</button>
</form>