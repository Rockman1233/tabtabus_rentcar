
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default  panel--styled">
                <div class="panel-body">
                    <div class="col-md-12 panelTop">

                        <div class="col-md-4">
                            <img class="img-responsive" src="http://placehold.it/350x350" alt=""/>
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo $value['mark'].' '.$value['model'] ?></h2>
                            <p>Краткое описание автомобиля</p>
                            <ul>
                                <li>Год выпуска - <?php echo $value['year']?></li>
                                <li>Пробег - <?php echo $value['mileage']?></li>
                                <li>Цвет - <?php echo $value['colour']?></li>
                                <li>Расход топлива (л/100км) - <?php echo $value['consumption']?></li>

                            </ul>
                            Цена за сутки
                        </div>
                    </div>

                    <div class="col-md-12 panelBottom">
                        <div class="col-md-4 text-center">
                            <a class="btn btn-lg btn-add-to-cart" data-id="<?php echo $value['car_id'] ?>"><span class="glyphicon glyphicon-shopping-cart">Add</span></a>
                        </div>
                        <div class="col-md-4 text-right">
                            <h5>до 30 суток (вкл) -  <span class="itemPrice"><?php echo $value['cost_less_30_inc']?>$</span></span></h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <h5>более 31 дня - <span class="itemPrice"><?php echo $value['cost_more_31']?>$</span></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="stars">
                                <div id="stars" class="starrr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>