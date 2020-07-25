<div>
    <p> <strong><?= $post['title'] ?></strong> <i><?= $post['date'] ?></i> </p>
    <p> <?= $post['content'] ?> </p>
    <a href="<?= "http://blog.local/admin/edit_panel/{$post['id']}" ?>">Изменить</a>
    <a href="<?= "http://blog.local/admin/delete_panel/{$post['id']}" ?>">Удалить</a>
</div>