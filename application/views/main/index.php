
<h4>Последние посты</h4>

<?php foreach ($posts as $post): ?>
<div>
    <p> <strong><?= $post['title'] ?></strong> <i><?= $post['date'] ?></i> </p>
    <p> <?= $post['content'] ?> </p>
    <a href="<?= "http://blog.local/main/post/{$post['id']}" ?>">Читать</a>
</div>
<br>
<?php endforeach ?>