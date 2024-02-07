<?php
require_once("Alunno.php");

class Classe {
    private $alunni = array();
    private $classname = "";

    public function __construct($name) {
        $classname = $name;
        $this->alunni = array(
            new Alunno("Davide", "Xie", 19),
            new Alunno("Giovanni", "Brussi", 19),
            new Alunno("Filippo", "Marinai", 18)

        );
    }


    public function getAlunno($name) {
        foreach ($this->alunni as $value) {
            if (trim(strtolower($value->getName())) == trim(strtolower($name))) {
                return $value;
            }
        }
        return null;
    }

    public function getAllAlunni() {
        $resultString = "";
        foreach($this->alunni as $value) {
            $resultString .= $value->getName() .", ";
        }
        return $resultString;
    }
}