<?php
include("Model.php");
//written by James Little

class Instructor extends Model {

    protected static $_modelName = "Instructor";
    protected static $_tableNae = "Instructors";

    function __constructor($name = "", $join_date = "" , $tenure = "", $id = 0) {
        $this->setName($name);
        $this->setJoinDate($join_date);
        $this->setTenure($tenure);
        $this->setId($id);
    }

    public function setId($id) {
        $this->setColumnValue("id", $id);
    }

    public function setName($name) {
        $this->setColumnValue("name", $name);
    }

    public function setJoinDate($joinDate) {
        $this->setColumnValue("join_date", $joinDate);
    }

    public function setTenure($tenure) {
        $this->setColumnValue("tenure", $tenure);
    }

    public function getId() {
        return $this->getColumnValue("id");
    }

    public function getName() {
        return $this->getColumnValue("name");
    }

    public function getJoinDate() {
        return $this->getColumnValue("join_date");
    }

    public function getTenure() {
        return $this->getColumnValue("tenure");
    }

    public function __toString() {
        return static::$_modelName . $this->getValues();
    }
}
