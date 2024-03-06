<?php
require_once("Alunno.php");

class Classe implements JsonSerializable{
    private $alunni = [];
    private $classname = "";
    private $nextId;
    public function __construct($name) {
        $this->classname = $name;
        $this->alunni = array(
            1 => new Alunno("Davide", "Xie", 19),
            2 => new Alunno("Giovanni", "Brussi", 19),
            3 => new Alunno("Filippo", "Marinai", 18)

        );
        $this->nextId = 4;
    }


    public function getAlunno($id) {
        return $this->alunni[$id] ?? null;
    }

    public function addAlunno($name, $surname, $age) {
        $newStudent = new Alunno($name, $surname, $age);
        $this->alunni[$this->nextId] = $newStudent;
        $result = [
            "id" => $this->nextId,
            "alunno" => $newStudent->jsonSerialize()
        ];
        $this->nextId += 1;
        return $result;
    }

    public function getAllAlunni() {
        $resultString = "";
        foreach($this->alunni as $key => $value) {
            $resultString .= $value->getName() .", ";
        }
        return $resultString;
    }


    public function jsonSerialize() {
        $result = [];
        foreach($this->alunni as $key => $value) {
            $result[$key] = $value->jsonSerialize();
        }
        return $result;
    }
}