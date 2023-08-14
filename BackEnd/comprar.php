<?php

    require "../../BackEnd/conexao.php";
    require "../../BackEnd/user.php";
    require "../../BackEnd/precos.php";

    $game = isset($_GET['game']) ? $_GET['game'] : $game;
    session_start();

    if($_GET['game'] == 'valorant') { //VAVA
        $valorant = new Valorant($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado']);
        $preco = $valorant->calculaPreco();

        if($preco == -1) {
            header('location: ../servicos/jogos/eloJob.php?game=valorant&erro=1');
        }else{

            $recupera_nome = new Valorant($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado']);

            $_SESSION['rank_desejado'] = $recupera_nome->transcript[$_POST['rank_desejado']] . ' ' . $_POST['numero_desejado'];
            $_SESSION['rank_atual'] = $recupera_nome->transcript[$_POST['rank_atual']] . ' ' . $_POST['numero_atual'];
            $_SESSION['preco'] = $preco;

            header('location: ../checkout.php?game=valorant');
        }

    }else if($_GET['game'] == 'leagueoflegends'){ //LOLZIN
        
        $lol = new Lol($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado']);
        $preco = $lol->calculaPreco();

        if($preco == -1) {
            header('location: ../servicos/jogos/eloJob.php?game=leagueoflegends&erro=1');
        }else{

            $recupera_nome = new Lol($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado']);

            $_SESSION['rank_desejado'] = $recupera_nome->transcript[$_POST['rank_desejado']] . ' ' . $_POST['numero_desejado'];
            $_SESSION['rank_atual'] = $recupera_nome->transcript[$_POST['rank_atual']] . ' ' . $_POST['numero_atual'];
            $_SESSION['preco'] = $preco;

            header('location: ../checkout.php?game=leagueoflegends');
        }

    }else if($_GET['game'] == 'counterstrike'){

        $cs = new CounterStrike($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado']);
        $preco = $cs->calculaPreco();

        if($preco == -1) {
            header('location: ../servicos/jogos/eloJob.php?game=counterstrike&erro=1');
        }else{

            $recupera_nome = new CounterStrike($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado']);

            $_SESSION['rank_desejado'] = $recupera_nome->transcript[$_POST['rank_desejado']] . ' ' . $_POST['numero_desejado'];
            $_SESSION['rank_atual'] = $recupera_nome->transcript[$_POST['rank_atual']] . ' ' . $_POST['numero_atual'];
            $_SESSION['preco'] = $preco;

            header('location: ../checkout.php?game=counterstrike');
        }

    }else if($_GET['game'] == 'deadbydaylight'){

        $dbd = new DeadByDaylight($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado'], $_POST['funcao']);
        $preco = $dbd->calculaPreco();

        if($preco == -1) {
            header('location: ../servicos/jogos/eloJob.php?game=deadbydaylight&erro=1');
        }else{

            $recupera_nome = new DeadByDaylight($_POST['rank_atual'], $_POST['rank_desejado'], $_POST['numero_atual'], $_POST['numero_desejado'], $_POST['funcao']);
            $_SESSION['rank_desejado'] = $recupera_nome->transcript[$_POST['rank_desejado']] . ' ' . $_POST['numero_desejado'];
            $_SESSION['rank_atual'] = $recupera_nome->transcript[$_POST['rank_atual']] . ' ' . $_POST['numero_atual'];
            $_SESSION['funcao'] = $recupera_nome->transcript[$_POST['funcao']];
            $_SESSION['preco'] = $preco;

            header('location: ../checkout.php?game=deadbydaylight');
        }
        

    }
?>
