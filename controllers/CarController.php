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

        require $_SERVER['DOCUMENT_ROOT'].'/views/indexAuto.php';



    }
    public function actionSafe() {

        $NewCar = new Car;
        foreach ($_POST as $var => $value) {
            $NewCar->__set($var, $value);
        }
        echo '<pre>';
        print_r($NewCar);
        echo '</pre>';
        $NewCar->safeCar();

    }

}
