<?php

    if(!$_SESSION){
        session_start();
    }

    $_SESSION['quantidadeProduto'] = isset($_SESSION['cart']) ? count(unserialize($_SESSION['cart'])) : 0;
?>