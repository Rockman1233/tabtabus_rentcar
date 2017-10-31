<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Аренда автомобиля</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Andreykin Rentacar</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Автомобиль</a></li>
                <li><a href="#">Владелец</a></li>
                <li><a href="#">Водитель</a></li>

            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<form action="<?php echo 'car/safe'?>" method="post">
    <div class="form">
        <input type="text" class="form-control-static" name="mark" placeholder="Марка">
        <input type="text" class="form-control-static" name="model" placeholder="Модель">
        <input type="text" class="form-control-static" name="year" placeholder="Год">
        <input type="text" class="form-control-static" name="state_num" placeholder="Гос.номер">
        <input type="text" class="form-control-static" name="mileage" placeholder="Пробег">
        <input type="text" class="form-control-static" name="colour" placeholder="Цвет">
        <input type="text" class="form-control-static" name="consumption" placeholder="Расход">
        <input type="text" class="form-control-static" name="cost_less_30" placeholder="Соимость до 30 сут (включ)">
        <input type="text" class="form-control-static" name="cost_more_31" placeholder="Стоимость более 31">
        <input type="text" class="form-control-static" name="car_owner" placeholder="Владелец">

    </div>
<button type="submit" class="btn btn-default">Добавить авто</button>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>