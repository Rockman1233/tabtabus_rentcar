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
    public $start_date;
    public $finish_date;
    public $cost;


    static function TableName()
    {
        return 'Contract';
    }

    static function searchDates($car)
    {
        $oQuery = Object::$db->query('SELECT Contract.start_date, Contract.finish_date FROM Contract WHERE car='.$car);
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveContract()
    {
        $prepare = self::$db->prepare(
            'INSERT INTO Contract 
                        (
                        status,
                        car,  
                        driver,
                        start_date,
                        finish_date,
                        cost
                        ) 
                        VALUES 
                        ( 
                        :status, 
                        :car, 
                        :driver,
                        :start_date,
                        :finish_date,
                        :cost
                        )');
        $prepare->execute(
            array(
                'status'=> $this->status,
                'car'=> $this->car,
                'driver'=> $this->driver,
                'start_date'=> $this->start_date,
                'finish_date'=> $this->finish_date,
                'cost'=> $this->cost
            ));
    }
    //changing status by Owner
    public function changeStatus() {

        $prepare = self::$db->prepare(
            'UPDATE Contract SET
                        status  ='.$this->status.'
                        WHERE
                        contract_id='.$this->contract_id);

        $prepare->execute();

        }



    static function showAllforOwner() {

        $oQuery = Object::$db->query('SELECT Contract.contract_id, Contract.status, Contract.start_date, Contract.finish_date, Contract.cost, Driver.first_name, Driver.last_name, Driver.address, Driver.passport_num, Driver.telephone, Driver.email, Car.mark, Car.model, Car.state_num, Car.car_id FROM Contract JOIN Car ON Contract.car=Car.car_id JOIN Driver ON Contract.driver=Driver.driver_id WHERE car_owner='.$_SESSION['user']);
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);


}

    static function showAllforDriver() {

        $oQuery = Object::$db->query('SELECT Contract.contract_id, Contract.status, Contract.start_date, Contract.finish_date, Contract.cost, Owner.first_name, Owner.last_name, Owner.address, Owner.passport_num, Owner.telephone, Owner.email, Car.mark, Car.model, Car.state_num, Car.car_id FROM Contract JOIN Car ON Contract.car=Car.car_id JOIN Owner ON Car.car_owner=Owner.owner_id WHERE driver='.$_SESSION['user']);
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);



    }

}