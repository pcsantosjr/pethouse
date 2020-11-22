<?php
session_start();
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = array();
}

/*Adicionada itens ao carrinho */
if (isset($_GET['add'])) {
    if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
         $idProduto = intval($_GET['id']);
         if(!isset($_SESSION ['itens'][$idProduto])){
        $_SESSION['itens'][$idProduto] = 1;
    } 
    else {
        $_SESSION['itens'][$idProduto] += 1;
    }
}
}

//REMOVER CARRINHO
if(isset($_GET['remover']) && $_GET['remover'] == "carrinho"){
    $idProduto = intval($_GET['id']);
    if(isset($_SESSION['itens'][$idProduto])){
        unset($_SESSION['itens'][$idProduto]);
    }
    if(count($_SESSION['itens']) == 0)
    {
        echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0;index.php"/>';
    } 
    else 
    {
        echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0;carrinho.php"/>';
    }      
} 

//ALTERAR QUANTIDADE
if($_GET['add'] == 'up'){
    if(is_array($_POST['quantidadeProduto'])){
        foreach($_POST['quantidadeProduto'] as $idProduto => $quantidade){
            $idProduto = intval($idProduto);
            $quantidade = intval($quantidade);
                if(!empty($quantidade) || $quantidade <> 0){
                    $_SESSION['itens'][$idProduto] = $quantidade;
                } 
                else {
                    unset($_SESSION['itens'][$idProduto]);
                }
        }
    }
}
    
include("app/partials/header2.php");
/*Mostra o carrinho*/
/* botão para voltar que fica junto ao carrinho vazio 
<a href="index.php" class="btn btn-success">Continuar comprando</a>*/
if (count($_SESSION['itens']) == 0) {
    echo '<h4 class="text-warning text-center">Carrinho Vazio</h4><br>';
} 
else {
    $conexao = new PDO('mysql:host=localhost;dbname=pethouse', "root", "");
    foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
        $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
        $select->bindParam(1, $idProduto);
        $select->execute();
        $produtos = $select->fetchAll();
        $subtotal = $quantidade * $produtos[0]["Preco"];

        $total += $subtotal;
        
        echo
            '<div class="container"><h5>Nome: ' . $produtos[0]["Nome"] . '<br/>
        Preço: ' . number_format($produtos[0]["Preco"], 2, ",", ".") . '<br/>
        Quantidade: ' . $quantidade . '</h5><br/><hr/>
        <h4 class="text-success">Subtotal : ' . number_format($subtotal, 2, ",", ".") . '</h4><br/>
        <a href="carrinho.php?remover=carrinho&id=' . $idProduto . '" class="btn btn-warning">Remover Item da lista</a>
        <hr/>
        </div>
        ';

        $total = number_format($total, 2, ",", ".");
        echo '<tr>
                <td colspan ="4">Total</td>
                <td> R$ '.$total.'</td>
            </tr>';
    }
    
}

    /*echo 'Subtotal: ' . number_format($subtotal, 2, ",", ".") . ''; */
?>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <a href="javascript:history.back()" class="btn btn-danger">Continuar comprando</a>
        </div>   
        <div class="col-6">   
            <a href="finalizar.php" class="btn btn-success">Finalizar Compra</a>
        </div>
    </div>
</div>
<?php include("app/partials/footer2.php"); ?>