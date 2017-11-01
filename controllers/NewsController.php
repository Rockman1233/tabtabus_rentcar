<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 9:32
 */
class NewsController {


    public function actionIndex()
    {
        $newList = array();
        $newList = News::getNewsList();


        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/template.php';

    }
    public function actionView($category, $id) {


    }

}