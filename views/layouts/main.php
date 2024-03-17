<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>lethal Company</title>
</head>

<body class="flex flex-col bg-gray-600">
    <header>
    <nav class="m-2">
            <div class="flex justify-center">
            <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/Monster') ?>">Монстры</a>

            <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/Moons') ?>">Луны</a>

            <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/Item') ?>">Предметы</a>

            <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/User') ?>">Найти пользователя</a>

            <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/Forum') ?>">Обсуждения</a>
            </div>
        </nav>
        <div class="flex justify-end m-2">
            <?php
            if (!app()->auth::check()) :
            ?>
                <div class="flex justify-center m-2">
                <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
                <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
                </div>
            <?php
            else :
            ?>
                <?php
                if (app()->auth::user()->isAdmin()) :
                ?>  <div class="flex justify-center ">
                    <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/createMonster') ?>">Добавить монстра</a>
                    <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/createMoons') ?>">Добавить луну</a>
                    <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/createItems') ?>">Добавить предмет</a>
                    </div>
                <?php
                endif;
                ?>
                <div class="flex justify-center ">
                <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/ticket') ?>">Написать Тикет</a>
                <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/allTickets') ?>">Просмотр Тикетов</a>
                <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/profile') ?>">Профиль (<?= app()->auth::user()->login ?>)
                <a class="flex justify-end gap-4 bg-gray-400 text-gray-200 rounded-lg m-2 p-2" href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
                </div>
                <?php
            endif;
                ?>
        </div>
    </header>
    <main>
        <?= $content ?? '' ?>
    </main>
</body>

</html>