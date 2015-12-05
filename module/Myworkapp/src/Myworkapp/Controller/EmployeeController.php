<?php

namespace Myworkapp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Myworkapp\Model\Employee;
use Myworkapp\Model\EmployeeTable;

class EmployeeController extends AppBaseController {
    public function indexAction() {
        return new ViewModel(array(
            'employers' => $this->getEmployeeTable()->fetchAll(),
        ) );
    }
    
    public function addAction() {
        $employee = new Employee();
        $employee->firstname = 'Ivo';
        $employee->lastname = 'Ivić';
        $employee->birthdate = '2000-11-23';
        $employee->date_modified = $employee->date_created = date('Y-m-d H:i:s');
        $employee->status = 1;
        
        $employee_table = $this->getEmployeeTable();
        $employee_table->saveEmployee($employee);
        
        $this->redirect()->toRoute('employee');
    }
    
    public function deleteAction() {
        $id = (int)$this->params()->fromRoute('id', 0);
        
        $this->getEmployeeTable()->deleteEmployee($id);
        
        $this->redirect()->toRoute('employee');
    }
}
