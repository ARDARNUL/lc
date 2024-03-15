    <?php
        $deleteUser = app() -> route -> getUrl('/deleteUser');

        echo "<p>Login: $user[login]</p>";
        
        echo "<img src=\"user[avatar]\" alt=\"avatar\" />";

        echo "<form method=\"DELETE\" action=\"$deleteUser\" class=\"bg-gray-400 rounded-lg text-white p-1 m-2\">
        <input type=\"hidden\" name=\"id\" value=\"$user[id]\">
        <button>Удалить аккаунт</button>
        </form>";
    ?>
