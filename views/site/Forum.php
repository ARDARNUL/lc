<a class="bg-gray-400 rounded-lg text-white p-1 "  href="<?= app()->route->getUrl('/addnew') ?>">Добавить Обсуждение</a>

<ol>
<?php
    
    foreach ($News as $News) {
    $username = $News -> user['login'] ?? 'Юзер удален';
    
    $newComments = $News->newComments;

    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p>$username</p><br>";
    echo "<p>$News[name]</p><br>";
    echo "<p>$News[description]</p> <br>";
    echo "<a class=\"bg-gray-400  rounded-lg text-blue-700 p-1\"  href=\"/comment?id=$News[id]\">Написать комментировать</a>";

    echo '<p class="text-xl flex flex-col">Комментарии</p>';
    foreach ($newComments as $newComment) {
        $comment = $newComment->comment;

        $login = $comment->user['login'] ?? 'Юзер удален';

        echo '<div class="border border-black bg-gray-600 rounded-lg text-white p-1 m-2">';
        echo "<p>Автор: $login</p><br>";
        echo "<p>$comment->content</p> <br>";
        echo "</div>";
    }

    echo "</p>";
    echo "</div>";
    }
?>
</ol>
