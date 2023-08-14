<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zillo's - Jogos</title>

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="../../styles/Bootstrap/css/bootstrap.min.css">

         <!-- STYLE -->
         <link rel="stylesheet" href="../../styles/style.css">
         <link rel="stylesheet" href="../../styles/jogos.css">
         <link rel="stylesheet" href="../../styles/customselect.css">

         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 
         <!-- FONT AWESOME -->
         <script src="https://kit.fontawesome.com/efc6aff095.js" crossorigin="anonymous" defer></script>
 
         <!-- SCRIPT -->
         <script src="../../js/frontend.js"></script>
         <script src="../../js/select.js" defer></script>

    </head>
    
    <body>
        
        <header> <!-- Header -->

            <nav class="navbar navbar-expand-sm navbar-dark" id="navegacao"> <!-- Nav -->

                <div class="container"> <!-- Container -->

                    <a href="../../index.php" class="navbar-brand" id="logo">ZILLO'S</a> 

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="nav-principal"> <!-- Navbar -->

                        <ul class="navbar-nav ml-auto"> <!-- navbar Ul-->

                            <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://github.com/FeZillo">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../produtos.php">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link" id="selected" href="../../servicos.php">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link mr-1" href="../../contato.php">Contato</a></li>
                              <?php if(!isset($_SESSION['user'])){ ?>
                                <li class="nav-item"><a class="btn btn-outline-success d-block float-left mt-1 mr-2" href="../../cadastro.php">Cadastre-se</a></li>
                                <li class="nav-item"><a class="btn btn-outline-info d-block float-left mt-1" href="../../login.php">Login</a></li>
                            <?php }else{ ?>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $_SESSION['user'] ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="../../perfil.php">Perfil</a>
                                        <a class="dropdown-item" href="../../hidden/processa_pedidos.php">Meus Pedidos</a>
                                        <a class="dropdown-item text-dark bg-danger" href="../../hidden/logout.php?location=index">Sair</a>
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
        <?php if(isset($_GET['game']) && $_GET['game'] == 'valorant'){ ?>      
        <div class="container mt-4 d-flex justify-content-center"> <!-- Container -->  
            <form class="formulario bg-info" action="../../hidden/comprar.php?game=valorant" method="post">
                <div class="mb-3">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?><div class="alert alert-danger" role="alert">O rank desejado deve ser maior que o atual!</div><?php } ?>
                <h3 class="vava text-center">Valorant</h3>
                    <label for="rank-atual" class="form-label text-dark mt-2">Qual o seu rank atual:</label>
                    <select name="rank_atual" id="rank-atual" class="bg-danger form-select mt-2" id="valorantselectA" onchange="changeColor('valorant', this.value, this);" required>
                        <option selected disabled>Selecione</option>
                        <option value="iron" class="bg-white">Ferro</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="platinum" class="platinum">Platina</option>
                        <option value="diamond" class="diamond">Diamante</option>
                        <option value="ascendant" class="ascendant">Ascendente</option>
                        <option value="immortal" class="immortal">Imortal</option>
                    </select>
                    <input type="radio" class="mr-1" name="numero_atual" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero_atual" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero_atual" value="3" required>3

                    <hr>
                    <label for="rank-desejado">Rank desejado:</label>
                    <select name="rank_desejado" id="rank-desejado" class="bg-success form-select form-control mt-2" id="valorantselectD" onchange="changeColor('valorant', this.value, this);" required>
                        <option selected disabled>Selecione</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="platinum"  class="platinum">Platina</option>
                        <option value="diamond" class="diamond">Diamante</option>
                        <option value="ascendant" class="ascendant">Ascendente</option>
                        <option value="immortal" class="immortal">Imortal</option>
                    </select>

                    <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="3" required>3
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div> <!-- /fim container -->

        <!-- LEAGUE OF LEGENDS -->
        <?php }else if(isset($_GET['game']) && $_GET['game'] == 'leagueoflegends'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- Container -->  
            <form class="formulario bg-info" action="../../hidden/comprar.php?game=leagueoflegends" method="post">
                <div class="mb-3">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?><div class="alert alert-danger" role="alert">O rank desejado deve ser maior que o atual!</div><?php } ?>
                <h3 class="vava text-center">League of Legends</h3>
                    <label for="rank-atual" class="form-label text-dark mt-2">Qual o seu rank atual:</label>
                    <select name="rank_atual" id="rank-atual" class="bg-danger form-select form-control mt-2" onchange="leagueoflegends(this.value, 'a', this);" required>
                        <option selected disabled>Selecione</option>
                        <option value="iron" class="bg-white">Ferro</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="platinum" class="platinum">Platina</option>
                        <option value="diamond" class="diamond-lol">Diamante</option>
                        <option value="master" class="diamond">Mestre</option>
                        <option value="grandmaster" class="immortal">Grão-Mestre</option>
                    </select>
                    <span id="lolElosA">
                        <input type="radio" class="mr-1" name="numero_atual" value="1" id="1a" required>1
                        <input type="radio" class="mr-1 ml-2" name="numero_atual" value="2" id="2a" required>2
                        <input type="radio" class="mr-1 ml-2" name="numero_atual" value="3" id="3a" required>3
                        <input type="radio" class="mr-1 ml-2" name="numero_atual" value="4" id="4a" required>4
                    </span>


                    <hr>
                    <label for="rank-desejado">Rank desejado:</label>
                    <select name="rank_desejado" id="rank-desejado" class="bg-success form-select form-control mt-2" onchange="leagueoflegends(this.value, 'd', this);" required>
                        <option selected disabled>Selecione</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="platinum"  class="platinum">Platina</option>
                        <option value="diamond" class="diamond-lol">Diamante</option>
                        <option value="master" class="diamond">Mestre</option>
                        <option value="grandmaster" class="immortal">Grão-Mestre</option>
                    </select>

                    <span id="lolElosD">
                        <input type="radio" class="mr-1" name="numero_desejado" value="1" id="1d" required>1
                        <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="2" id="2d" required>2
                        <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="3" id="3d" required>3
                        <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="4" id="4d" required>4
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div> <!-- /fim container -->

        
        <?php }else if(isset($_GET['game']) && $_GET['game'] == 'counterstrike'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- Container -->  
            <form class="formulario bg-info" action="../../hidden/comprar.php?game=counterstrike" method="post">
                <div class="mb-3">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?><div class="alert alert-danger" role="alert">O rank desejado deve ser maior que o atual!</div><?php } ?>
                <h3 class="vava text-center">Counter-Strike: GO</h3>
                    <label for="rank-atual" class="form-label text-dark mt-2">Qual o seu rank atual:</label>
                    <select name="rank_atual" id="rank-atual" class="bg-danger form-select form-control mt-2 mb-1" onchange="csgopatente(this.value, 'a');" required>
                        <option selected disabled>Selecione</option>
                        <option value="prata" class="black">Prata</option>
                        <option value="ouro" class="bg-white">Ouro</option>
                        <option value="ak" class="black">Ak</option>
                        <option value="xerife" class="bg-white">Xerife</option>
                        <option value="aguia" class="black">Águia</option>
                        <option value="supremo" class="bg-white">Supremo</option>
                    </select>

                    <span id="opcoes"></span>

                    <hr>
                    <label for="rank-desejado">Rank desejado:</label>
                    <select name="rank_desejado" id="rank-desejado" class="bg-success form-select form-control mt-2 mb-1" onchange="csgopatente(this.value, 'd');" required>
                    <option selected disabled>Selecione</option>
                        <option value="prata" class="black">Prata</option>
                        <option value="ouro" class="bg-white">Ouro</option>
                        <option value="ak" class="black">Ak</option>
                        <option value="xerife" class="bg-white">Xerife</option>
                        <option value="aguia" class="black">Águia</option>
                        <option value="supremo" class="bg-white">Supremo</option>
                        <option value="global" class="black">Global</option>
                    </select>

                    <span id="opcoes_d"></span>

                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div> <!-- /fim container -->

        <?php }else if(isset($_GET['game']) && $_GET['game'] == 'deadbydaylight'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- Container -->  
            <form class="formulario bg-info" action="../../hidden/comprar.php?game=deadbydaylight" method="post">
                <div class="mb-3">
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?><div class="alert alert-danger" role="alert">O rank desejado deve ser maior que o atual!</div><?php } ?>
                <h3 class="vava text-center">Dead By Daylight</h3>
                    <label for="rank-atual" class="form-label text-dark mt-2">Qual o seu rank atual:</label>
                    <select name="rank_atual" id="rank-atual" class="bg-danger form-select form-control mt-2 mb-1" onchange="changeColor('dbd', this.value, this);" required>
                        <option selected disabled>Selecione</option>
                        <option value="ash" class="bg-white">Cinza</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="iridescent" class="iri">Iridescente</option>
                    </select>
                    <input type="radio" class="mr-1" name="numero_atual" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero_atual" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero_atual" value="3" required>3
                    <input type="radio" class="mr-1 ml-2" name="numero_atual" value="4" required>4

                    <hr>
                    <label for="rank-desejado">Rank desejado:</label>
                    <select name="rank_desejado" id="rank-desejado" class="bg-success form-select form-control mt-2 mb-1" onchange="changeColor('dbd', this.value, this);" required>
                        <option selected disabled>Selecione</option>
                        <option value="ash" class="bg-white">Cinza</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="iridescent" class="iri">Iridescente</option>
                    </select>
                    <input type="radio" class="mr-1" name="numero_desejado" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="3" required>3
                    <input type="radio" class="mr-1 ml-2" name="numero_desejado" value="4" required>4

                    <hr>
                    <label for="funcao">Função:</label>
                    <select name="funcao" id="funcao" class="bg-secondary text-light form-select form-control mt-2 mb-1" required>
                        <option selected disabled>Selecione</option>
                        <option value="killer">Assassino</option>
                        <option value="survivor">Sobrevivente</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div> <!-- /fim container -->
        <?php } ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="../../styles/Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>