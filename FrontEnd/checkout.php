<?php
session_start();
setlocale(LC_MONETARY, "pt-br");

if(isset($_SESSION['user'])){
    $id = 1;
}else{
    $id = 0;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zillo's</title>


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="styles/Bootstrap/css/bootstrap.min.css">

        <!-- STYLE -->
        <link rel="stylesheet" href="styles/style.css">

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/efc6aff095.js" crossorigin="anonymous" defer></script>

        <!-- SCRIPT -->
        <script src="js/frontend.js"></script>
    </head>

    <body> <!-- BODY -->

        <header> <!-- Header -->

            <nav class="navbar navbar-expand-sm navbar-dark" id="navegacao"> <!-- Nav -->

                <div class="container"> <!-- Container -->

                    <a href="index.php" class="navbar-brand" id="logo">ZILLO'S</a> 

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="nav-principal"> <!-- Navbar -->

                        <ul class="navbar-nav ml-auto"> <!-- navbar Ul-->

                            <li class="nav-item"><a class="nav-link" id="selected" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://github.com/FeZillo">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link" href="produtos.php">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link" href="servicos.php">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link mr-1" href="contato.php">Contato</a></li>
                            <?php if(!isset($_SESSION['user'])){ ?>
                                <li class="nav-item"><a class="btn btn-outline-success d-block float-left mt-1 mr-2" href="cadastro.php">Cadastre-se</a></li>
                                <li class="nav-item"><a class="btn btn-outline-info d-block float-left mt-1" href="login.php">Login</a></li>
                            <?php }else{ ?>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $_SESSION['user'] ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="perfil.php">Perfil</a>
                                        <a class="dropdown-item" href="hidden/processa_pedidos.php">Meus Pedidos</a>
                                        <a class="dropdown-item text-dark bg-danger" href="hidden/logout.php?location=index">Sair</a>
                                    </div>
                                </div>
                                <div id="saldo" class="ml-2 text-white mt-2"><?=$_SESSION['saldo']?></div>
                                <script>
                                    let string = document.getElementById('saldo').innerHTML;
                                    let formatado = parseFloat(string).toLocaleString('pt-br', { minimumFractionDigits: 2 });
                                    document.getElementById('saldo').innerHTML = `Saldo: R$${formatado}`;
                                </script>
                            <?php } ?>
                            

                        </ul> <!-- /fim navbar Ul -->
                    </div> <!-- /fim navbar -->
                </div> <!-- /fim container -->
            </nav> <!-- /fim nav -->
        </header> <!-- /fim header -->

        <!-- VALORANT -->
        <?php if($_GET['game'] == 'valorant'){ ?>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="formulario bg-info">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de elojob por vez.</div>
                <?php } ?>
                <h3 class="vava">Valorant</h3>
                <div class="linha-preta"></div>
                
                <p><?=$_SESSION['rank_atual']?> -> <?=$_SESSION['rank_desejado']?></p>
                <p class="preco">Preço = R$<?= number_format($_SESSION['preco'],2,",","."); ?></p>
                <hr>
                <button class="btn btn-danger" id="bt-buy-vava" onclick="comprar('valorant', <?=$id?>, <?=$_SESSION['preco']?>, <?=$_SESSION['saldo']?>);">Comprar!</button>
                <button class="btn btn-dark" onclick="window.location.href='servicos/jogos/eloJob.php?game=valorant'">Voltar</button>
                <div class="alert alert-danger mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Faça Login antes de continuar!</div>
                <div class="alert alert-warning mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Saldo insuficiente!</div>
            </div>
        </div>

        <!-- LEAGUE OF LEGENDS -->
        <?php }else if($_GET['game'] == 'leagueoflegends'){ ?>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="formulario bg-info">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de elojob por vez.</div>
                <?php } ?>
                <h3 class="vava">League of Legends</h3>
                <div class="linha-preta"></div>
                
                <p><?=$_SESSION['rank_atual']?> -> <?=$_SESSION['rank_desejado']?></p>
                <p class="preco">Preço = R$<?= number_format($_SESSION['preco'],2,",","."); ?></p>
                <hr>
                <button class="btn btn-danger" id="bt-buy-lol" onclick="comprar('lol', <?=$id?>, <?=$_SESSION['preco']?>, <?=$_SESSION['saldo']?>);">Comprar!</button>
                <button class="btn btn-dark" onclick="window.location.href='servicos/jogos/eloJob.php?game=leagueoflegends'">Voltar</button>
                <div class="alert alert-danger mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Faça Login antes de continuar!</div>
                <div class="alert alert-warning mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Saldo insuficiente!</div>
            </div>
        </div>

        <!-- COUNTER-STRIKE -->
        <?php }else if($_GET['game'] == 'counterstrike'){ ?>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="formulario bg-info">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de elojob por vez.</div>
                <?php } ?>
                <h3 class="vava">CS: GO</h3>
                <div class="linha-preta"></div>
                
                <p><?=$_SESSION['rank_atual']?> -> <?=$_SESSION['rank_desejado']?></p>
                <p class="preco">Preço = R$<?= number_format($_SESSION['preco'],2,",","."); ?></p>
                <hr>
                <button class="btn btn-danger" id="bt-buy-cs" onclick="comprar('cs', <?=$id?>, <?=$_SESSION['preco']?>, <?=$_SESSION['saldo']?>);">Comprar!</button>
                <button class="btn btn-dark" onclick="window.location.href='servicos/jogos/eloJob.php?game=counterstrike'">Voltar</button>
                <div class="alert alert-danger mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Faça Login antes de continuar!</div>
                <div class="alert alert-warning mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Saldo insuficiente!</div>
            </div>
        </div>

        <!-- DEAD BY DAYLIGHT -->
        <?php }else if($_GET['game'] == 'deadbydaylight'){ ?>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="formulario bg-info">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de elojob por vez.</div>
                <?php } ?>
                <h3 class="vava">Dead By Daylight</h3>
                <div class="linha-preta"></div>
                
                <p><?=$_SESSION['funcao']?></p>
                <p><?=$_SESSION['rank_atual']?> -> <?=$_SESSION['rank_desejado']?></p>
                <p class="preco">Preço = R$<?= number_format($_SESSION['preco'],2,",","."); ?></p>
                <hr>
                <button class="btn btn-danger" id="bt-buy-dbd" onclick="comprar('dbd', <?=$id?>, <?=$_SESSION['preco']?>, <?=$_SESSION['saldo']?>);">Comprar!</button>
                <button class="btn btn-dark" onclick="window.location.href='servicos/jogos/eloJob.php?game=deadbydaylight'">Voltar</button>
                <div class="alert alert-danger mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Faça Login antes de continuar!</div>
                <div class="alert alert-warning mt-4" hidden><i class="fa-solid fa-circle-exclamation"></i> Saldo insuficiente!</div>
            </div>
        </div>

        <?php } ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="styles/Bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>