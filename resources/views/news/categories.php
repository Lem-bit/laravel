<?php include_once route('main_menu'); ?>
<br>

<?php foreach ($categories as $item): ?>
    <a href="/categories/<?=$item['id']?>"><?=$item['title']?></a><br>
<?php endforeach;?>
