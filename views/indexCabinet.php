<div class="container">
    <div class="row">
         <h4>Вы находитесь в вашем личном кабинете,
             здесь вы можете ознакомиться с вашими текущими контрактами а так же
             редактировать личную инфмормацию</h4>

<br>
<?php if(User::whoisUser() == 'Driver'): ?>
<a type="button" href="cabinet/create" class="btn btn-default">Заключить новый контракт</a>
<?php endif; ?>

<a type="button" href="cabinet/current" class="btn btn-default">Показать текущий контракт</a>
<?php if(User::whoisUser() == 'Owner'): ?>
<a type="button" href="cabinet/showall" class="btn btn-default">Показать контракты</a>
<?php endif; ?>
<a type="button" href="cabinet/edit" class="btn btn-default">Редактирвоать личные данные</a>
</div>
</div>