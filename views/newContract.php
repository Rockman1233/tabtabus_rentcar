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
        <td><?php echo $this->aData['newCont']->mark.' '.$this->aData['newCont']->model.'<br> Гос.номер: '.$this->aData['newCont']->state_num ?></td>
        <td>Doe</td>
        <td>john@example.com</td>
          <td>John</td>
          <td>Doe</td>
          <td>John</td>
          <td>Doe</td>
          <td>John</td>
          <td>Doe</td>
          <td>John</td>
          <td>Doe</td>
      </tr>

    </tbody>
  </table>


</body>
</html>

