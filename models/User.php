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
        $oQuery = Object::$db->prepare("SELECT * FROM Driver WHERE login=:need_login");
        $oQuery->execute(['need_login' => $this->login]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        $access= password_verify($this->pass,$aRes['pass']);

        if ($access) {
            echo '<pre>';
            echo "Привет,".$aRes['first_name'].' '.$aRes['last_name'];
            echo '</pre>';
            return $aRes['driver_id'];
        }

        $oQuery = Object::$db->prepare("SELECT * FROM Owner WHERE login=:need_login");
        $oQuery->execute(['need_login' => $this->login]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        $access= password_verify($this->pass,$aRes['pass']);
        if ($access) {
            echo '<pre>';
            echo "Привет,".$aRes['first_name'].' '.$aRes['last_name'];
            echo '</pre>';
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