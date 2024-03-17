<h2 class=" flex w-max bg-gray-400 rounded-lg text-white p-1 m-2">Юзеры</h2>

<form action="" method="get" class=" flex w-max bg-gray-400 rounded-lg text-white p-1 m-2">
    <input class=" flex w-max bg-gray-400 rounded-lg text-white p-1 m-2" type="text" name="search">
    <button>Поиск</button>
</form>

<ol class=" w-max bg-gray-400 rounded-lg text-white p-1 m-2">
    <?php
    foreach ($Users as $User) {
        echo '<div class=\" flex w-max bg-gray-400 rounded-lg text-white p-1 m-2\"';
        echo '<li>';
        echo $User["login"];
        echo '</li>';
        echo '</div>';
    }
    ?>
</ol>