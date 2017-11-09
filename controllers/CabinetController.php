<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */
include($_SERVER['DOCUMENT_ROOT'].'/models/Contract.php');
include($_SERVER['DOCUMENT_ROOT'].'/models/Car.php');
include('Controller.php');
include($_SERVER['DOCUMENT_ROOT'].'/models/User.php');
include($_SERVER['DOCUMENT_ROOT'].'/models/Driver.php');
include($_SERVER['DOCUMENT_ROOT'].'/models/Owner.php');

class CabinetController extends Controller {

    public $id;
    public $car;
    public $contract;

    public function actionIndex($render='indexCabinet.php')
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

    public function actionCreate(){

        $this->contract = new Contract();

        //values from: Car, Owner, Driver to: Contract

        //work with Car
        $this->contract->car = $_SESSION['car'];
        $carData = Car::findById($_SESSION['car']);
        $this->contract->__set('Car', $carData->car_id);

        //work with Owner
        $ownerID=$carData->car_owner;
        $ownerData = Owner::findById($ownerID);
        $this->contract->__set('first_name_owner', $ownerData->first_name);
        $this->contract->__set('last_name_owner', $ownerData->last_name);
        $this->contract->__set('address_owner', $ownerData->address);
        $this->contract->__set('telephone_owner', $ownerData->telephone);
        $this->contract->__set('email_owner', $ownerData->email);
        $this->contract->__set('passport_number_owner', $ownerData->passport_num);


        //work with Driver
        $driverID = $_SESSION['user'];
        $driverData = Driver::findById($driverID);
        $this->contract->__set('first_name_driver', $driverData->first_name);
        $this->contract->__set('last_name_driver', $driverData->last_name);
        $this->contract->__set('address_driver', $driverData->address);
        $this->contract->__set('telephone_driver', $driverData->telephone);
        $this->contract->__set('email_driver', $driverData->email);
        $this->contract->__set('passport_number_driver', $driverData->passport_num);


        echo '<pre>';
        print_r($this->contract);
        echo '</pre>';


        $this->view->addData("newContcar", $carData);
        $this->view->addData("newContown", $ownerData);
        $this->view->addData("newContdrv", $driverData);


        if($carData) {
            $this->view->addData('temp', 'newContract.php');
            $this->view->generateIn();
        }

    }

    //AJAX function catches var from productCard
    public function actionAddcar(){
         $_SESSION['car'] = $_POST['car'];
    }

    public function actionCreateConfirm(){
        $this->contract->__set('status', 0);
        $this->contract->saveContract();

        echo '<pre>';4
        print_r($this->contract);
        echo '</pre>';

    }

    public function actionShowall() {

        $oQuery = Object::$db->query('SELECT * FROM `Contract`');
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

    public function actionEdit() {
        $who = User::whoisUser(); //определяем Водителя или Владельца
        $userID = $_SESSION['user']; //Извлекаем айди из сесисс (после регистрации)
        $userMain = ($who=='Driver')? new Driver() :new Owner();
        $userData = $userMain::findById($userID);
        // достаем из результирующего массива автомобили и передаем на обработку в шаблон
        $this->view->addData("User", $userData);
        $this->view->addData("temp", 'cardUser.php');
        $this->view->generateIn();
            // проверяем параметры на наличие изменений если были изменены то вносим исправления
        foreach ($_POST as $par => $value) {
            if($value) {
                $userData->__set($par, $value);
            }
        }
        $userData->edit();

    }


}
