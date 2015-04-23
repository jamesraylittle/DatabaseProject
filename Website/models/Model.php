<?php

//Written by James.
class Model {

    protected static $_modelName;
    protected static $_tableName;
    protected $_columns;

    function __construct() {
        $this->_columns = array();
    }

    function setColumnValue($name, $value) {
        $this->_columns[$name] = $value;
    }

    function getColumnValue($name) {
        return $this->_columns[$name];
    }

    function getColumns() {
        return "(" . implode(",", array_keys($this->_columns)) . ")";
    }

    function getValues() {
        return $this->makeList($this->_columns);
    }

    function insert($DB) {
        $q = "INSERT INTO ". static::$_tableName . $this->getColumns() . $this->getValues();
        $DB->execute($q);
    }


    private function makeList($list = array()) {
        $returnValue = "(";
        $list_size = count($list);


        for($i = 0; $i<$list_size; $i++) {

            $returnValue .= $list[$i];
            if(!$index + 1 == $list_size)
                $returnValue .= ", ";

        }
        $returnValue .= ")";
        return $returnValue;
    }

    protected function check($v) {
        if(isset($v) || !empty($v) || !is_null($v))
            return $v;
        else
            return "?";
    }

}