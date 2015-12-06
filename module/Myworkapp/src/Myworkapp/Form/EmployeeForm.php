<?php
namespace Myworkapp\Form;

use Zend\Form\Form;

class EmployeeForm extends Form {
    public function __construct($name = null, $options = array() ) {
        parent::__construct($name, $options);

//        $this->add(array(
//            'name' => 'employee-fieldset',
//            'type' => 'Myworkapp\Form\EmployeeFieldset',
//        ) );
        
        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
            'options' => array(
                'label' => 'Id',
            ),
        ) );
        
        $this->add(array(
            'type' => 'text',
            'name' => 'firstname',
            'options' => array(
                'label' => 'Firstname',
            ),
        ) );

        $this->add(array(
            'type' => 'text',
            'name' => 'lastname',
            'options' => array(
                'label' => 'Lastname',
            ),
        ) );
        
        $this->add(array(
            'type' => 'text',
            'name' => 'birthdate',
            'options' => array(
                'label' => 'Birth date',
            ),
        ) );

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Insert new Employee',
            ),
        ) );
    }
}
