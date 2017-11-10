<div class="container">
    <div class="row">
         <h4>Вы находитесь в вашем личном кабинете,
             здесь вы можете ознакомиться с вашими текущими контрактами а так же
             редактировать личную инфмормацию</h4>

<br>
<?php if(User::whoisUser() == 'Driver'): ?>
<a type="button" href="cabinet/create" class="btn btn-default">Заключить новый контракт</a>
    <a type="button" href="cabinet/create" class="btn btn-default">Текущий контракт</контракт></a>
<?php endif; ?>

<?php if(User::whoisUser() == 'Owner'): ?>
<a type="button" href="cabinet/accepting" class="btn btn-default">Показать контракты</a>
<?php endif; ?>
<a type="button" href="cabinet/edit" class="btn btn-default">Редактирвоать личные данные</a>
</div>
</div>