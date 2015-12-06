<?php

namespace Myworkapp\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Employee {
    
    public $id;
    public $firstname;
    public $lastname;
    public $birthdate;
    public $date_created;
    public $date_modified;
    public $status;
    
    protected $inputFilter;
    
    public function exchangeArray($data) {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->firstname = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname = (!empty($data['lastname'])) ? $data['lastname'] : null;
        $this->birthdate = (!empty($data['birthdate'])) ? $data['birthdate'] : null;
        $this->date_created = (!empty($data['date_created'])) ? $data['date_created'] : null;
        $this->date_modified = (!empty($data['date_modified'])) ? $data['date_modified'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }

    public function getInputFilter() {
        if(!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ) );

            $inputFilter->add(array(
                'name'     => 'firstname',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 25,
                        ),
                    ),
                ),
            ) );

            $inputFilter->add(array(
                'name'     => 'lastname',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 30,
                        ),
                    ),
                ),
            ) );
            
            $inputFilter->add(array(
                'name'     => 'birthdate',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 15,
                        ),
                    ),
                ),
            ) );
            
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
