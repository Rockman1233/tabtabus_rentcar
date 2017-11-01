<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 01.11.17
 * Time: 9:49
 */
include($_SERVER['DOCUMENT_ROOT'].'/views/view.php');
class Controller {


    function __construct()

    {
        $this->view = new View();
    }

    public function actionIndex() {

    }



}