<?php

namespace PHPMVC\Models;

/* class ( EmployeesModel ) دا فية مجموعه Properties and 1 function خاصة بحساب salary وبيورث من class ( AbstractModel ) */
class EmployeesModel extends AbstractModel
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $salary;
    public $tax;
    public $gender;
    public $shift;
    public $notes;

    protected static $tableName = 'employee';

    protected static $tableSchema = array(
        'name'    => self::DATA_TYPE_STR,
        'age'     => self::DATA_TYPE_INT,
        'address' => self::DATA_TYPE_STR,
        'salary'  => self::DATA_TYPE_DECIMAL,
        'tax'     => self::DATA_TYPE_DECIMAL,
        'gender'  => self::DATA_TYPE_INT,
        'shift'   =>self::DATA_TYPE_INT,
        'notes'   =>self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'id';

    public function calc_salary(){
        $salary  = $this->salary - ($this->salary * $this->tax / 100);
        return $salary;
    }
}