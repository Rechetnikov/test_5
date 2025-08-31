<div class="col-6">
    <form action="/../good/update" method="post" style="display: flex; flex-direction: column; gap: 1rem;">
        <input type="text" value="<?= $good['name'] ?>" name="name" placeholder="Наименование">
        <input type="text" value="<?= $good['price'] ?>" name="price" placeholder="Цена">
        <input type="text" value="<?= $good['img'] ?>" name="img" placeholder="Картинка">
        <input type="hidden" value="<?= $good['id'] ?>" name="id">

        <button type="submit">Сохранить</button>
    </form>
</div>