<a class="bg-gray-400 rounded-lg text-white p-1 "  href="<?= app()->route->getUrl('/addnew') ?>">Добавить Обсуждение</a>

<ol>
<?php
    $deleteNews = app() -> route -> getUrl('/deleteNews');
    foreach ($News as $News) {
    $username = $News -> user['login'] ?? 'Юзер удален';
    $user_id = $News -> user['id'];
    
    $newComments = $News->newComments;

    echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
    echo "<p class=\" bg-gray-600 rounded-lg p-1 m-1\">login: $username</p><br>";
    echo "<p class=\" bg-gray-600 rounded-lg p-1 m-1\">Заголовок: $News[name]</p><br>";
    echo "<p class=\" bg-gray-600 rounded-lg p-1 m-1\">Описание: $News[description]</p> <br>";

    if($user_id == $user_id){
    echo "<form method=\"DELETE\" action=\"$deleteNews\" class=\" w-max bg-gray-600 rounded-lg text-white p-1 m-2\">
    <input type=\"hidden\" name=\"id\" value=\"$News[id]\">
    <button>Удалить Обсуждение</button>
    </form>";
    }
        
    echo "<a class=\"bg-gray-600 text-white rounded-lg text-blue-700 p-1\"  href=\"/comment?id=$News[id]\">Написать комментировать</a>";

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
