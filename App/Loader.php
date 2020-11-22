<?php

namespace App;

class Loader {
    public function register (){
        sql_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class){
        $class = DIR.DS.str_raplace("\\", DS, $class). '.php';
        include_once $class;
    }
}
?>