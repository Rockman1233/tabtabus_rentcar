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
    public $passport_number_owner;
    public $passport_number_driver;
    public $first_name_owner;
    public $last_name_owner;
    public $first_name_driver;
    public $last_name_driver;
    public $telephone_owner;
    public $address_owner;
    public $email_owner;
    public $telephone_driver;
    public $address_driver;
    public $email_driver;



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
                        passport_number_owner, 
                        passport_number_driver, 
                        first_name_owner, 
                        last_name_owner, 
                        first_name_driver, 
                        last_name_driver,
                        telephone_owner,
                        address_owner,
                        email_owner,
                        telephone_driver,
                        address_driver,
                        email_driver) 
                        VALUES 
                        ( 
                        :status, 
                        :car, 
                        :passport_number_owner, 
                        :passport_number_driver, 
                        :first_name_owner, 
                        :last_name_owner, 
                        :first_name_driver, 
                        :last_name_driver,
                        :telephone_owner,
                        :address_owner,
                        :email_owner,
                        :telephone_driver,
                        :address_driver,
                        :email_driver
                        )');


        $prepare->execute(
            array(
                'status'=> $this->status,
                'car'=> $this->car,
                'passport_number_owner'=> $this->passport_number_owner,
                'passport_number_driver'=> $this->passport_number_driver,
                'first_name_owner'=> $this->first_name_owner,
                'last_name_owner'=> $this->last_name_owner,
                'first_name_driver'=> $this->first_name_driver,
                'last_name_driver'=> $this->last_name_driver,
                'telephone_owner'=> $this->telephone_owner,
                'address_owner'=> $this->address_owner,
                'email_owner'=> $this->email_owner,
                'telephone_driver'=> $this->telephone_driver,
                'address_driver'=> $this->address_driver,
                'email_driver'=> $this->email_driver,
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