<?php include("partials/header.php"); ?>

<div id="wrapper">
    <header>
        <div id="promo">
            <h4>
                <span style="color:black" ;>
                    <i class="fa fa-star"></i></span>
                COMPRE E GANHE DESCONTO EM NOSSOS PRODUTOS
                <span style="color:black" ;>
                    <i class="fa fa-star"></i></span>
            </h4>

        </div>
        <div id="logo">
            <a href="index.php"><img src="images\pet_house_logo_mini.jpg"></a>
        </div>
        <div id="tpmenu">
            <nav id="topmenu">
                <ul>
                    <li><a href="brinquedo.php">Brinquedos</a></li>
                    <li><a href="moda_pet.php">Moda Pet</a></li>
                    <li><a href="racoes.php">Rações</a></li>
                    
                    <!--<li><a href="">Cadastre-se</a></li> -->
                </ul>
            </nav>


            <section id="icon">
                <ul class="fa-ul">
                    <li>
                        <span style="color:red;">
                            </a><i class="fa fa-user fa-2x"></i>
                        </span>
                        <a href="login.php">ENTRAR</a> / <a href="logout.php">SAIR</a>
                    </li>
                    <li><a href=""><i class="fa fa-shopping-cart fa-2x"></i>( 0 )</a></li>
                </ul>
                <!--<div class="login">
                        <i class="fa fa-user"></i><h3>ENTRAR</h3>
                    </div>
                    <div class="cart">

                    </div>
                    <div class="socials">
                    </div>
                -->
            </section>
        </div>

        <!-- tarja
            <div class="tarja">
                <h3>_____________________</br>
                    _____________________</h3>
            </div>
            -->
    </header>
    <!-- tarja -->
    <div class="tarja">
        <p>_______________</P>
    </div>
    <section id="banner">
        <div class="inner">
            <div class="logo">
                <img src="images\banner_racoes.jpg">

            </div>
        </div>
    </section>

    <main id="content">
        <nav class="setores">
            <ul>
                <li>
                    <h2>Setores</h2>
                </li>
                <li class="separador"></li>
                <li><a href="brinquedo.php">Brinquedos</a></li>
                <li class="separador"></li>
                <li><a href="moda_pet.php">Moda Pet</a></li>
                <li class="separador"></li>
                <li><a href="racoes.php">Rações</a></li>
                <li class="separador"></li>

            </ul>

        </nav>

        <?php
            $conexao = new PDO('mysql:host=localhost;dbname=pethouse',"root", "");
            $query = $conexao->prepare("SELECT * FROM produtos WHERE TipoDeProduto = 1");
            $query->execute();
            $produtos = $query->fetchAll();

            foreach($produtos as $produto) {
                echo 
                '<div class="prod">'
                    .'<a href=""><img src="images\racao\\'.$produto['NomeImagem'].'"></a>'
                    .'<p>'.$produto['Nome'].'</p>'
                    .'<p>Preco: R$ '.number_format($produto['Preco'],2,',','.').'</p>'
                    .'<a href="carrinho.php?add=carrinho&id='.$produto['Id'].'">Adicionar ao carrinho</a>'
                    .'</div>';
            }
        ?>

  
    </main>
</div>
</div>
<?php include("partials/footer.php"); ?>