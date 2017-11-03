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

    protected function getCars()
    {
        $oQuery = self::$db->query('SELECT Car.mark, Car.model FROM Car WHERE car_owner=' . $this->owner_id);
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }

    protected function safeOwner()
    {
        (isset($this->id) ? self::$db->query('UPDATE Owner SET telephone=' . $this->telephone . ',email=' . $this->email . ',address=' . $this->address . ',cars=' . $this->cars) :
            self::$db->query('INSERT INTO Owner VALUES (' . $this->owner_id . ',' . $this->first_name . ',' . $this->last_name . ',' . $this->telephone . ',' . $this->email . ',' . $this->address . ',' . $this->cars . ',' . $this->passport_num));

        //если мы добавляем нового владельца в бд то используем все поля а если уже существующую то не все (например номер паспорта ббудет прежним)


    }
}