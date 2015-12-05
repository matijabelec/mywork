<?php
namespace Myworkapp;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Myworkapp\Model\Employee;
use Myworkapp\Model\EmployeeTable;
use Myworkapp\Model\Task;
use Myworkapp\Model\TaskTable;
use Myworkapp\Model\TaskType;
use Myworkapp\Model\TaskTypeTable;

class Module {
    public function onBootstrap(MvcEvent $e) {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
    
    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Myworkapp\Model\TaskTable' =>  function($sm) {
                    $tableGateway = $sm->get('TaskTableGateway');
                    $table = new TaskTable($tableGateway);
                    return $table;
                },
                'TaskTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Task() );
                    return new TableGateway('tasks', $dbAdapter, null, $resultSetPrototype);
                },
                
                'Myworkapp\Model\TaskTypeTable' =>  function($sm) {
                    $tableGateway = $sm->get('TaskTypeTableGateway');
                    $table = new TaskTypeTable($tableGateway);
                    return $table;
                },
                'TaskTypeTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new TaskType() );
                    return new TableGateway('task_types', $dbAdapter, null, $resultSetPrototype);
                },
                
                'Myworkapp\Model\EmployeeTable' =>  function($sm) {
                    $tableGateway = $sm->get('EmployeeTableGateway');
                    $table = new EmployeeTable($tableGateway);
                    return $table;
                },
                'EmployeeTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Employee() );
                    return new TableGateway('employers', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}
