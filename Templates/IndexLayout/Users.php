<div class="col-4">
    <?php foreach ($users as $user): ?>
        <?=$user['name']?> <?=$user['email']?>
        <a href="user/edit/<?=$user['id']?>">Редактировать</a>
        <a href="user/delete/<?=$user['id']?>">Удалить</a>
        <br />
    <?php endforeach; ?>
</div>