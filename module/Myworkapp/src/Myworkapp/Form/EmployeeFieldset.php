<?php
namespace Myworkapp\Form;

use Zend\Form\Fieldset;

class EmployeeFieldset extends Fieldset {
    public function __construct($name = null, $options = array() ) {
        parent::__construct($name, $options);

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
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
    }
}
