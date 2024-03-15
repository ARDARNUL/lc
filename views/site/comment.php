<h2><?= $message ?? '' ?></h2>

<form class="flex flex-col" method="post">
    <input type="hidden" name="news_id" value="<?= $news_id ?>"/>
    <label><textarea class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 w-96 h-96 placeholder-white" placeholder="Комментарий" type="text" name="content"></textarea></label>
    <button class="flex bg-gray-400 rounded-lg mt-2 text-white p-1 placeholder-white">Опубликовать</button>
</form>