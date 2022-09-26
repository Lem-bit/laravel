<?php include_once route('main_menu'); ?>
    <br><br>

<?php foreach ($news as $item): ?>
    <a href="/news/<?=$item['id_category']?>/<?=$item['id']?>"><?=$item['title']?></a><br><br>
<?php endforeach;?>
