<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Contract.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Car.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/User.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Driver.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Owner.php');

class CabinetController extends Controller {

    public $id;
    public $car;
    public $contract;

    public function actionIndex($render='indexCabinet.php')
    {
        $this->view->addData('temp',"$render");
        $this->view->generate();

    }

    public function actionCreate(){

        //values from: Car, Owner, Driver to: Contract
        //work with Car
        $this->contract->car = $_SESSION['car'];
        if(!$_SESSION['car'])
        {
            echo 'Сначала выберите автомобиль';
            return false;
        }
        $carData = Car::findById($_SESSION['car']);

        //work with Owner
        $ownerID=$carData->car_owner;
        $ownerData = Owner::findById($ownerID);

        //work with Driver
        $driverID = $_SESSION['user'];
        $driverData = Driver::findById($driverID);
        $this->contract = new Contract(
            [
                'car' => $_SESSION['car'],
                'driver' => $driverID,
                'status' => $_POST['status']
            ]
        );
        if(isset($this->contract->status))
        {

            $this->contract->saveContract();
            echo 'Контракт сохранен';
        }
        //push data to temp
        $this->view->addData("newContcar", $carData);
        $this->view->addData("newContown", $ownerData);
        $this->view->addData("newContdrv", $driverData);
        //build temp
        $this->view->addData('temp', 'newContract.php');
        $this->view->generateIn();

    }

    //AJAX function catches var from productCard
    public function actionAddcar(){
         $_SESSION['car'] = $_POST['car'];
    }

    public function actionAccepting() {

        //get contract details for current Owner
        $aRes = Contract::showAllforOwner();
        //get information about current Owner
        //build temp
        foreach($aRes as $contArray) {
            //передаем машину в массив с контентом , затем вызываем ф-цию построение "карточки машины"
            $this->view->addData("CurrentCont", $contArray);
            $this->view->addData("temp", 'newContract.php');
            $this->view->generateIn();

            if(isset($_POST['status']))
            {
                $newCont = new Contract();
                $newCont->status = $_POST['status'];  //here we are checking changes in status
                $newCont->contract_id = $_POST['id'];
                $newCont->changeStatus();
                //сюда можно запилить уведомление на электронку
            }
        }
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
    public function actionWait() {
        $aRes = Contract::showAllforDriver();
        foreach($aRes as $contArray) {
            //передаем машину в массив с контентом , затем вызываем ф-цию построение "карточки машины"
            $this->view->addData("CurrentCont", $contArray);
            $this->view->addData("temp", 'newContract.php');
            $this->view->generateIn();
            /*
            if(isset($_POST['status']))
            {
                $newCont = new Contract();
                $newCont->status = $_POST['status'];  //here we are checking changes in status
                $newCont->contract_id = $_POST['id'];
                $newCont->changeStatus();
                //сюда можно запилить уведомление на электронку
            }
            */
        }
    }


}
