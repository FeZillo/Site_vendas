<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
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

        <div class="container"> <!-- Container -->
            <div class="row"> <!-- Row -->
                <div class="col-md-12 d-flex justify-content-center"> <!-- Col -->
                    <p id="bordao">Transformando Sonhos em Realidade</p>
                </div> <!-- /fim col -->
            </div> <!-- /fim row -->

            <?php if(isset($_GET['compra']) && $_GET['compra'] == 'true'){ ?>
            <div class="alert alert-success text-center">Compra realizada com sucesso!</div>
            <?php }else if(isset($_GET['compra']) && $_GET['compra'] == 'coach'){ ?>
            <div class="alert alert-success text-center">Pedido Realizado. Entraremos em contato em breve!</div>
            <?php } ?>

            <div class="row"> <!-- Row -->
                <div class="col-md-12"> <!-- Col -->
                    <div id="carousel" class="carousel slide" data-ride="carousel"><!-- Carousel -->

                        <!-- Indicadores -->
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#carousel" data-slide-to="0"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                            <li data-target="#carousel" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner"> <!-- Carousel Inner -->
                            
                            <div class="carousel-item imagec active"> <!-- Item -->
                                <a href=""><img src="images/Program.jpg" class="img-fluid"></a>
                                <div class="carousel-caption">
                                    <a href=""><h3 class="text-white bg-dark">Aprenda a Programar</h3></a>
                                </div>
                            </div> <!-- /fim item -->

                            <div class="carousel-item imagec"> <!-- Item -->
                                <a href=""><img src="images/Valorant.webp" class="img-fluid"></a>
                                <div class="carousel-caption">
                                    <a href=""><h3 class="text-white bg-dark">Melhore sua Gameplay</h3></a>
                                </div>
                            </div> <!-- /fim item -->

                            <div class="carousel-item imagec"> <!-- Item -->
                                <a href=""><img src="images/campeonato.jpg" class="img-fluid" ></a>
                                <div class="carousel-caption">
                                    <a href=""><h3 class="text-white bg-dark">Participe de Campeonatos</h3></a>
                                </div>
                            </div> <!-- /fim item -->

                            <div class="carousel-item imagec"> <!-- Item -->
                                <a href=""><img src="images/Site.jpg" class="img-fluid"></a>
                                <div class="carousel-caption">
                                    <a href=""><h3 class="text-white bg-dark">Obtenha seu Site</h3></a>
                                </div>
                            </div> <!-- /fim item -->

                        </div> <!-- /fim inner -->

                        <!--Controles-->
                        <a href="#carousel" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a href="#carousel" class="carousel-control-next" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div> <!-- /fim carousel -->
                </div> <!-- /fim col -->
            </div> <!-- /fim row -->
        </div> <!-- /fim contianer -->        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="styles/Bootstrap/js/bootstrap.min.js"></script>

    </body> <!-- /fim body -->

</html>