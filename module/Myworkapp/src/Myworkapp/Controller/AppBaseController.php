<?php

namespace Myworkapp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\Writer\Stream;
use Zend\Log\Logger;

class AppBaseController extends AbstractActionController {
    
    protected function saveLog($message, $filename='log') {
        $file = $filename . '_' . date('Y-m-d') . '.txt';
//        $writer = new LogWS($filepath);
//        $logger = new Logger();
//        $logger->addWriter($writer);
//        $logger->info($log);
        
        $logdir = 'data/log';
        // check if the log dir exists
        if (!file_exists($logdir) ) {
            mkdir($logdir, 0777, true);
        }
        
        $stream = fopen($logdir . '/' . $file, 'a', false);
        $writer = new Stream($stream);
        $logger = new Logger();
        $logger->addWriter($writer);
        
        $logger->info(time() . ': ' . $message);
    }
    
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



