<ol>
<?php
    $deleteItem = app() -> route -> getUrl('/deleteItems');
    $redactItem = app() -> route -> getUrl('/redactItem');

    foreach ($Items as $Items) {
    $kind = $Items->kind["title"];
    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p>Предмет: $Items[name]</p><br>";
    echo "<p>Описание: $Items[description]</p> <br>";
    echo "<p>Тип:$kind </p> <br>";
    echo "<p>Цена: $Items[price]</p> <br>";

    echo "<form method=\"DELETE\" action=\"$deleteItem\" class=\" w-max bg-gray-600 rounded-lg text-white p-1 m-2\">
        <input type=\"hidden\" name=\"id\" value=\"$Items[id]\">
        <button>Удалить Информацию</button>
        </form>";

    echo "<form method=\"GET\" action=\"$redactItem\" class=\" w-max bg-gray-600 rounded-lg text-white p-1 m-1\">
        <input name=\"csrf_token\" type=\"hidden\" value=\"<?= app()->auth::generateCSRF() ?>\"/>
        <input type=\"hidden\" name=\"id\" value=\"$Items[id]\">
        <button>Изменить Информацию</button>
        </form>";
        echo "</div>";
    }
?>
</ol>
