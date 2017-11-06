<div class="container">
    <div class="row">
         <h4>В этом разделе вы можете ознакомится со списком автомобилей а
             так же предоставить информацию об автомобиле который хотите сдать в наем</h4>
<br>
<a type="button" href="car/showall" class="btn btn-default">Показать все авто</a>
<br>
<br>
<?php if(User::whoisUser() == 'Owner'): ?>
<a type="button" href="car/save" class="btn btn-default">Добавить авто</a>
<?php endif; ?>
</div>
</div>