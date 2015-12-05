<?php

namespace Myworkapp\Model;

class TaskType {
    public $id;
    public $name;
    public $description;
    public $status;

    public function exchangeArray($data) {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
    }
}
