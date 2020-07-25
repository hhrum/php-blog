<form action="http://blog.local/admin/delete" method="post">
    <p>Вы уверены, что хотите удалить пост "<?= $post['title'] ?>"?</p>
    <button type="submit" name="id" value="<?= $post['id'] ?>">Удалить</button><a href="http://blog.local/admin">Отменить</a>
</form>