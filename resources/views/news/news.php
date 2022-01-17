<?php foreach ($newsList as $news): ?>

<div>
    <h2><a href="<?=route('news.show',['id'=>$news['id']])?>"><?=$news['title']?></a></h2>
    <p><?=$news['description']?></p>
    <p>by: <?=$news['author']?></p>
    <p>publication: <?=$news['date']?></p>
</div>
    <hr>

<?php endforeach;?>
