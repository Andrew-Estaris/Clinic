<?php

class Clinic {
    private $name;
    private $patients = [];
    private $appointments = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getAllPatients() {
        return $this->patients;
    }

    public function getPatient($id) {
        foreach ($this->patients as $patient) {
            if ($patient->getId() == $id) {
                return $patient;
            }
        }
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function addPatient(Patient $patient) {
        array_push($this->patients, $patient);
        Util::saveData();
    }

    public function addAppointment($id, $nurse, $datetime) {
        if (!isset($this->appointments[$datetime])) {
            $this->appointments[$datetime] = [$this->getPatient($id), $nurse];
            return true;
        }
        
        return false;
    }

    public function deletePatient($id) {
        $i = 0;
        foreach ($this->patients as $patient) {
            if ($patient->getId() == $id) {
                array_splice($this->patients, $i, 1);
                return true;
            }

            $i++;
        }

        return false;
    }
}
