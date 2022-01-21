<?php
 
class Patient {
    private $id;
    private $name;
    private $age;
    private $gender;
    private $address;
    private $consultation;
 
    public function __construct($name, $age, $gender, $address) {
        $this->id = uniqid("patient_");
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->address = $address;
        $this->consultation = [
            "time" => "",
            "consulted" => false
        ];
    }
 
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
 
    public function getAge() {
        return $this->age;
    }
 
    public function getGender() {
        return $this->gender;
    }
 
    public function getAddress() {
        return $this->address;
    }
 
    public function getConsultation($key) {
        return $this->consultation[$key];
    }
 
    public function setName($name) {
        $this->name = $name;
    }
 
    public function setAge($age) {
        $this->age = $age;
    }
 
    public function setGender($gender) {
        $this->gender = $gender;
    }
 
    public function setAddress($address) {
        $this->address = $address;
    }
 
    public function setConsultation($key, $value) {
        $this->consultation[$key] = $value;
    }
}
