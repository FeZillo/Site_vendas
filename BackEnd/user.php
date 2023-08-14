<?php

class User {
    private $id;
    private $email;
    private $senha;
    private $user;
    private $saldo = 0;
    private $status;
    private $adv;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function setUserID(Conexao $conexao){
        $conexao = $conexao->conectar();

        $query = 'SELECT * FROM userstb WHERE email = '."'".$this->email."'";
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $id = $obj[0]->userID;
        $this->id = $id;
    }

    public function setUserSaldo(Conexao $conexao){
        $connect = $conexao->conectar();

        $query = 'SELECT * FROM userstb WHERE email = '."'".$this->email."'";
        $stmt = $connect->prepare($query);
        $stmt->execute();

        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $saldo = $obj[0]->saldo;
        $this->saldo = $saldo;
    }

    public function getAdvertencia(Conexao $conexao){
        $connect = $conexao->conectar();

        $query = 'SELECT * FROM userstb WHERE userID = '.$this->userID;
        $stmt->$connect->prepare($query);
        $stmt->execute();

        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->adv = $obj[0]->advertencia;
        return $this->adv;
    }


}

?>