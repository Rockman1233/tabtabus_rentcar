<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Driver extends Object {

    public $driver_id;
    public $first_name;
    public $login;
    public $pass;
    public $last_name;
    public $telephone;
    public $email;
    public $address;
    public $desired_car;
    public $desired_dates;
    public $passport_num_d;
    public $experience;
    public $drive_license;


    static function TableName()
    {
        return 'Driver';
    }

    public function desireCar($model){
        $oQuery = self::$db->query('SELECT Car.mark, Car.year, Car.mileage, Car.colour, Car.consumption, Car.`cost_less_30_inc`, Car.`cost_more_31`, Car.car_owner FROM Car WHERE model='.$model);
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }

    public function desireDates(){
        $oQuery = self::$db->query('SELECT Car.model, interval_availability.start_date, interval_availability.finish_date FROM interval_availability JOIN Car ON interval_availability.interval_id=Car.`int_of_availability` GROUP BY start_date');
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }
    public function saveDriver()
    {

        $prepare = self::$db->prepare(
            'INSERT INTO Driver 
                        (login,
                        pass,
                        first_name, 
                        last_name, 
                        telephone, 
                        email, 
                        address, 
                        passport_num_d,
                        desired_car,
                        desired_dates,
                        experience,
                        drive_license
                        ) 
                        VALUES 
                        (:login,
                        :pass,
                        :first_name, 
                        :last_name, 
                        :telephone, 
                        :email, 
                        :address, 
                        :passport_num_d,
                        :desired_car,
                        :desired_dates,
                        :experience,
                        :drive_license)');


        $prepare->execute(
            array('User' => $this->login,
                'pass'=> $this->pass,
                'first_name'=> $this->first_name,
                'last_name'=> $this->last_name,
                'telephone'=> $this->telephone,
                'email'=> $this->email,
                'address'=> $this->address,
                'passport_num_d'=> $this->passport_num_d,
                'desired_car'=> $this->desired_car,
                'desired_dates'=> $this->desired_dates,
                'experience'=> $this->experience,
                'drive_license'=> $this->drive_license,
            ));
    }

}
