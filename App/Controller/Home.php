<?php

namespace App\Controller;

class Home extends App\Mvc\Controller {

    public function index(){
        $this->view->render('home');
    }
}
?>