
<form action="" method="get" class="flex flex-col w-max bg-gray-400 rounded-lg text-white p-1 m-2">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <h2 class="w-max bg-gray-400 rounded-lg text-white p-1 m-2">Юзеры
    <input class="w-max bg-gray-600 rounded-lg text-white p-1 m-2" type="text" name="search">
    </h2>
    <button class="bg-gray-600 rounded-lg text-white p-1 m-1">Поиск</button>
</form>

<ol class="w-max bg-gray-400 rounded-lg text-white p-1 m-2">
    <?php
    foreach ($User as $User) {
        echo '<div class=\" flex w-max bg-gray-400 rounded-lg text-white p-1 m-2\"';
        echo '<li>';
        echo "<p>login: $User[login]</p>";
        echo '</li>';
        echo '</div>';
    }
    ?>
</ol>