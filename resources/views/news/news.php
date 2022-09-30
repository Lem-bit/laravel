<?php include_once (__DIR__ . '/../menu/menu.php'); ?>
    <br><br>

<br><br>

<?php foreach ($news as $item): ?>
    <a href="/categories/<?=$item['id_category']?>/news/<?=$item['id']?>"><?=$item['title']?></a><br><br>
<?php endforeach;?>

