<div class="articles">
    <div class="title">
        <div class="title__seperator"></div>
        <div class="title__text"><?= $post['title'] ?></div>
        <div class="title__seperator"></div>
    </div>
    <div class="post">
        <div class="post__date">
            <div class="post__date-d"> <?= date("d", strtotime($post['date'])) ?> </div>
            <div class="post__date-m"> <?= date("M", strtotime($post['date'])) ?> </div>
            <div class="post__date-y"> <?= date("Y", strtotime($post['date'])) ?> </div>
        </div>
        <div class="post__context">
            <div class="post__content"> <?= $post['content'] ?> </div>
        </div>
    </div>
    <div class="post__seperator"></div>

</div>
