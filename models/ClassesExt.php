<?php

require_once('DBConnect.php');

abstract class Object{

    /** @var  PDO */
    static $db;

    public function __construct($params = [])
    {
        $className = get_called_class();
        foreach ($params as $param_name => $param_value){
            if (property_exists($className, $param_name ))
                $this->$param_name = $param_value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this,$name))
            return $this->name;

        return 'Not exist';
    }

    public function __set($name, $value)
    {
        if (property_exists($this,$name))
            $this->$name = $value;
        return 'Not exist';
    }

    abstract static function TableName();

    /**
     * @param integer $id
     * @return
     */
    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();

        $oQuery = Object::$db->prepare("SELECT * FROM {$table} WHERE id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new $class($aRes):null;
    }
}





class Owner extends Object
{

    protected $owner_id;
    protected $first_name;
    protected $last_name;
    protected $telephone;
    protected $email;
    protected $address;
    protected $cars;
    protected $passport_num;


    static function TableName()
    {
        return 'Owner';
    }

    protected function getCars()
    {
        $oQuery = $this->db->query('SELECT Car.mark, Car.model FROM Car WHERE car_owner=' . $this->id);
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }

    protected function safeOwner()
    {
        (isset($this->id) ? $this->db->query('UPDATE Owner SET telephone=' . $this->telephone . ',email=' . $this->email . ',address=' . $this->address . ',cars=' . $this->cars) :
            $this->db->query('INSERT INTO Owner VALUES (' . $this->owner_id . ',' . $this->first_name . ',' . $this->last_name . ',' . $this->telephone . ',' . $this->email . ',' . $this->address . ',' . $this->cars . ',' . $this->passport_num));

        //если мы добавляем нового владельца в бд то используем все поля а если уже существующую то не все (например номер паспорта ббудет прежним)


    }
}

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
        $oQuery = $this->db->query('SELECT Car.mark, Car.year, Car.mileage, Car.colour, Car.consumption, Car.`cost_less_30_inc`, Car.`cost_more_31`, Car.car_owner FROM Car WHERE model='.$model);
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }

    protected function desireDates(){
        $oQuery = $this->db->query('SELECT Car.model, interval_availability.start_date, interval_availability.finish_date FROM interval_availability JOIN Car ON interval_availability.interval_id=Car.`int_of_availability` GROUP BY start_date');
        $aRes = $oQuery->fetchAll();
        return $aRes;
    }
    protected function safeDriver()
    {
        (isset($this->id) ? $this->db->query('UPDATE Driver SET telephone=' . $this->telephone . ',email=' . $this->email . ',address=' . $this->address . ',desired_car=' . $this->desired_car . ',desired_dates=' .$this->desired_dates. ',experience='.$this->experience):
            $this->db->query('INSERT INTO Driver VALUES (' . $this-> driver_id . ',' . $this->first_name . ',' . $this->last_name . ',' . $this->telephone . ',' . $this->email . ',' . $this->desired_car . ',' . $this->desired_dates . ',' . $this->passport_num_d . ',' . $this->experience . ',' . $this->drive_license));

        //если мы добавляем нового водителя в бд то используем все поля а если уже существующую то не все (например номер паспорта ббудет прежним)


    }

}

class Contract extends Object {

    protected $contract_id;
    protected $car;
    protected $status;
    protected $passport_number_owner;
    protected $passport_number_drive;
    protected $first_name_owner;
    protected $last_name_owner;
    protected $first_name_driver;
    protected $last_name_driver;
    protected $telephone_owner;
    protected $address_owner;
    protected $email_owner;
    protected $telephone_driver;
    protected $address_driver;
    protected $email_driver;



    static function TableName()
    {
        return 'Contract';
    }


    protected function safeContract()
    {
        (isset($this->id)&&isset($this->status) ? $this->db->query('UPDATE Contract SET car=' . $this->car . ',passport_number_owner=' . $this->passport_number_owner . ',first_name_owner=' . $this->first_name_owner . ',last_name_owner=' . $this->last_name_owner . ',first_name_driver=' .$this->first_name_driver. ',last_name_driver='.$this->last_name_driver. ',telephone_owner='.$this->telephone_owner. ',address_owner='.$this->address_owner. ',email_owner='.$this->email_owner. ',telephone_driver='.$this->telephone_driver. ',address_driver='.$this->address_driver. ',email_driver='.$this->email_driver):
            $this->db->query('INSERT INTO Contract VALUES (' . $this-> contract_id . ',' . $this->car . ',' . $this->passport_number_owner . ',' . $this->passport_number_drive . ',' . $this->first_name_owner . ',' . $this->last_name_owner . ',' . $this->first_name_driver . ',' . $this->last_name_driver . ',' . $this->telephone_owner . ',' . $this->address_owner . ',' . $this->email_owner . ',' . $this->telephone_driver . ',' . $this->address_driver . ',' . $this->email_driver));



    }


}

