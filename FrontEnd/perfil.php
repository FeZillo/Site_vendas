<?php
session_start();
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
                                        <a class="dropdown-item" href="">Perfil</a>
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

        
        <!-- PIX -->
        <?php if(isset($_GET['pix']) && isset($_SESSION['QRCode']) && $_GET['pix']) { ?>
        <div class="container"> <!-- CONTAINER -->
            <div class="row"> <!-- ROW -->
                
                <div class="card-perfil"> <!-- CARD-LOGIN -->
                
                    <div class="card"> <!-- CARD -->
                        <div class="card-header"> <!-- CARD-HEADER -->
                            <?=$_SESSION['user']?>
                        </div> <!-- /fim card-header -->
                        <div class="card-body"> <!-- CARD-BODY -->
            

                            <form action="hidden/controle.php?action=atualizar" method="post" id="form"> <!-- FORM -->
                                <div class="form-group"> <!-- FORM-GROUP -->
                                    <label for="email" id="lmail">E-mail:</label>
                                    <input name="email" type="email" id="email" class="form-control" value="<?=$_SESSION['email']?>" onblur="verificaEmail(this.value);" disabled>
                                    <small id="email_sem_gmail" class="text-danger" hidden>E-mail inválido!</small>
                                </div> <!-- /fim form-group -->
                                <div class="form-group"> <!-- FORM-GROUP -->
                                    <label for="username" id="luser">Username:</label>
                                    <input id="username" name="user" type="text" class="form-control" value="<?=$_SESSION['user']?>" disabled>
                                </div> <!-- /fim form-group -->

                                <div id="confirmacao-senha"></div>

                                <div id="botoes">
                                    <button class="btn btn-info" type="button" onclick="alterarDados();" id="b1">Alterar Dados</button>
                                    <button class="btn btn-info float-right" type="button" onclick="alterarSenha();" id="b2">Alterar Senha</button>
                                </div>

                                <?php if(isset($_GET['success']) && $_GET['success'] == 1){ ?>
                                    <div class="alert alert-lg alert-success mt-3 text-center">
                                        Alterações salvas com sucesso!
                                    </div>
                                <?php }else if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                                    <div class="alert alert-lg alert-danger mt-3 text-center">
                                        E-mail já cadastrado!
                                    </div>
                                <?php }else if(isset($_GET['success']) && $_GET['success'] == 2){ ?>
                                    <div class="alert alert-lg alert-success mt-3 text-center">
                                        Senha alterada com sucesso!
                                    </div>
                                <?php }else if(isset($_GET['erro']) && $_GET['erro'] == 2){ ?>
                                    <div class="alert alert-lg alert-danger mt-3 text-center">
                                        A senha atual está incorreta.
                                    </div>
                                <?php } ?>


                                <div class="linha-preta"></div>

                                <div class="form-group">
                                    <label for="saldoi">Saldo:</label>
                                    <input type="text" id="saldoi" class="form-control" value="<?=$_SESSION['saldo']?> (+ <?=$_SESSION['valor']?>)" disabled>
                                </div>
                                <div id="x" class="text-center">
                                    <h3>Adicionar R$<?= $_SESSION['valor']?></h3>
                                    <img src="data:image/png;base64, <?=base64_encode($_SESSION['QRCode'])?>">
                                    <p>Código Copia e Cola:</p>
                                    <p id="copy"><?=$_SESSION['codigo']?></p> <button class="btn btn-sm btn-light" type="button" onclick="copyToClipboard();"><i class="fa-solid fa-copy"></i></button>
                                </div>
                            </form> <!-- /fim form -->

                        </div> <!-- /fim card-body -->
                    </div> <!-- /fim card -->
                </div> <!-- /fim card-login -->
            </div> <!-- /fim row -->
        </div> <!-- /fim container -->

        <?php }else { ?>
        <div class="container"> <!-- CONTAINER -->
            <div class="row"> <!-- ROW -->
                
                <div class="card-login"> <!-- CARD-LOGIN -->
                
                    <div class="card"> <!-- CARD -->
                        <div class="card-header"> <!-- CARD-HEADER -->
                            <?=$_SESSION['user']?>
                        </div> <!-- /fim card-header -->
                        <div class="card-body"> <!-- CARD-BODY -->
            

                            <form action="hidden/controle.php?action=atualizar" method="post" id="form"> <!-- FORM -->
                                <div class="form-group"> <!-- FORM-GROUP -->
                                    <label for="email" id="lmail">E-mail:</label>
                                    <input name="email" type="email" id="email" class="form-control" value="<?=$_SESSION['email']?>" onblur="verificaEmail(this.value);" disabled>
                                    <small id="email_sem_gmail" class="text-danger" hidden>E-mail inválido!</small>
                                </div> <!-- /fim form-group -->
                                <div class="form-group"> <!-- FORM-GROUP -->
                                    <label for="username" id="luser">Username:</label>
                                    <input id="username" name="user" type="text" class="form-control" value="<?=$_SESSION['user']?>" disabled>
                                </div> <!-- /fim form-group -->

                                <div id="confirmacao-senha"></div>

                                <div id="botoes">
                                    <button class="btn btn-info" type="button" onclick="alterarDados();" id="b1">Alterar Dados</button>
                                    <button class="btn btn-info float-right" type="button" onclick="alterarSenha();" id="b2">Alterar Senha</button>
                                </div>

                                <?php if(isset($_GET['success']) && $_GET['success'] == 1){ ?>
                                    <div class="alert alert-lg alert-success mt-3 text-center">
                                        Alterações salvas com sucesso!
                                    </div>
                                <?php }else if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                                    <div class="alert alert-lg alert-danger mt-3 text-center">
                                        E-mail já cadastrado!
                                    </div>
                                <?php }else if(isset($_GET['success']) && $_GET['success'] == 2){ ?>
                                    <div class="alert alert-lg alert-success mt-3 text-center">
                                        Senha alterada com sucesso!
                                    </div>
                                <?php }else if(isset($_GET['erro']) && $_GET['erro'] == 2){ ?>
                                    <div class="alert alert-lg alert-danger mt-3 text-center">
                                        A senha atual está incorreta.
                                    </div>
                                <?php } ?>


                                <div class="linha-preta"></div>

                                <div class="form-group">
                                    <label for="saldoi">Saldo:</label>
                                    <input type="text" id="saldoi" class="form-control" value="<?=$_SESSION['saldo']?>" disabled>
                                </div>
                                <div id="x" class="text-center">
                                    <button class="btn btn-info btn-block" type="button" onclick="adicionarSaldo();" id="bt-saldo">Adicionar Saldo</button>
                                </div>
                            </form> <!-- /fim form -->

                        </div> <!-- /fim card-body -->
                    </div> <!-- /fim card -->
                </div> <!-- /fim card-login -->
            </div> <!-- /fim row -->
        </div> <!-- /fim container -->
        <?php } ?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="styles/Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>