<?php
session_start();
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = array();
}

/*Adicionada itens ao carrinho */
if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
    $idProduto = $_GET['id'];
    if (!isset($_SESSION['itens'][$idProduto])) {
        $_SESSION['itens'][$idProduto] = 1;
    } 
    else {
        $_SESSION['itens'][$idProduto] += 1;
    }
}
include("partials/header2.php");
/*Mostra o carrinho*/
/* botão para voltar que fica junto ao carrinho vazio 
<a href="index.php" class="btn btn-success">Continuar comprando</a>*/
if (count($_SESSION['itens']) == 0) {
    echo '<h4 class="text-warning text-center">Carrinho Vazio</h4><br>';
} 
else {
    $conexao = new PDO('mysql:host=localhost;dbname=pethouse', "root", "");
    echo json_encode($_SESSION['itens']);
    foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
        $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
        $select->bindParam(1, $idProduto);
        $select->execute();
        $produtos = $select->fetchAll();
        $total = $quantidade * $produtos[0]["Preco"];

        
        echo
            '<div class="container"><h5>Nome: ' . $produtos[0]["Nome"] . '<br/>
        Preço: ' . number_format($produtos[0]["Preco"], 2, ",", ".") . '<br/>
        Quantidade: ' . $quantidade . '</h5><br/><hr/>
        <h4 class="text-success">Total : ' . number_format($total, 2, ",", ".") . '</h4><br/>
        <a href="remover.php?remover=carrinho&id=' . $idProduto . '" class="btn btn-warning">Remover Item da lista</a>
        <hr/>
        </div>
        ';
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
<?php include("partials/footer2.php"); ?>