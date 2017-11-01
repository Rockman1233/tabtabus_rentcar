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
        $this->view->addData('temp','indexAuto.php');
        $this->view->generate();


    }
    public function actionSafe() {

        $this->view->addData('temp','safeAuto.php');
        $this->view->generateIn();

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
        $this->view->addData('temp', 'cardProduct.php');
        foreach($aRes as $asd) {
            $this->view->generateIn();
            foreach($asd as $asdf) {
                $i = 1;
                $this->view->addData($i,$asdf);
                $i=+1;
            }
        }

        echo '<pre>';
        print_r($aRes);
        echo '</pre>';
    }

}
