<?php
    session_start();
    
    if(isset($_GET['remover']) && $_GET['remover'] == "carrinho")
    {
        $idProduto = $_GET['id'];
        unset($_SESSION['itens'][$idProduto]);
        echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0;carrinho.php"/>';
    }