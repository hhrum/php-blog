<form action="<?= "http://blog.local/admin/edit" ?>" method="post">
    <p>Заголовок<br>
    <input type="text" name="title" value="<?= $post['title'] ?>">
    </p>
    <p>Контент<br>
    <textarea name="content"><?= $post['content'] ?></textarea>
    </p>
    <button type="submit" name="id" value="<?= $post['id'] ?>">Изменить</button>
</form>