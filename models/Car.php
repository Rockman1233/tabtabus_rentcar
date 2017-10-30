<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Car extends Object {

    public $id;
    public $mark;
    public $model;
    public $state_num;
    public $mileage;
    public $colour;
    public $consuption;
    public $int_of_avaliability;
    public $cost_less_30;
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

    public function safeCar() {
        (isset($this->id) ? $this->db->query('UPDATE Car SET state_num='.$this->state_num.',mileage='.$this->mileage.',int_of_availability='.$this->int_of_avaliability.',cost_less_30_inc='.$this->cost_less_30.',cost_more_31='.$this->cost_more_31.',car_owner='.$this->car_owner):
            $this->db->query('INSERT INTO Car VALUES ('.$this->id.','.$this->mark.','.$this->model.','.$this->state_num.','.$this->mileage.','.$this->colour.','.$this->consuption.','.$this->int_of_avaliability.','.$this->int_of_avaliability.','.$this->cost_less_30.'
            ,'.$this->cost_more_31.','.$this->car_owner));

        //если мы добавляем новую машину в бд то используем все поля а если уже существующую то не все (например цвет или марка остаются прежними)
    }


}