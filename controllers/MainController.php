<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 31.10.17
 * Time: 22:10
 */
include 'Controller.php';
class MainController extends Controller {



    public function actionIndex()
    {
        $this->view->addData('temp','indexMain.php');
        $this->view->generate();

    }

}