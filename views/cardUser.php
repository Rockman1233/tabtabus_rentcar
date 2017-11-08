<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $this->aData['User']->first_name.' '.$this->aData['User']->last_name.' ID:';
                    echo (User::whoisUser() == 'Driver')?$this->aData['User']->driver_id:$this->aData['User']->owner_id ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="" class="img-circle img-responsive"> </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <form action="edit" method="post">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Пароль:</td>
                                    <td><input type="text" class="form-control-static" name="pass" placeholder="<?php echo $this->aData['User']->pass ?>"></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Телефон:</td>
                                    <td><input type="text" class="form-control-static" name="telephone" placeholder="<?php echo $this->aData['User']->telephone ?>"></td>
                                </tr>
                                <tr>
                                    <td>Адресс:</td>
                                    <td><input type="text" class="form-control-static" name="address" placeholder="<?php echo $this->aData['User']->address ?>"></td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td><input type="text" class="form-control-static" name="email" placeholder="<?php echo $this->aData['User']->email ?>"></td>
                                </tr>
                                <tr>
                                    <td>Номер паспорта:</td>
                                    <td><input type="text" class="form-control-static" name="<?php if(User::whoisUser() == 'Driver'): ?>passport_num_d<? else:?>passport_num<? endif;?>" placeholder="<?php echo (isset($this->aData['User']->drive_license))?$this->aData['User']->passport_num_d:$this->aData['User']->passport_num ?>"></td>
                                </tr>
                                <?php if(User::whoisUser() == 'Driver'): ?>
                                <tr>
                                    <td>Номер вод.удостоверения:</td>
                                    <td><input type="text" class="form-control-static" name="drive_license" placeholder="<?php echo $this->aData['User']->drive_license ?>"></td>
                                </tr>
                                <tr>
                                    <td>Стаж вождения:</td>
                                    <td><input type="text" class="form-control-static" name="experience" placeholder="<?php echo $this->aData['User']->experience ?>"></td>
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <td>Мои автомобили:</td>
                                    <td><a href="../car/showall">Нажми</a></td>
                                </tr>
                                <?php endif; ?>


                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-default">Редактировать</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>