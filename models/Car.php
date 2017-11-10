<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Car extends Object {

    public $car_id;
    public $mark;
    public $model;
    public $year;
    public $state_num;
    public $mileage;
    public $colour;
    public $consumption;
    public $int_of_availability;
    public $cost_less_30_inc;
    public $cost_more_31;
    public $car_owner;


    static function TableName()
    {
        return 'Car';
    }


    public function getCost($days){
        if ($days<=30) {
            return $days*$this->cost_less_30_inc;
        }
        return $days*$this->cost_more_31;
    }

    public function getDates(){
        $oQuery = $this->db->query('SELECT interval_availability.start_date, interval_availability.finish_date FROM interval_availability WHERE interval_id='.$this->id);
        $aRes = $oQuery->fetchAll();
        return $aRes;

    }

    public function saveCar()
    {
        echo '<pre>';
        echo $this->car_id;
        echo '</pre>';
        $prepare = self::$db->prepare(
            'INSERT INTO Car 
                        (mark, 
                        model, 
                        year, 
                        state_num, 
                        mileage, 
                        colour, 
                        consumption, 
                        cost_less_30_inc, 
                        cost_more_31,
                        car_owner) 
                        VALUES 
                        (:mark, 
                        :model, 
                        :year, 
                        :state_num, 
                        :mileage, 
                        :colour, 
                        :consumption, 
                        :cost_less_30_inc, 
                        :cost_more_31,
                        :car_owner)');


        $prepare->execute(
            array('mark' => $this->mark,
                'model' => $this->model,
                'year' => $this->year,
                'state_num' => $this->state_num,
                'mileage' => $this->mileage,
                'colour' => $this->colour,
                'consumption' => $this->consumption,
                'cost_less_30_inc' => $this->cost_less_30_inc,
                'cost_more_31' => $this->cost_more_31,
                'car_owner' => $this->car_owner
            ));
    }

        static function Showall() {

            //if user is authenticated as Owner show him his cars
            if(User::whoisUser()=='Owner') {
                $oQuery = Object::$db->query('SELECT * FROM `Car` WHERE car_owner=' . $_SESSION['user']);
            }
            else {
                $oQuery = Object::$db->query('SELECT * FROM `Car`');
            }
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);



        //если мы добавляем новую машину в бд то используем все поля а если уже существующую то не все (например цвет или марка остаются прежними)
    }


}