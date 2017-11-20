<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Аренда автомобилей</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- 1. Подключить CSS-файл Bootstrap 3 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!-- 2. Подключить CSS-файл библиотеки Bootstrap 3 DateTimePicker -->
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" />
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
                <li <?php if($_SERVER['REQUEST_URI']=='/car') echo "class=\"active\""?>><a href="/car" >Автомобили</a></li>
                <li <?php if($_SERVER['REQUEST_URI']=='/user') echo "class=\"active\""?>><a href="/user">Войти</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                <li <?php if($_SERVER['REQUEST_URI']=='/cabinet') echo "class=\"active\""?>><a href="/cabinet"><?php if($_SESSION['user'] >= 10000): ?>Личный кабинет арендодателя<? else: ?>Личный кабинет водителя<?php endif; ?></a></li>
                <?php endif; ?>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <?php include($this->aData['temp']); ?>
    </div>
</div>


<div id="footer">
    <div class="container">
        <div class="row">
        <p class="muted credit">Andreykin RentaCar <a href="#">Жмяк</a> и <a href="#">Жмяк-жмяк</a>.</p>
        </div>
    </div>
</div>

<!-- 3. Подключить библиотеку jQuery -->
<script src="../../js/jquery-3.2.1.min.js"></script>
<!-- 4. Подключить библиотеку moment -->
<script src="../../js/moment-with-locales.min.js"></script>
<!-- 5. Подключить js-файл фреймворка Bootstrap 3 -->
<script src="../../js/bootstrap.min.js"></script>
<!-- 6. Подключить js-файл библиотеки Bootstrap 3 DateTimePicker -->
<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<!-- ajax (add car to contract)-->
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-add-to-cart').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '../../cabinet/addcar',
                type: 'POST',
                data: {'car': id},
                success: function (result) {
                    alert("Машина добавлена");
                }
            });

        })
    })
</script>

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            locale: 'ru',
            format: 'YYYY-MM-DD',
            minDate: Date()
        });
    });
</script>
<script>
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'ru',
            format: 'YYYY-MM-DD',
            minDate: Date()
        });
    });
</script>


</body>
</html>