<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Driver extends Object {

    protected $driver_id;
    protected $first_name;
    protected $last_name;
    protected $telephone;
    protected $email;
    protected $address;
    protected $desired_car;
    protected $desired_dates;
    protected $passport_num_d;
    protected $experience;
    protected $drive_license;


    static function TableName()
    {
        return 'Driver';
    }

    protected function desireCar($model){
        $oQuery = self::$db->query('SELECT Car.mark, Car.year, Car.mileage, Car.colour, Car.consumption, Car.`cost_less_30_inc`, Car.`cost_more_31`, Car.car_owner FROM Car WHERE model='.$model);
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }

    protected function desireDates(){
        $oQuery = self::$db->query('SELECT Car.model, interval_availability.start_date, interval_availability.finish_date FROM interval_availability JOIN Car ON interval_availability.interval_id=Car.`int_of_availability` GROUP BY start_date');
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }
    protected function safeDriver()
    {
        (isset($this->id) ? self::$db->query('UPDATE Driver SET telephone=' . $this->telephone . ',email=' . $this->email . ',address=' . $this->address . ',desired_car=' . $this->desired_car . ',desired_dates=' .$this->desired_dates. ',experience='.$this->experience):
            self::$db->query('INSERT INTO Driver VALUES (' . $this-> driver_id . ',' . $this->first_name . ',' . $this->last_name . ',' . $this->telephone . ',' . $this->email . ',' . $this->desired_car . ',' . $this->desired_dates . ',' . $this->passport_num_d . ',' . $this->experience . ',' . $this->drive_license));

        //если мы добавляем нового водителя в бд то используем все поля а если уже существующую то не все (например номер паспорта ббудет прежним)


    }

}
