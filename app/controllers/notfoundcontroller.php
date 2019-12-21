<?php

namespace PHPMVC\Controllers;

class NotFoundController extends AbstractController
{
    public function defaultAction(){
        $this->_view();
    }
}