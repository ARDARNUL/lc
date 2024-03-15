<a class="bg-gray-400  rounded-lg text-white p-1"  href="<?= app()->route->getUrl('/addnew') ?>">Добавить Обсуждение</a>

<ol>
<?php
    
    foreach ($News as $News) {
    $user = $News -> user;
    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p>$user[login]</p><br>";
    echo "<p>$News[name]</p><br>";
    echo "<p>$News[description]</p> <br>";
    echo "</div>";
    }
?>
</ol>
