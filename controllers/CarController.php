<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Car.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/User.php');

class CarController extends Controller {


    public function actionIndex($render='indexCar.php')
    {
        $this->view->addData('temp',"$render");
        $this->view->generate();

    }
    public function actionSave() {
        echo '<br>'.$_SESSION['user'];
        if($_SESSION['user']) {
            $this->view->addData('temp', 'saveAuto.php');
            $this->view->generateIn();
        }
    }

    public function actionSaveConfirm(){

        $NewCar = new Car;
        foreach ($_POST as $var => $value) {
            $NewCar->__set($var, $value);
        }
        $NewCar->__set('car_owner', $_SESSION['user']);
        echo '<pre>';
        print_r($NewCar);
        echo '</pre>';
        $NewCar->saveCar();


    }

    public function actionShowall() {
        $aRes = Car::Showall();
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
