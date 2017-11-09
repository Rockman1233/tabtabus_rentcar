<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Contract extends Object {

    public $contract_id;
    public $car;
    public $status;
    public $driver;


    static function TableName()
    {
        return 'Contract';
    }

    public function saveContract()
    {
        $prepare = self::$db->prepare(
            'INSERT INTO Contract 
                        (
                        status, 
                        car,  
                        driver) 
                        VALUES 
                        ( 
                        :status, 
                        :car, 
                        :driver
                        )');


        $prepare->execute(
            array(
                'status'=> $this->status,
                'car'=> $this->car,
                'driver'=> $this->driver
            ));


    }

    public function showCurrent() {

        if(User::whoisUser()=='Owner') {
            $oQuery = Object::$db->query('SELECT * FROM `Contract` WHERE car_owner='.$_SESSION['user'].' AND ');
        }
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);

    }

    public function showAll() {

    }


}