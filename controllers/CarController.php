<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */
include($_SERVER['DOCUMENT_ROOT'].'/models/Car.php');
include('Controller.php');

class CarController extends Controller {


    public function actionIndex()
    {
        $this->view->generate('indexAuto.php', 'template.php');



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

    public function actionShowall() {

        $oQuery = Object::$db->query('SELECT * FROM `Car`');
        $aRes = $oQuery->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
        print_r($aRes);
        echo '</pre>';
    }

}
