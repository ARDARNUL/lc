<ol>
<?php
    $deleteMoon = app() -> route -> getUrl('/deleteMoons');
    $redactMoon = app() -> route -> getUrl('/redactMoon');

    foreach ($Moons as $Moons) {
    $tier = $Moons->tier["title"];
    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p>Название Луны: $Moons[name]</p><br>";
    echo "<p>Описание: $Moons[description]</p> <br>";
    echo "<p>Сложность луны:$tier </p> <br>";
    echo "<p>Цена планеты: $Moons[cost]</p> <br>";
    echo "<p>Возможные погодные условия: $Moons[viable_weather]</p><br>";

    echo "<form method=\"DELETE\" action=\"$deleteMoon\" class=\" w-max bg-gray-400 rounded-lg text-white p-1 m-2\">
        <input type=\"hidden\" name=\"id\" value=\"$Moons[id]\">
        <button>Удалить Информацию</button>
        </form>";

    echo "<form method=\"GET\" action=\"$redactMoon\" class=\" w-max bg-gray-600 rounded-lg text-white p-1 m-1\">
        <input name=\"csrf_token\" type=\"hidden\" value=\"<?= app()->auth::generateCSRF() ?>\"/>
        <input type=\"hidden\" name=\"id\" value=\"$Moons[id]\">
        <button>Изменить Информацию</button>
        </form>";
        echo "</div>";
    }
?>
</ol>
