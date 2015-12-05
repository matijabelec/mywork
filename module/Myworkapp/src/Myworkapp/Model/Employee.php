<?php

namespace Myworkapp\Model;

class Employee {
    
    public $id;
    public $firstname;
    public $lastname;
    public $birthdate;
    public $date_created;
    public $date_modified;
    public $status;
    
    public function exchangeArray($data) {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->firstname = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname = (!empty($data['lastname'])) ? $data['lastname'] : null;
        $this->birthdate = (!empty($data['birthdate'])) ? $data['birthdate'] : null;
        $this->date_created = (!empty($data['date_created'])) ? $data['date_created'] : null;
        $this->date_modified = (!empty($data['date_modified'])) ? $data['date_modified'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
    }
}
