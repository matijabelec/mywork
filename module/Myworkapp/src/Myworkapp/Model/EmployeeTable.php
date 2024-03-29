<?php

namespace Myworkapp\Model;

use Zend\Db\TableGateway\TableGateway;

class EmployeeTable {
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll() {
        return $this->tableGateway->select();
    }
    
    public function getEmployee($id) {
        $id  = (int)$id;
        $rowset = $this->tableGateway->select(array('id' => $id) );
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveEmployee(Employee $employee) {
        $data = array(
            'firstname' => $employee->firstname,
            'lastname' => $employee->lastname,
            'birthdate' => $employee->birthdate,
            'date_created' => $employee->date_created,
            'date_modified' => $employee->date_modified,
            'status'  => $employee->status,
        );
        
        $datetime_now = date('Y-m-d H:i:s');
        
        $id = (int)$employee->id;
        if($id == 0) {
            $data['date_created'] = $data['date_modified'] = $datetime_now;
            $data['status'] = 1;
            $this->tableGateway->insert($data);
        } else {
            if($this->getEmployee($id) ) {
                $data['date_modified'] = $datetime_now;
                $this->tableGateway->update($data, array('id' => $id) );
            } else {
                throw new \Exception('Id does not exist');
            }
        }
    }
    
    public function deleteEmployee($id) {
        $this->tableGateway->delete(array('id' => (int)$id) );
    }
}
 
