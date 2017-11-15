<div class="container">
    <div class="row">
<form action="<?php echo 'saveconfirm'?>" method="post" enctype="multipart/form-data">
    <div class="form">
        <input type="text" class="form-control-static" name="mark" placeholder="Марка">
        <input type="text" class="form-control-static" name="model" placeholder="Модель">
        <input type="text" class="form-control-static" name="year" placeholder="Год">
        <input type="text" class="form-control-static" name="state_num" placeholder="Гос.номер">
        <input type="text" class="form-control-static" name="mileage" placeholder="Пробег">
        <input type="text" class="form-control-static" name="colour" placeholder="Цвет">
        <input type="text" class="form-control-static" name="consumption" placeholder="Расход">
        <input type="text" class="form-control-static" name="cost_less_30_inc" placeholder="Соимость до 30 сут (включ)">
        <input type="text" class="form-control-static" name="cost_more_31" placeholder="Стоимость более 31">
        <input name="userfile" type="file" />
    </div>
<button type="submit" class="btn btn-default">Добавить авто</button>
</form>
<br>
</div>
</div>