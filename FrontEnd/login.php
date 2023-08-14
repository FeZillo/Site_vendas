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

                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://github.com/FeZillo">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link" href="produtos.php">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link" href="servicos.php">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link mr-1" href="contato.php">Contato</a></li>
                            <li class="nav-item"><a class="btn btn-outline-success d-block float-left mt-1 mr-2" href="cadastro.php">Cadastre-se</a></li>
                            <li class="nav-item"><a class="btn btn-info d-block float-left mt-1" href="login.php">Login</a></li>

                        </ul> <!-- /fim navbar Ul -->
                    </div> <!-- /fim navbar -->
                </div> <!-- /fim container -->
            </nav> <!-- /fim nav -->
        </header> <!-- /fim header -->

        <div class="container"> <!-- CONTAINER -->
            <div class="row"> <!-- ROW -->
                <div class="card-login"> <!-- CARD-LOGIN -->
                    <div class="card"> <!-- CARD -->
                        <div class="card-header"> <!-- CARD-HEADER -->
                            Login
                        </div> <!-- /fim card-header -->
                        <div class="card-body"> <!-- CARD-BODY -->

                            <form action="hidden/controle.php?action=login" method="post"> <!-- FORM -->
                                <div class="form-group"> <!-- FORM-GROUP -->
                                    <input name="email" type="email" class="form-control" placeholder="E-mail">
                                </div> <!-- /fim form-group -->
                                <div class="form-group"> <!-- FORM-GROUP -->
                                    <input name="senha" type="password" class="form-control" placeholder="Senha">
                                </div> <!-- /fim form-group -->

                                <?php if(isset($_GET['erro']) && $_GET['erro'] == '1'){ ?>
                                <small id="senhaInvalida" class="text-danger">
                                    Usuário e/ou senha invalido(s). Tente Novamente.
                                </small>
                                <?php }else if(isset($_GET['erro']) && $_GET['erro'] == '2'){ ?>
                                <div class="alert alert-warning">
                                    Conta restrita! Entre em contato com o suporte para saber mais.
                                </div>
                                <?php }else if(isset($_GET['erro']) && $_GET['erro'] == '3'){ ?>
                                <div class="alert alert-danger">
                                    Conta banida permanentemente.
                                </div>
                                <?php } ?>

                                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                            </form> <!-- /fim form -->

                        </div> <!-- /fim card-body -->
                    </div> <!-- /fim card -->
                </div> <!-- /fim card-login -->
            </div> <!-- /fim row -->
        </div> <!-- /fim container -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="styles/Bootstrap/js/bootstrap.min.js"></script>

    </body> <!-- /fim body -->

</html>