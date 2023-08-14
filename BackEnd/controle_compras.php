<?php

    require "../../BackEnd/conexao.php";
    require "../../BackEnd/user.php";
    require "../../BackEnd/compras.php";
    require "../../BackEnd/registra_compras.php";
    require "../../BackEnd/registra_usuarios.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;


    function verificaSaldo($preco, $saldo){
        if($saldo >= $preco){
            return true;
        }
        return false;
    }

    session_start();

    if($action == "elojob"){

        if(!verificaSaldo($_SESSION['preco'], $_SESSION['saldo'])){
            $conexao = new Conexao();

            $user = new User();
            $user->__set('email', $_SESSION['email']);
            $user->setUserID($conexao);

            $adv = $user->getAdvertencia($conexao);

            $adv += 1;

            $query = "UPDATE userstb SET advertencia = " .$adv;
            $stmt = $conexao->prepare($query);
            $stmt->execute();

            if($adv >= 3){
                $registro = new RegistraUsuarios($conexao, $user);
                $registro->restringirConta();
                session_destroy();
                header('http://localhost/FrontEnd/login.php?erro=2');
            }else if($adv >= 10){
                $registro = new RegistraUsuarios($conexao, $user);
                $registro->banirConta();
                session_destroy();
                header('http://localhost/FrontEnd/login.php?erro=3');
            }
        }

        switch($_GET['jogo']){
            case 'valorant':
                $game = 'Valorant';
                break;
            case 'lol':
                $game = 'League of Legends';
                break;
            case 'cs':
                $game = 'Counter Strike';
                break;
            case 'dbd':
                $game = 'Dead By Daylight';
                break;
        }


         $conexao = new Conexao();

         $user = new User();
         $user->__set('email', $_SESSION['email']);
         $user->__set('user', $_SESSION['user']);
         $user->setUserID($conexao);
         $user->setUserSaldo($conexao);

         $compra = (new Compra)->setProduto('elojob')
                                ->setValor($_SESSION['preco'])
                                ->setCompradorID($user->__get('id'));
        
        
        $registro = new RegistraCompras($conexao, $compra, $user);

        if(!$registro->checkElojob()){
            header('location: ../checkout.php?erro=1');
        }else{

            $registro->cadastrarCompra();

            $compraElojob = (new EloJobCompras)->setCompradorID($user->__get('id'))
                                                ->setCompraID($compra->getCompraID($conexao->conectar()))
                                                ->setRankAtual($_SESSION['rank_atual'])
                                                ->setRankDesejado($_SESSION['rank_desejado'])
                                                ->setValor($_SESSION['preco'])
                                                ->setJogo($game);

            $registro->cadastrarElojob($compraElojob, $conexao);

            $saldo = $_SESSION['saldo'] - $_SESSION['preco'];
            $user->__set('saldo', $saldo);

            unset($_SESSION['rank_desejado']);
            unset($_SESSION['rank_atual']);
            unset($_SESSION['preco']);
            $_SESSION['saldo'] = $saldo;

            header('location: http://localhost/FrontEnd/index.php?compra=true');
        }

    }else if($action == "coach"){

        $_POST['main'] = isset($_POST['main']) ? $_POST['main'] : 'nenhum';

        switch($_GET['jogo']){
            case 'valorant':
                $game = 'Valorant';
                break;
            case 'lol':
                $game = "League of Legends";
                break;
            case 'cs':
                $game = "Counter Strike";
                break;
            case 'dbd':
                $game = "Dead By Daylight";
                break;
        }

        $_POST['main'] = strtolower($_POST['main']);

        $conexao = new Conexao();

        $user = new User();
        $user->__set('email', $_SESSION['email']);
        $user->__set('user', $_SESSION['user']);
        $user->setUserID($conexao);
        $user->setUserSaldo($conexao);

        $compra = (new Compra)->setProduto('coach')
                                ->setValor(0)
                                ->setCompradorID($user->__get('id'));

        $registro = new RegistraCompras($conexao, $compra, $user);

        if(!$registro->checkCoach()){
            header('location: ../servicos/jogos/coach.php?erro=1');
        }else{

            $registro->cadastrarCompra();

            $compraCoach = (new CoachCompras)->setUserID($user->__get('id'))
                                            ->setCompraID($compra->getCompraID($conexao->conectar()))
                                            ->setJogo($game)
                                            ->setElo($_POST['rank'])
                                            ->setFuncao($_POST['funcao'])
                                            ->setMain($_POST['main']);

            $registro->cadastrarCoach($compraCoach);
            header('location: http://localhost/FrontEnd/index.php?compra=coach');
        }
    }

?>