<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class User extends Object
{

    public $login;
    public $pass;


    static function TableName()
    {
        return 'Owner';
    }


    public function getUser()
    {
        $oQuery = Object::$db->prepare("SELECT * FROM Driver WHERE login=:need_login AND pass=:pass");
        $oQuery->execute(['need_login' => $this->login, 'pass' => $this->pass]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        echo '<pre>';
        print_r($aRes);
        echo '</pre>';
        //($aRes) ?  : var_dump('пользователь не существует'); если будет желание сделать
        // предупреждение о неверном пароле
        if ($aRes) {
            return $aRes['driver_id'];
        }
        $oQuery = Object::$db->prepare("SELECT * FROM Owner WHERE login=:need_login AND pass=:pass");
        $oQuery->execute(['need_login' => $this->login, 'pass' => $this->pass]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        if ($aRes) {
            return $aRes['owner_id'];
        }
        return false;

    }

    static function whoisUser() {
        if ($_SESSION['user'] >= 10000) {
            return 'Owner';
        }
        return 'Driver';

    }
}