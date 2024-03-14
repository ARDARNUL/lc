<ol>
<?php
    
    foreach ($Moons as $Moons) {
    $tier = $Moons->tier["title"];
    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p>Название Луны: $Moons[name]</p><br>";
    echo "<p>Описание: $Moons[description]</p> <br>";
    echo "<p>Сложность луны:$tier </p> <br>";
    echo "<p>Цена планеты: $Moons[cost]</p> <br>";
    echo "<p>Возможные погодные условия: $Moons[viable_weather]</p><br>";
    echo "</div>";
    }
?>
</ol>
