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

                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://github.com/FeZillo">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link" href="produtos.php">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link" href="servicos.php">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link mr-1" id="selected" href="contato.php">Contato</a></li>
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

        <div class="container">  
        
			<div class="py-3 text-center">
				<a href="index.php" id="logo-contato">ZILLO'S</a> 
				<h2 class="text-white">Envie um e-mail para mim!</h2>
				<p class="lead text-white">Ou entre em contato no nosso WhatsApp: +55 (12) 99613-4563</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
                    <?php if(isset($_GET['send']) && $_GET['send'] == 'success'){?> 
                        <div class="alert alert-success">Email enviado com sucesso!</div>
                    <?php }else if(isset($_GET['send']) && $_GET['send'] == 'error'){ ?>
                        <div class="alert alert-danger">Ocorreu um erro ao processar o email.</div> 
                    <?php }else if(isset($_GET['error']) && $_GET['error'] == 'login'){ ?>
                        <div class="alert alert-warning">Precisa fazer login para enviar o email.</div>
                    <?php } ?>
					<div class="card-body font-weight-bold">
						<form action="hidden/envia_emails.php" method="post">
							<div class="form-group">
								<label for="para" class="text-white">Para</label>
								<input name="para" type="text" class="form-control" id="para" value="suportetecnicositefelipe@gmail.com" disabled>
							</div>

							<div class="form-group">
								<label for="assunto" class="text-white">Assunto</label>
								<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="mensagem" class="text-white">Mensagem</label>
								<textarea name="mensagem" class="form-control" id="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-outline-light btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="styles/Bootstrap/js/bootstrap.min.js"></script>

    </body> <!-- /fim body -->

</html>