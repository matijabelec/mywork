<?php

namespace Myworkapp\Model;

class Task {
    
    public $id;
    public $task_type_id;
    public $employee_id;
    public $name;
    public $description;
    public $date_created;
    public $date_modified;
    public $status;
    
    public function exchangeArray($data) {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->task_type_id = (!empty($data['task_type_id'])) ? $data['task_type_id'] : null;
        $this->employee_id = (!empty($data['employee_id'])) ? $data['employee_id'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->date_created = (!empty($data['date_created'])) ? $data['date_created'] : null;
        $this->date_modified = (!empty($data['date_modified'])) ? $data['date_modified'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
    }
}
