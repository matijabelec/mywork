<?php

namespace Myworkapp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AppBaseController {
    public function indexAction() {
        return new ViewModel();
    }
}
