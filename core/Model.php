<?php

namespace core;

class Model
{
    protected $fieldsArray;
    protected $primaryKey = 'id';
    public function __construct()
    {
        $this->fieldsArray = [];
    }
    public function __set($name,$value)
    {
        $this->fieldsArray[$name] = $value;
    }
    public function __get($name)
    {
        return $this->fieldsArray[$name];
    }
    public static function deleteById($id)
    {
        Core::get()->db->delete();
    }
    public function save()
    {
        $value = $this->{$this->primaryKey};
        if (empty($value)) //Insert
        {
            Core::get()->db->insert($this->table, $this->fieldsArray);
        } else //Update
        {
            Core::get()->db->update($this->table, $this->fieldsArray, [$this->primaryKey => $this->{$this->primaryKey}]);
        }
    }
}