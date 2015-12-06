<?php

namespace Myworkapp\Controller;

use Zend\View\Model\ViewModel;

use Myworkapp\Model\Employee;
use Myworkapp\Form\EmployeeForm;

class EmployeeController extends AppBaseController {
    public function indexAction() {
        return new ViewModel(array(
            'employers' => $this->getEmployeeTable()->fetchAll(),
        ) );
    }
    
    public function addAction() {
//        $employee = new Employee();
//        $employee->firstname = 'Ivo';
//        $employee->lastname = 'Ivić';
//        $employee->birthdate = '2000-11-23';
//        $employee->date_modified = $employee->date_created = date('Y-m-d H:i:s');
//        $employee->status = 1;
//        
//        $employee_table = $this->getEmployeeTable();
//        $employee_table->saveEmployee($employee);
//        
//        $this->redirect()->toRoute('employee');
        
        $form = new EmployeeForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if($request->isPost() ) {
            $employee = new Employee();
            $form->setInputFilter($employee->getInputFilter() );
            $form->setData($request->getPost() );
            
            if($form->isValid() ) {
                
                $this->saveLog(print_r($employee, 1), 'form_data');
                
                $employee->exchangeArray($form->getData() );
                $this->getEmployeeTable()->saveEmployee($employee);
                
                // Redirect to list of albums
                return $this->redirect()->toRoute('employee');
            }
        }
        return array('form' => $form);
    }
    
    public function deleteAction() {
        $id = (int)$this->params()->fromRoute('id', 0);
        
        $this->getEmployeeTable()->deleteEmployee($id);
        
        $this->redirect()->toRoute('employee');
    }
}
