<ol>
<?php
    
    foreach ($Monsters as $Monsters) {
    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<img src=\"Monster[img]\" alt=\"monstr\" />";
    echo "<p>Монстр: $Monsters[name]</p><br>";
    echo "<p>Описание: $Monsters[description]</p> <br>";
    echo "<p>Здоровье: $Monsters[healt]</p> <br>";
    echo "<p>Возможность застанить: $Monsters[stunnable]</p><br>";
    echo "</div>";
    }
?>
</ol>
