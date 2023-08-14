<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zillo's - Produtos</title>

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="styles/Bootstrap/css/bootstrap.min.css">

         <!-- STYLE -->
         <link rel="stylesheet" href="styles/style.css">
 
         <!-- FONT AWESOME -->
         <script src="https://kit.fontawesome.com/efc6aff095.js" crossorigin="anonymous" defer></script>
 
         <!-- SCRIPT -->
         <script src="js/frontend.js"></script>

    </head>

    <body>
    
        
        <header> <!-- Header -->

            <nav class="navbar navbar-expand-sm navbar-dark" id="navegacao"> <!-- Nav -->

                <div class="container"> <!-- Container -->

                    <a href="index.php" class="navbar-brand" id="logo">ZILLO'S</a> 

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="nav-principal"> <!-- Navbar -->

                        <ul class="navbar-nav ml-auto"> <!-- navbar Ul-->

                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://github.com/FeZillo">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link" id="selected" href="produtos.php">Produtos</a></li>
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
                                        <a class="dropdown-item" href="#">Perfil</a>
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

        <div class="container justify-content-center d-flex mt-5"> <!-- Container -->
            <div class="row"> <!-- Row -->

                <div class="col-md-6 col-sm-12 mb-5"> <!-- Col -->
                    <div class="card ml-3 mr-3" style="width: 19rem;"> <!-- Card -->
                        <img class="card-img-top imgcard" src="images/Program.jpg"> 
                        <div class="card-body"> <!-- Card Body -->
                            <h5 class="card-title">Cursos</h5>
                            <p class="card-text">Venha aprender programação do básico ao avançado!</p>
                            <a href="cursos.php" class="btn btn-primary">Obtenha</a>
                        </div> <!-- /fim card body-->
                    </div> <!-- /fim card -->
                </div> <!-- /fim col -->
                        

                <div class="col-md-6 col-sm-12 mb-5"> <!-- Col -->
                    <div class="card ml-3 mr-3" style="width: 19rem;"> <!-- Card -->
                        <img class="card-img-top imgcard" src="images/Site.jpg"> 
                        <div class="card-body"> <!-- Card Body -->
                            <h5 class="card-title">Sites e Programas</h5>
                            <p class="card-text">Precisa de um site próprio ou de algum outro programa?</p>
                            <a href="sites.php" class="btn btn-primary">Obtenha</a>
                        </div> <!-- /fim card body-->
                    </div> <!-- /fim card -->
                </div> <!-- /fim col -->

            </div> <!-- /fim row -->
        </div> <!-- /fim container -->
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="styles/Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>