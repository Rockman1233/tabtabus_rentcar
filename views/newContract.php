<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
</head>
<body>

  <h2>Ваш заказ</h2>
  <p>Внимательно ознакомьтесь с контрактом: </p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Автомобиль</th>
        <th>Имя владельца</th>
        <th>Фамилия владельца</th>
        <th>Телефон владельца</th>
        <th>Номер паспорта владельца</th>
        <th>Адресс владельца</th>
          <th>Имя арендатора</th>
          <th>Фамилия арендатора</th>
          <th>Телефон арендатора</th>
          <th>Номер паспорта арендатора</th>
          <th>Адресс арендатора</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $this->aData['newContcar']->mark.' '.$this->aData['newContcar']->model.'<br> Гос.номер: '.$this->aData['newContcar']->state_num ?></td>
        <td><?php echo $this->aData['newContown']->first_name ?></td>
        <td><?php echo $this->aData['newContown']->last_name ?></td>
        <td><?php echo $this->aData['newContown']->telephone ?></td>
        <td><?php echo $this->aData['newContown']->passport_num ?></td>
        <td><?php echo $this->aData['newContown']->address ?></td>
        <td><?php echo $this->aData['newContdrv']->first_name ?></td>
        <td><?php echo $this->aData['newContdrv']->last_name ?></td>
        <td><?php echo $this->aData['newContdrv']->telephone ?></td>
        <td><?php echo $this->aData['newContdrv']->passport_num ?></td>
        <td><?php echo $this->aData['newContdrv']->address ?></td>
      </tr>

    </tbody>
  </table>
  <form action="" method="post">
      <input type="hidden" name="status" value="0">
      <button type="submit" class="btn btn-default">Подтвердить</button>
  </form>

</body>
</html>

