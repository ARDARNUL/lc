<ol>
<?php
    foreach ($Items as $Items) {
    $kind = $Items->kind["title"];
    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p>Предмет: $Items[name]</p><br>";
    echo "<p>Описание: $Items[description]</p> <br>";
    echo "<p>Тип:$kind </p> <br>";
    echo "<p>Цена: $Items[price]</p> <br>";
    echo "</div>";
    }
?>
</ol>
