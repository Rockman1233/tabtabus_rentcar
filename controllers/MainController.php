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

        $this->view->generate('indexMain.php', 'template.php');

    }

}