<?php

namespace PHPMVC\Models;
use PHPMVC\Lib\Database\DatabaseHandler;

class AbstractModel
{
    const DATA_TYPE_BOOL    = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR     = \PDO::PARAM_STR;
    const DATA_TYPE_INT     = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;

    // function دي بتاخد stmt بتاعتي وتعمل عليها loop عن طريق foreach لانها عباره عن associative array وتعمل للقيم
    // sanitize زي  ( name = :name or name = ? ) اما bindparam or bindvalue .
    private function prepareValues(\PDOStatement &$stmt)
    {
        foreach(static::$tableSchema as $colName => $type)
        {
            if($type == 4)
            {
                $sanitizedValue = filter_var($this->$colName,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$colName}",$sanitizedValue);
            }else{
                $stmt->bindValue(":{$colName}",$this->$colName,$type);
            }
        }
    }

    // function دي بتبني الجملة بتاعتي في تركيبها زي ( insert into tablename set name = : name ) وفي النهاية trim لعلامة , من نهاية او بداية الجملة
    private static function bulidParamNameSql()
    {
        $paramName = '';
        foreach(static::$tableSchema as $colName => $type){
            $paramName .= $colName . ' = :' . $colName . ', ';
        }
        return trim($paramName , ', ');
    }

    private function create()
    {
        $sql = 'INSERT INTO ' . static::$tableName . ' SET ' . self::bulidParamNameSql();
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $this->prepareValues($stmt);
        if ($stmt->execute()){
            $this->{static::$primaryKey} = DatabaseHandler::factory()->lastInsertId();
            return true;
        }
        return false;
    }

    private function update()
    {
        $sql = 'UPDATE ' . static::$tableName . ' SET ' . self::bulidParamNameSql() . ' WHERE ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute();
    }

    public function save()
    {
        return $this->{static::$primaryKey} === null ? $this->create() : $this->update();
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt = DatabaseHandler::factory()->prepare($sql);
        return $stmt->execute();
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM ' . static::$tableName;
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        return  (is_array($results) && !empty($results)) ? $results : false;
    }

    public static function getByPk($pk)
    {
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . ' = "' . $pk .'"';
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if($stmt->execute() === true){
            $obj = $stmt->fetchAll(\PDO::FETCH_CLASS , get_called_class());
            return !empty($obj) ? array_shift($obj) : false;
        }
        return false;
    }
}