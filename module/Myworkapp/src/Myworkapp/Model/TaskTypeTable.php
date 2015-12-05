<?php

namespace Myworkapp\Model;

use Zend\Db\TableGateway\TableGateway;

class TaskTypeTable {
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll() {
        return $this->tableGateway->select();
    }
    
    public function getTaskType($id) {
        $id  = (int)$id;
        $rowset = $this->tableGateway->select(array('id' => $id) );
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveTaskType(TaskType $task_type) {
        $data = array(
            'name' => $task_type->name,
            'description' => $task_type->description,
            'date_created' => $task_type->date_created,
            'date_modified' => $task_type->date_modified,
            'status'  => $task_type->status,
        );
        
        $id = (int)$task_type->id;
        if($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if($this->getTaskType($id) ) {
                $this->tableGateway->update($data, array('id' => $id) );
            } else {
                throw new \Exception('Id does not exist');
            }
        }
    }
    
    public function deleteTaskType($id) {
        $this->tableGateway->delete(array('id' => (int)$id) );
    }
}
 
