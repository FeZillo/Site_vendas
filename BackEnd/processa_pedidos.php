<?php

    require "../../BackEnd/user.php";
    require "../../BackEnd/conexao.php";

    session_start();
    class Pedido{
        private $id;
        private $produto;
        private $valor;
        private $status;


        //GETTERS
        public function getId(){
            return $this->id;
        }

        public function getProduto(){
            return $this->produto;
        }

        public function getValor(){
            return $this->valor;
        }

        public function getStatus(){
            return $this->status;
        }

        //SETTERS
        public function setId($valor){
            $this->id = $valor;
            return $this;
        }

        public function setProduto($valor){
            $this->produto = $valor;
            return $this;
        }

        public function setValor($valor){
            $this->valor = $valor;
            return $this;
        }

        public function setStatus($valor){
            $this->status = $valor;
            return $this;
        }
    }

    $conexao = new Conexao();

    $user = new User();
    $user->__set('email', $_SESSION['email']);
    $user->__set('user', $_SESSION['user']);
    $user->setUserId($conexao);

    $query = "SELECT * FROM comprastb WHERE compradorID = " . $user->__get('id');
    $conexao = $conexao->conectar();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
    $_SESSION['pedidos'] = $obj;
    header('location: ../pedidos.php');

?>