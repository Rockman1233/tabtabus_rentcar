<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */
include($_SERVER['DOCUMENT_ROOT'] . '/models/User.php');
include('Controller.php');
class UserController extends Controller {

    public $User;


    public function actionIndex($render='indexUser.php')
    {
        $this->view->addData('temp',"$render");
        $this->view->generate();

    }
    public function actionLogin() {

        $this->User = new User;
        foreach ($_POST as $var => $value) {
            $this->User->__set($var, $value);
        }
        $user_id = $this->User->getUser();

        if($user_id == false){
            echo 'Неверные данные';
            return false;
        }
        else {
            $_SESSION['user'] = $user_id;
            echo $user_id;
            return $user_id;
        }
    }
    public function actionLogout() {
        unset($_SESSION['user']);
        //header('Location:/');
    }

}
