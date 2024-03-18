<h2><?= $message ?? '' ?></h2>

<ol>
    <?php
    $deleteMonster = app() -> route -> getUrl('/deleteMonster');
    $redactMonster = app() -> route -> getUrl('/redactMonster');
    
    
    
    foreach ($Monsters as $Monsters) {
        
        echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
        echo "<img src=\"$Monsters[avatar]\" alt=\"monstr\" />";
        echo "<p>Монстр: $Monsters[name]</p><br>";
        echo "<p>Описание: $Monsters[description]</p> <br>";
        echo "<p>Здоровье: $Monsters[healt]</p> <br>";
        echo "<p>Возможность застанить: $Monsters[stunnable]</p><br>";

        echo "<form method=\"DELETE\" action=\"$deleteMonster\" class=\" w-max bg-gray-600 rounded-lg text-white p-1 m-1\">
        <input name=\"csrf_token\" type=\"hidden\" value=\"<?= app()->auth::generateCSRF() ?>\"/>
        <input type=\"hidden\" name=\"id\" value=\"$Monsters[id]\">
        <button>Удалить Информацию</button>
        </form>";

        echo "<form method=\"GET\" action=\"$redactMonster\" class=\" w-max bg-gray-600 rounded-lg text-white p-1 m-1\">
        <input name=\"csrf_token\" type=\"hidden\" value=\"<?= app()->auth::generateCSRF() ?>\"/>
        <input type=\"hidden\" name=\"id\" value=\"$Monsters[id]\">
        <button>Изменить Информацию</button>
        </form>";

        echo "</div>";
    }
    ?>
</ol>