<?php

namespace Myworkapp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AppBaseController extends AbstractActionController {
    
    public function getTaskTable() {
        return $this->getServiceLocator()->get('Myworkapp\Model\TaskTable');
    }
    
    public function getTaskTypeTable() {
        return $this->getServiceLocator()->get('Myworkapp\Model\TaskTypeTable');
    }
    
    public function getEmployeeTable() {
        return $this->getServiceLocator()->get('Myworkapp\Model\EmployeeTable');
    }
    
}



