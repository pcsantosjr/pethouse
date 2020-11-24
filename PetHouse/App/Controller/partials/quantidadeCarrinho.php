<?php

    if(!$_SESSION){
        session_start();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = 0;
    }

    if (!isset($_SESSION['itens'])) {
        $_SESSION['cart'] = 0;
    }
    else{
        $_SESSION['cart'] = 0;
        foreach ($_SESSION['itens'] as $id => $quantity) {
            $_SESSION['cart'] += $quantity;       
        }
    }
?>