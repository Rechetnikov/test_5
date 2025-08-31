<div class="col-6">
    <form action="/user/update" method="post" style="display: flex; flex-direction: column; gap: 1rem;">
        <input type="text" value="<?= $user['name'] ?>" name="name" placeholder="Имя">
        <input type="email" value="<?= $user['email'] ?>" name="email" placeholder="Электронная почта">
        <input type="password" value="<?= $user['password'] ?>" name="password" placeholder="Пароль">
        <input type="hidden" value="<?= $user['id'] ?>" name="id">

        <button>Сохранить</button>
    </form>
</div>