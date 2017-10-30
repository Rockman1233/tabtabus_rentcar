<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */
include($_SERVER['DOCUMENT_ROOT'].'/models/Car.php');
class CarController {


    public function actionIndex()
    {
        $NewCar = new Car;
        require $_SERVER['DOCUMENT_ROOT'].'/views/indexAuto.php';

        foreach ($_POST as $var => $value) {
            $NewCar->__set($var, $value);
        }
        $NewCar->safeCar();
        print_r($NewCar);



    }
    public function actionView($category, $id) {

        require_once $_SERVER['DOCUMENT_ROOT'].'/views/index.php';

    }

}
