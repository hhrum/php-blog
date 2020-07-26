<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Добро пожаловать, хозяин</h1>

    <hr>
    <ul>
        <li> <a href="http://blog.local/admin">Список постов</a> </li>
        <li> <a href="http://blog.local/admin/add_panel">Создать</a> </li>
        <li> <a href="http://blog.local/admin/logout">Выйти</a> </li>
    </ul>
    <hr>

    <?= $content ?>
</body>
</html>