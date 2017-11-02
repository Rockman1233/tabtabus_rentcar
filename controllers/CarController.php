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


    public function actionIndex($render='indexCar.php')
    {

        $this->view->addData('temp',"$render");
        $this->view->generate();

    }
    public function actionSafe() {

        $this->view->addData('temp','safeAuto.php');
        $this->view->generateIn();



    }

    public function actionSafeConfirm(){

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

        // достаем из результирующего массива автомобили и передаем на обработку в шаблон
        $this->view->addData("temp", 'cardProduct.php');
        foreach($aRes as $carArray) {
            //передаем машину в массив с контентом , затем вызываем ф-цию построение "карточки машины"
            $this->view->addData("CurrentCar", $carArray);
            $this->view->generateIn();

        }

        /*echo '<pre>';
        print_r($aRes);
        echo '</pre>';*/
    }

}
