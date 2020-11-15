<?php

    if(!$_SESSION){
        session_start();
    }

    if (!isset($_SESSION['quantidadeProduto'])) {
        $_SESSION['quantidadeProduto'] = 0;
    }

    if (!isset($_SESSION['itens'])) {
        $_SESSION['quantidadeProduto'] = 0;
    }
    else{
        $_SESSION['quantidadeProduto'] = 0;
        foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
            $_SESSION['quantidadeProduto'] += $quantidade;       
        }
    }
?>