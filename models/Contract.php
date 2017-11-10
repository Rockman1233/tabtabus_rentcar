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
                        driver
                        ) 
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

    public function changeStatus() {
        $prepare = self::$db->prepare(
            'UPDATE Contract SET
                        status  ='.$this->status.'
                        WHERE
                        contract_id='.$this->contract_id);
        $prepare->execute();
    }


    public function showCurrent() {

        if(User::whoisUser()=='Owner') {
            $oQuery = Object::$db->query('SELECT * FROM `Contract` WHERE car_owner='.$_SESSION['user']);
        }
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);

    }

    static function showAllforOwner() {

        $oQuery = Object::$db->query('SELECT Contract.contract_id, Contract.status, Driver.first_name, Driver.last_name, Driver.address, Driver.passport_num, Driver.telephone, Driver.email, Car.mark, Car.model, Car.state_num FROM Contract JOIN Car ON Contract.car=Car.car_id JOIN Driver ON Contract.driver=Driver.driver_id WHERE car_owner='.$_SESSION['user']);
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);


}


}