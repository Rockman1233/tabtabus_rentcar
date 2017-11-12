<div class="container">
    <?php if(!($_SERVER['REQUEST_URI'] == "/cabinet/create")): ?>
<h2>Новая заявка<?php if($this->aData['CurrentCont']['status']==0): ?><span class="glyphicon glyphicon-hourglass fa-1x"> Заявка рассматривается<?php endif; ?>
    <?php if($this->aData['CurrentCont']['status']==1): ?><span class="glyphicon glyphicon-ok fa-1x"> Заявка одобрена<?php endif; ?>
    <?php if($this->aData['CurrentCont']['status']==2): ?><span class="glyphicon glyphicon-ban-circle fa-1x"> Заявка отклонена<?php endif; ?></h2>
    <?php endif; ?>
    <h2>Ваш заказ</h2>
  <p>Внимательно ознакомьтесь с контрактом: </p>

  <table class="table table-bordered">
    <thead>

    <?php if(User::whoisUser()=='Owner'):?>
      <tr>
        <th>Автомобиль</th>
          <th>Имя арендатора</th>
          <th>Фамилия арендатора</th>
          <th>Телефон арендатора</th>
          <th>Номер паспорта арендатора</th>
          <th>Адресс арендатора</th>
          <th>Email</th>
      </tr>
    <?else:?>
        <th>Автомобиль</th>
        <th>Имя владельца</th>
        <th>Фамилия владельца</th>
        <th>Телефон владельца</th>
        <th>Номер паспорта владельца</th>
        <th>Адресс владельца</th>
        <th>Email</th>
    <? endif;?>
    </thead>
    <tbody>
      <?php if((User::whoisUser()=='Driver')&&(!isset($this->aData['CurrentCont']['contract_id']))):?>
          <!-- if contract is new -->
      <tr>
        <td><?php echo $this->aData['newContcar']->mark.' '.$this->aData['newContcar']->model.'<br> Гос.номер: '.$this->aData['newContcar']->state_num ?></td>
        <td><?php echo $this->aData['newContown']->first_name ?></td>
        <td><?php echo $this->aData['newContown']->last_name ?></td>
        <td><?php echo $this->aData['newContown']->telephone ?></td>
        <td><?php echo $this->aData['newContown']->passport_num ?></td>
        <td><?php echo $this->aData['newContown']->address ?></td>
        <td><?php echo $this->aData['newContown']->email ?></td>
      </tr>
      <? else: ?>
          <!-- if  -->
          <td><?php echo $this->aData['CurrentCont']['mark'].' '.$this->aData['CurrentCont']['model'].'<br> Гос.номер: '.$this->aData['CurrentCont']['state_num'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['first_name'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['last_name'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['telephone'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['passport_num'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['address'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['email'] ?></td>
      <?php endif; ?>
      <?php if(User::whoisUser()=='Owner'):?>
          <td><?php echo $this->aData['CurrentCont']['mark'].' '.$this->aData['CurrentCont']['model'].'<br> Гос.номер: '.$this->aData['CurrentCont']['state_num'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['first_name'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['last_name'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['telephone'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['passport_num'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['address'] ?></td>
          <td><?php echo $this->aData['CurrentCont']['email'] ?></td>
      <?php endif; ?>

    </tbody>

  </table>
  <?php if(User::whoisUser()=='Owner'):?>
  <form action="" method="post">
      <input type="hidden" name="status" value="1" >
      <input type="hidden" name="id" value="<? echo $this->aData['CurrentCont']['contract_id'] ?>">
      <button type="submit" class="btn btn-default">Подтвердить</button>
  </form>
  <form action="" method="post">
      <input type="hidden" name="status" value="2">
      <input type="hidden" name="id" value="<? echo $this->aData['CurrentCont']['contract_id'] ?>">
      <button type="submit" class="btn btn-default">Отклонить</button>
  </form>
  <?php endif; ?>
  <?php if((User::whoisUser()=='Driver')&&(!isset($this->aData['CurrentCont']['contract_id']))): ?>
  <form action="" method="post">
      <input type="hidden" name="status" value="0">
      <button type="submit" class="btn btn-default">Отправить на рассмотрение</button>
  </form>
  <?php endif; ?>

</div>
<? echo '<br>' ?>

