<?php
session_start();

$_GET['game'] = isset($_GET['game']) ? $_GET['game'] : 'valorant';
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
        <?php if($_GET['game'] == 'valorant'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- CONTAINER -->
            <form action="../../hidden/controle_compras.php?action=coach&jogo=valorant" method="post" class="formulario bg-info"> <!-- FORM -->
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de coach por vez.</div>
                <?php } ?>
                <div class="mb-3"> <!-- mb-3 -->
                    <h3 class="vava text-center">Valorant</h3>
                    <label for="rank">Qual o seu rank atual:</label>
                    <select name="rank" id="rank" class="bg-danger form-select mt-2" onchange="changeColor('valorant', this.value, this);" required> <!-- SELECT -->
                        <option selected disabled>Selecione</option>
                        <option value="iron" class="bg-white">Ferro</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="platinum" class="platinum">Platina</option>
                        <option value="diamond" class="diamond">Diamante</option>
                        <option value="ascendant" class="ascendant">Ascendente</option>
                        <option value="immortal" class="immortal">Imortal</option>
                    </select> <!-- /fim select -->
                    <input type="radio" class="mr-1" name="numero" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero" value="3" required>3

                    <hr>

                    <label for="funcao">Função principal no jogo:</label>
                    <select name="funcao" id="funcao" class="form-select" required>
                        <option selected disabled>Selecione</option>
                        <option value="controlador" class="black">Controlador</option>
                        <option value="iniciador">Iniciador</option>
                        <option value="duelista" class="black">Duelista</option>
                        <option value="sentinela">Sentinela</option>
                        <option value="nenhuma" class="black">Nenhuma</option>
                    </select>

                    <hr>

                    <label for="main">Digite o seu main:</label>
                    <input name="main" type="text" placeholder="Escolha apenas um" class="form-control" required> 
                </div> <!-- /fim mb-3 -->
                <?php if(isset($_SESSION['email']) && isset($_SESSION['user'])){ ?>
                <button class="btn btn-primary" type="submit">Enviar!</button>
                <?php }else{ ?>
                <button class="btn btn-primary disabled" type="submit">Enviar</button>
                <small class="text-danger">Faça login antes de continuar.</small>
                <?php } ?>
            </form> <!-- /fim form -->
        </div><!-- /fim container -->
            
        <!-- LEAGUE OF LEGENDS -->
        <?php }else if($_GET['game'] == 'leagueoflegends'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- CONTAINER -->
            <form action="../../hidden/controle_compras.php?action=coach&jogo=lol" method="post" class="formulario bg-info"> <!-- FORM -->
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de coach por vez.</div>
                <?php } ?>
                <div class="mb-3"> <!-- mb-3 -->
                    <h3 class="vava text-center">League Of Legends</h3>
                    <label for="rank">Qual o seu rank atual:</label>
                    <select name="rank" id="rank" class="bg-danger form-select mt-2" onchange="changeColor('lol', this.value, this);" required> <!-- SELECT -->
                        <option selected disabled>Selecione</option>
                        <option value="iron" class="bg-white">Ferro</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="platinum" class="platinum">Platina</option>
                        <option value="diamond" class="diamond-lol">Diamante</option>
                        <option value="master" class="diamond">Mestre</option>
                        <option value="grandmaster" class="immortal">Grão-mestre</option>
                    </select> <!-- /fim select -->
                    <input type="radio" class="mr-1" name="numero" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero" value="3" required>3

                    <hr>

                    <label for="funcao">Rota de preferência:</label>
                    <select name="funcao" id="funcao" class="form-select" required>
                        <option selected disabled>Selecione</option>
                        <option value="top" class="black">Topo</option>
                        <option value="jungle">Selva</option>
                        <option value="mid" class="black">Meio</option>
                        <option value="adc">Atirador</option>
                        <option value="sup" class="black">Suporte</option>
                        <option value="nenhuma">Não sei</option>
                    </select>

                    <hr>

                    <label for="main">Digite o seu main:</label>
                    <input name="main" type="text" placeholder="Escolha apenas um" class="form-control" required> 
                </div> <!-- /fim mb-3 -->
                <?php if(isset($_SESSION['email']) && isset($_SESSION['user'])){ ?>
                <button class="btn btn-primary" type="submit">Enviar!</button>
                <?php }else{ ?>
                <button class="btn btn-primary disabled" type="submit">Enviar</button>
                <small class="text-danger">Faça login antes de continuar.</small>
                <?php } ?>
            </form> <!-- /fim form -->
        </div><!-- /fim container -->

        <!-- COUNTER STRIKE -->
        <?php }else if($_GET['game'] == 'counterstrike'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- CONTAINER -->
            <form action="../../hidden/controle_compras.php?action=coach&jogo=cs" method="post" class="formulario bg-info"> <!-- FORM -->
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de coach por vez.</div>
                <?php } ?>
                <div class="mb-3"> <!-- mb-3 -->
                    <h3 class="vava text-center">Counter-Strike</h3>
                    <label for="rank">Qual o seu rank atual:</label>
                    <select name="rank" id="rank" class="bg-danger form-select mt-2" onchange="csgopatente(this.value, 'c');" required> <!-- SELECT -->
                        <option selected disabled>Selecione</option>
                        <option value="prata" class="black">Prata</option>
                        <option value="ouro" class="bg-white">Ouro</option>
                        <option value="ak" class="black">Ak</option>
                        <option value="xerife" class="bg-white">Xerife</option>
                        <option value="aguia" class="black">Águia</option>
                        <option value="supremo" class="bg-white">Supremo</option>
                    </select> <!-- /fim select -->

                    <span id="opt">
                    </span>

                    <hr>

                    <label for="funcao">Função principal no jogo:</label>
                    <select name="funcao" id="funcao" class="form-select">
                        <option selected disabled>Selecione</option>
                        <option value="entry" class="black">Entry Fragger</option>
                        <option value="support">Support</option>
                        <option value="rifler" class="black">Rifler</option>
                        <option value="awper">AWPer</option>
                        <option value="lurker" class="black">Lurker</option>
                        <option value="nenhuma">Não sei</option>
                    </select>

                    <hr>
                </div> <!-- /fim mb-3 -->
                <?php if(isset($_SESSION['email']) && isset($_SESSION['user'])){ ?>
                <button class="btn btn-primary" type="submit">Enviar!</button>
                <?php }else{ ?>
                <button class="btn btn-primary disabled" type="submit">Enviar</button>
                <small class="text-danger">Faça login antes de continuar.</small>
                <?php } ?>
            </form> <!-- /fim form -->
        </div><!-- /fim container -->

        <!-- DEAD BY DAYLIGHT -->
        <?php }else if($_GET['game'] == 'deadbydaylight'){ ?>
        <div class="container mt-4 d-flex justify-content-center"> <!-- CONTAINER -->
            <form action="../../hidden/controle_compras.php?action=coach&jogo=dbd" method="post" class="formulario bg-info"> <!-- FORM -->
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="alert alert-warning">Você só pode fazer um pedido de coach por vez.</div>
                <?php } ?>
                <div class="mb-3"> <!-- mb-3 -->
                    <h3 class="vava text-center">Dead By Daylight</h3>
                    <label for="rank">Qual o seu rank atual:</label>
                    <select name="rank" id="rank" class="bg-danger form-select mt-2" onchange="changeColor('dbd', this.value, this);" required> <!-- SELECT -->
                        <option selected disabled>Selecione</option>
                        <option value="ash" class="bg-white">Cinza</option>
                        <option value="bronze" class="bronze">Bronze</option>
                        <option value="silver" class="silver">Prata</option>
                        <option value="gold" class="gold">Ouro</option>
                        <option value="iridescent" class="iri">Iridescente</option>
                    </select> <!-- /fim select -->
                    <input type="radio" class="mr-1" name="numero" value="1" required>1
                    <input type="radio" class="mr-1 ml-2" name="numero" value="2" required>2
                    <input type="radio" class="mr-1 ml-2" name="numero" value="3" required>3
                    <input type="radio" class="mr-1 ml-2" name="numero" value="4" required>4
                    

                    <hr>

                    <label for="funcao">Função principal no jogo:</label>
                    <select name="funcao" id="funcao" class="form-select">
                        <option selected disabled>Selecione</option>
                        <option value="survivor" class="black">Sobrevivente</option>
                        <option value="killer">Assassino</option>
                        <option value="both" class="black">Ambos</option>
                    </select>

                    <label for="main">Digite o seu main:</label>
                    <input type="text" name="main" placeholder="Escolha apenas um" class="form-control">
                    <hr>
                </div> <!-- /fim mb-3 -->
                <?php if(isset($_SESSION['email']) && isset($_SESSION['user'])){ ?>
                <button class="btn btn-primary" type="submit">Enviar!</button>
                <?php }else{ ?>
                <button class="btn btn-primary disabled" type="submit">Enviar</button>
                <small class="text-danger">Faça login antes de continuar.</small>
                <?php } ?>
            </form> <!-- /fim form -->
        </div><!-- /fim container -->

        <?php } ?>
        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="../../styles/Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>