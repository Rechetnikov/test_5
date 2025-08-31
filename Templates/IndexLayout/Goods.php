<div class="row">
    <?php foreach ($goods as $good): ?>
        <div class="col-4">
            <div>
                <img src="/img/<?= $good['img']?>" style="max-width: 400px" alt="">
            </div>

            <?= $good['name']?> <br />
            <?= $good['price']?> руб. <br />

            <a href = "good/edit/<?= $good['id']?>">Редактировать</a><br />
            <a href = "good/delete/<?= $good['id']?>">Удалить</a><br />

        </div>
    <?php endforeach; ?>
</div><br /><br />

<div class="h-100 d-flex align-items-center justify-content-center">
    <a href="good/add">Добавить</a>
</div>
