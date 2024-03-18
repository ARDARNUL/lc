    <?php
        $deleteUser = app() -> route -> getUrl('/deleteUser');
        $redactProfile = app() -> route -> getUrl('/redactProfile');

        echo "<div>";
        echo "<p class=\" flex w-max bg-gray-400 rounded-lg text-white p-1 m-2\">Login: $user[login]</p>";
        
        echo "<img class=\"w-max flex bg-gray-400 rounded-lg text-white p-1 m-2\" src=\"user[avatar]\" alt=\"avatar\" />";

        echo "<form method=\"DELETE\" action=\"$deleteUser\" class=\" w-max bg-gray-400 rounded-lg text-white p-1 m-2\">
        <input type=\"hidden\" name=\"id\" value=\"$user[id]\">
        <button>Удалить аккаунт</button>
        </form>";

        echo "<form method=\"GET\" action=\"$redactProfile\" class=\" w-max bg-gray-400 rounded-lg text-white p-1 m-1\">
        <input name=\"csrf_token\" type=\"hidden\" value=\"<?= app()->auth::generateCSRF() ?>\"/>
        <input type=\"hidden\" name=\"id\" value=\"$user[id]\">
        <button>Редактировать профиль</button>
        </form>";

        echo "</div>";
    ?>
