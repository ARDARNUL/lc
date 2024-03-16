<h2><?= $message ?? '' ?></h2>

<form class="flex flex-col" method="post">
    <label><input class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white" placeholder="Название луны" type="text" name="name"></label>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white w-96 h-96 p-1 placeholder-white" placeholder="Описание" type="text" name="description"></textarea></label>
    <label class=" bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white">Сложность планеты:
    <select class=" bg-gray-400 rounded-lg mt-2 text-white placeholder-white" name="tier_id">
        <option value="1">S+</option>
        <option value="2">S</option>
        <option value="3">A</option>
        <option value="4">B</option>
        <option value="5">C</option>
        <option value="6">D</option>
    </select>
    </label>
    <label><input class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white" placeholder="Цена" type="text" name="cost"></label>
    <label><input class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white" placeholder="Возможные погодные условия" type="text" name="viable_weather"></label>

    <button class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white">Создать</button>
</form>