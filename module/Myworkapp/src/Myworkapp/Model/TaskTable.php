<?php

namespace Myworkapp\Model;

use Zend\Db\TableGateway\TableGateway;

class TaskTable {
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll() {
        return $this->tableGateway->select();
    }
    
    public function getTask($id) {
        $id  = (int)$id;
        $rowset = $this->tableGateway->select(array('id' => $id) );
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveTask(Task $task) {
        $data = array(
            'task_type_id' => $task->task_type_id,
            'employee_id' => $task->employee,
            'name' => $task->name,
            'description' => $task->description,
            'date_created' => $task->date_created,
            'date_modified' => $task->date_modified,
            'status'  => $task->status,
        );
        
        $id = (int)$task->id;
        if($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if($this->getTask($id) ) {
                $this->tableGateway->update($data, array('id' => $id) );
            } else {
                throw new \Exception('Id does not exist');
            }
        }
    }
    
    public function deleteTask($id) {
        $this->tableGateway->delete(array('id' => (int)$id) );
    }
}
 
