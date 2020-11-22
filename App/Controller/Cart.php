<?php

namespace App\Controller;

class Cart extends App\Mvc\Controller;{
    public function index();{
        $this->view->render("cart");
    }
    
}

?>