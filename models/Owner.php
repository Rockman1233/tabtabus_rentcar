<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Owner extends Object
{

    public $owner_id;
    public $login;
    public $pass;
    public $first_name;
    public $last_name;
    public $telephone;
    public $email;
    public $address;
    public $cars;
    public $passport_num;


    static function TableName()
    {
        return 'Owner';
    }

    public function getCars()
    {
        $oQuery = self::$db->query('SELECT Car.mark, Car.model FROM Car WHERE car_owner=' . $this->owner_id);
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }

    public function saveOwner()
    {
        $prepare = self::$db->prepare(
            'INSERT INTO Owner 
                        (login,
                        pass,
                        first_name, 
                        last_name, 
                        telephone, 
                        email, 
                        address, 
                        passport_num,
                        cars) 
                        VALUES 
                        (:login,
                        :pass,
                        :first_name, 
                        :last_name, 
                        :telephone, 
                        :email, 
                        :address, 
                        :passport_num,
                        :cars)');


        $prepare->execute(
            array('login' => $this->login,
                'pass' => $this->pass,
                'first_name'=> $this->first_name,
                'last_name'=> $this->last_name,
                'telephone'=> $this->telephone,
                'email'=> $this->email,
                'address'=> $this->address,
                'passport_num'=> $this->passport_num,
                'cars'=> $this->cars,

            ));

    }
}