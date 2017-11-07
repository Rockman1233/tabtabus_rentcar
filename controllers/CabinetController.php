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
class CabinetController extends Controller {

    public $id;
    public $car;

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

        $NewCont = new Contract();
        foreach ($_POST as $var => $value) {
            $NewCont->__set($var, $value);
        }
        $NewCont->car = $_SESSION['car'];
        $res = Car::findById($_SESSION['car']);


        /*echo '<pre>';
        print_r($res);
        echo '</pre>';*/
        //$NewCont->saveContract();
        $this->view->addData("newCont", $res);

        if($res) {
            $this->view->addData('temp', 'newContract.php');
            $this->view->generateIn();
        }


    }

    public function actionAddcar(){
         $_SESSION['car'] = $_POST['car'];
    }

    public function actionSaveConfirm(){

        $NewCar = new Car;
        foreach ($_POST as $var => $value) {
            $NewCar->__set($var, $value);
        }

        /*echo '<pre>';
        print_r($NewCar);
        echo '</pre>';*/
        $NewCar->saveCar();


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

}
