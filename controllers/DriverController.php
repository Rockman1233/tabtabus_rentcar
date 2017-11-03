<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */
include($_SERVER['DOCUMENT_ROOT'].'/models/Driver.php');
include('Controller.php');

class DriverController extends Controller {


    public function actionIndex($render='indexDriver.php')
    {
        $this->view->addData('temp',"$render");
        $this->view->generate();

    }
    public function actionSave() {

        $this->view->addData('temp','saveDriver.php');
        $this->view->generateIn();
    }

    public function actionSaveConfirm(){

        $NewDriver = new Driver();
        foreach ($_POST as $var => $value) {
            $NewDriver->__set($var, $value);
        }

        echo '<pre>';
        print_r($NewDriver);
        echo '</pre>';
        $NewDriver->saveDriver();


    }

}
