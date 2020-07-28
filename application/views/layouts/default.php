<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://blog.local/public/style/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <div class="header main-block">
        <div class="header__logo">
            <p>Тупа блог</p>
        </div>
        <ul class="navbar">
            <li class="navbar__item navbar__item_selected">Главная</li>
            <li class="navbar__item">IT</li>
            <li class="navbar__item">Философия</li>
            <li class="navbar__item">Образ жизни</li>
        </ul>   
    </div>

    <div class="content main-block">
        
        <?= $content ?>

        <div class="topics">
            <div class="title title_nav">
                <div class="title__text">Категории</div>
            </div>
            <ul class="categories">
                <li class="category">IT</li>
                <li class="category">Философия</li>
                <li class="category">Образ жизни</li>
            </ul>
        </div>
    </div>
</body>
</html>