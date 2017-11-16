<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Owner.php');
class OwnerController extends Controller {


    public function actionIndex($render='indexOwner.php')
    {
        $this->view->addData('temp',"$render");
        $this->view->generate();

    }
    public function actionSave() {

        $this->view->addData('temp','saveOwner.php');
        $this->view->generateIn();
    }

    public function actionSaveConfirm(){

        $NewOwner = new Owner();
        foreach ($_POST as $var => $value) {
            if($var=='pass'){
                $value = password_hash("$value", PASSWORD_DEFAULT);
            }
            $NewOwner->__set($var, $value);
        }

        echo '<pre>';
        print_r($NewOwner);
        echo '</pre>';
        $NewOwner->saveOwner();


    }

    public function actionShowall() {

        $oQuery = Object::$db->query('SELECT * FROM `Owner`');
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
