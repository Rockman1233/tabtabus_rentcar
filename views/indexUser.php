<div class="container">
    <div class="row">
        <form action="<?php echo 'user/login'?>" method="post">
            <div class="form">
                <input type="text" class="form-control-static" name="login" placeholder="Логин">
                <input type="text" class="form-control-static" name="pass" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-default">Войти</button>
        </form>
        <br>
        <a type="button" href="user/logout" class="btn btn-default">Выйти</a>
        <?php if(!$_SESSION['user']): ?>
        <a type="button" href="/owner" class="btn btn-default">Регистрация владельца</a>
        <a type="button" href="/driver" class="btn btn-default">Регистрация водителя</a>
        <?php endif; ?>
    </div>
</div>