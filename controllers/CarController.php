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
    //AJAX function catches var from productCard

    public function actionEdit() {
        //operation of uploading file (from php.net)
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foto/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Ошибка загрузки файла!\n";
        }
        $car = Car::findById($_SESSION['car']);
        /*echo '<pre>';
        print_r($car);
        echo '</pre>';*/
        if(User::whoisUser()=='Owner') {
            $this->view->addData('temp', 'cardCar.php');
            $this->view->addData('Car', $car);
            $this->view->generateIn();
        }
        foreach ($_POST as $par => $value) {
            if($value) {
                $car->__set($par, $value);
            }
        }
        $car->__set('foto', $_FILES['userfile']['name']);
        $car->edit();
    }

    public function actionSaveConfirm(){
        //operation of uploading file (from php.net)
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foto/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        echo '<pre>';
        echo $_FILES['userfile']['name'];
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Ошибка загрузки файла!\n";
        }
        $NewCar = new Car;
        foreach ($_POST as $var => $value) {
            echo '<br>';
            echo $var.' '.$value;
            $NewCar->__set($var, $value);
        }
        $NewCar->__set('car_owner', $_SESSION['user']);
        $NewCar->__set('foto', $_FILES['userfile']['name']);
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
