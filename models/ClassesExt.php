<?php

include $_SERVER['DOCUMENT_ROOT'].'/config/DBConnect.php';

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

