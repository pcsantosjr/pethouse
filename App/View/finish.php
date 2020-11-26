<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="app/view/assets/css/main.css" />
</head>

<body>
    <div class="tarja">
        <p>_______________</P>
    </div>
    <div class="cart">
        <div class="page-header">
            <h1 class="text-center">Carrinho</h1>
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
                    <td colspan="4"><b class="text-success">TOTAL</b></td>
                    <td><b class="text-success">R$ <?php echo number_format($cartTotal, 2, ',', '.') ?></b></td>
                    <td></td>
                </tr>
                
                </tfood>
                <tbody>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?php echo $item->getProduct()->getName() ?></td>
                            <td><?php echo $item->getQuantity() ?>" />                                
                            <td>R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.') ?></td>
                            <td>R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.') ?></td>                            
                        </tr>
                    <?php endforeach; ?>

                </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4"><b class="text-success">TOTAL</b></td>
                    <td></td>
                    <td></td>
                </tr>
                
                </tfood>
                <tbody>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?php echo $item->getProduct()->getName() ?></td>
                            <td><?php echo $item->getQuantity() ?>" />                                
                            <td>R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.') ?></td>
                            <td>R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.') ?></td>                            
                        </tr>
                    <?php endforeach; ?>

                </tbody>
        </table>
                
    </div>
    <div class="tarja">
        <p>_______________</P>
    </div>
</body>

</html>