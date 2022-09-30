<?php include_once (__DIR__ . '/../menu/menu.php'); ?>
<br>

<a href="<?=route('cat_add_news') ?>">Добавить новость</a><br><br>

<?php foreach ($categories as $item): ?>
    <a href="/categories/news/<?=$item['id']?>"><?=$item['title']?></a><br>
<?php endforeach;?>
