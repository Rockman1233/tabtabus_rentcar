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
    public $foto;
    public $year;
    public $state_num;
    public $mileage;
    public $colour;
    public $consumption;
    public $cost_less_30_inc;
    public $cost_more_31;
    public $car_owner;

    const SHOW_DEFAULT = 3;


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
    public function edit() {

        $prepare = self::$db->prepare(
            'UPDATE Car SET
                        foto  = :foto,
                        cost_less_30_inc = :cost_less_30_inc, 
                        cost_more_31 = :cost_more_31, 
                        consumption = :consumption,
                        mileage = :mileage
                        WHERE
                        car_id=:id');

        $prepare->execute(
            array(
                'id'=> $this->car_id,
                'foto'=> $this->foto,
                'cost_less_30_inc'=> $this->cost_less_30_inc,
                'cost_more_31'=> $this->cost_more_31,
                'consumption'=> $this->consumption,
                'mileage'=> $this->mileage
            ));
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
                        foto, 
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
                        :foto, 
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
                'foto' => $this->foto,
                'cost_less_30_inc' => $this->cost_less_30_inc,
                'cost_more_31' => $this->cost_more_31,
                'car_owner' => $this->car_owner
            ));
    }

        static function Showall($page)
        {
            $page = intval($page);
            $count = Car::SHOW_DEFAULT;
            $offset = $count * ($page - 1);

            //if user is authenticated as Owner show him his cars
            if (User::whoisUser() == 'Owner') {
                $oQuery = Object::$db->query('SELECT * FROM `Car` WHERE car_owner=' . $_SESSION['user'].' ORDER BY mark LIMIT ' . $count . ' OFFSET ' . $offset);
            } else {
                $oQuery = Object::$db->query('SELECT * FROM `Car` ORDER BY mark LIMIT ' . $count . ' OFFSET ' . $offset);
            }

            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }

        static function TotalCars()
        {
            if (User::whoisUser() == 'Driver') {
                $oQuery = Object::$db->query('SELECT COUNT(*) FROM `Car`');
                return $oQuery->fetch(PDO::FETCH_ASSOC);
            } else {
                $oQuery = Object::$db->query('SELECT COUNT(*) FROM `Car` WHERE car_owner=' . $_SESSION['user']);
                return $oQuery->fetch(PDO::FETCH_ASSOC);
            }


        }

}