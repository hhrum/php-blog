
<?php foreach ($posts as $post): ?>
<div>
    <p> <strong><?= $post['title'] ?></strong> </p>
    <a href="<?= "http://blog.local/admin/post/{$post['id']}" ?>">Читать</a>
    <a href="<?= "http://blog.local/admin/edit_panel/{$post['id']}" ?>">Изменить</a>
    <a href="<?= "http://blog.local/admin/delete_panel/{$post['id']}" ?>">Удалить</a>
</div>
<br>
<?php endforeach ?>