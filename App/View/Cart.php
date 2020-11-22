<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Carrinho</h1>
        <a href="index.php" class="btn btn-default">Home</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4"><b>TOTAL</b></td>
                <td><b>R$ <?php echo number_format($cartTotal, 2, ',', '.') ?></b></td>
                <td></td>
            </tr>
        </tfood>
        <tbody>
        <?php foreach($cartItems as $item) : ?>
            <tr>
                <td><?php echo $item->getProduct()->getId()?></td>
                <td><?php echo $item->getProduct()->getName()?></td>
                <td>
                    <form action="index.php?page=cart&action=update" method="post">
                        <input name="id" type="hidden" value="<?php echo $item->getProduct()->getId()?>" />
                        <input type="text" size="2" name="quantity" value="<?php echo $item->getQuantity()?>" />
                        <button type="submit" class="btn btn-primary btn-xs">Alterar</button>
                    </form>
                <td>R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.')?></td>
                <td>R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.')?></td>
                <td>
                    <a href="index.php?page=cart&action=delete&id=<?php echo $item->getProduct()->getId()?>" class="btn btn-danger">Remover</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>