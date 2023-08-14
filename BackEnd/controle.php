<?php

    require "../../BackEnd/conexao.php";
    require "../../BackEnd/user.php";
    require "../../BackEnd/registra_usuarios.php";
    require "../../BackEnd/compras.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;
    session_start();

    if($action == 'cadastrar'){
        if($_POST['email'] == '' || $_POST['senha'] == '' || $_POST['user'] == ''){
            header('location: ../cadastro.php?all=false');
        }else {

            $hash_password = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $conexao = new Conexao();

            $user = new User();
            $user->__set('email', $_POST['email']);
            $user->__set('senha', $hash_password);
            $user->__set('user', $_POST['user']);

            $registro = new RegistraUsuarios($conexao, $user);
            $registro->cadastrar();
            }

    }else if($action == 'login'){
        $conexao = new Conexao();

        $user = new User();
        $user->__set('email', $_POST['email']);
        $user->__set('senha', $_POST['senha']);

        $registro = new RegistraUsuarios($conexao, $user);
        $registro->login();

    }else if($action == 'atualizar') {
        $conexao = new Conexao();

        $user = new User();
        $user->__set('email', $_SESSION['email']);
        $user->__set('user', $_SESSION['user']);

        $registro = new RegistraUsuarios($conexao, $user);
        $registro->atualizar();

    }else if($action == 'mudarSenha'){
        $conexao = new Conexao();

        $user = new User();
        $user->__set('email', $_SESSION['email']);
        $user->__set('user', $_SESSION['user']);

        $registro = new RegistraUsuarios($conexao, $user);
        $registro->atualizaSenha();
    }
?>