<?php
class Alunno {
    protected $name;
    protected $surname;
    protected $age;

    public function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getSurname() {
        return $this->surname;
    }
    public function setSurname($surname) {
        $this->name = $surname;
    }

    public function getAge() {
        return $this->age;
    }
    public function setAge($age) {
        $this->name = $age;
    }
    public function allInfo() {
        return "Name: $this->name, Surname: $this->surname, Age: $this->age";
    }
}