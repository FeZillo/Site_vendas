<?php

class Compra{
    private $compraID;
    private $produto;
    private $valor;
    private $compradorID;
    private $status;

    //Getters:
    public function getCompraID(PDO $conexao){
        $query = "SELECT * FROM comprastb WHERE compradorID = " . $this->compradorID . ' AND valor = ' . $this->valor . ' AND produto = ' . "'".$this->produto."'";
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $id = $obj[0]->compraID;
        $this->compraID = $id;
        return $this->compraID;
    }

    public function getProduto(){
        return $this->produto;
    }

    public function getValor(){
        return $this->valor;
    }

    public function getCompradorID(){
        return $this->comrpadorID;
    }

    public function getStatus(Conexao $conexao){
        $conexao = $conexao->conectar();

        $query = "SELECT * FROM comprastb WHERE compradorID = " . $this->compradorID . ' AND valor = ' . $this->valor . ' AND produto = ' . "'".$this->produto."'";
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $status = $obj[0]->status;
        $this->status = $status;
        return $this->status;
    }

    //Setters:
    public function setCompraID($valor){
        $this->compraID = $valor;
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

    public function setCompradorID($valor){
        $this->compradorID = $valor;
        return $this;
    }

    public function setStatus($valor){
        $this->status = $valor;
        return $this;
    }

    //Metodos:
    public function changeDefaultStatus(PDO $conexao){
        if($this->produto === 'elojob'){
            $query = "UPDATE comprastb SET status = 'Na fila' WHERE compraID = ". $this->compraID;
            $stmt = $conexao->prepare($query);
            $stmt->execute();
        }else{
            $query = "UPDATE comprastb SET status = 'Em analise' WHERE compraID = " . $this->compraID;
            $stmt = $conexao->prepare($query);
            $stmt->execute();
        }
    }

}

class EloJobCompras {
    private $elojobID;
    private $compradorID;
    private $compraID;
    private $rankAtual;
    private $rankDesejado;
    private $valor;
    private $jogo;
    private $status = "Na fila";

    //getters:
    public function getElojobID(){
        return $this->elojobID;
    }

    public function getCompradorID(){
        return $this->compradorID;
    }

    public function getCompraID(){
        return $this->compraID;
    }

    public function getRankAtual(){
        return $this->rankAtual;
    }

    public function getRankDesejado(){
        return $this->rankDesejado;
    }

    public function getValor(){
        return $this->valor;
    }

    public function getJogo(){
        return $this->jogo;
    }

    public function getStatus(){
        return $this->status;
    }

    //setters:
    public function setElojobID($valor){
        $this->elojobID = $valor;
        return $this;
    }

    public function setCompradorID($valor){
        $this->compradorID = $valor;
        return $this;
    }

    public function setCompraID($valor){
        $this->compraID = $valor;
        return $this;
    }

    public function setRankAtual($valor){
        $this->rankAtual = $valor;
        return $this;
    }

    public function setRankDesejado($valor){
        $this->rankDesejado = $valor;
        return $this;
    }

    public function setValor($valor){
        $this->valor = $valor;
        return $this;
    }

    public function setJogo($valor){
        $this->jogo = $valor;
        return $this;
    }

    public function setStatus($valor){
        $this->status = $valor;
        return $this;
    }
}

class CoachCompras{
    private $coachID;
    private $userID;
    private $compraID;
    private $jogo;
    private $elo;
    private $funcao;
    private $main;
    private $status;

    //PK
    public function sgetCoachID(Conexao $conexao){
        $conexao = $conexao->conectar();

        $query = 'SELECT * FROM coachtb WHERE userID = ' . $this->userID . ' AND compraID = ' . $this->compraID;
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->coachID = $obj[0]->coachID;
        return $this->coachID;
    }

    //FK
    public function getUserID(){
        return $this->userID;
    }

    //FK
    public function getCompraID(){
        return $this->compraID;
    }

    public function getJogo(){
        return $this->jogo;
    }

    public function getElo(){
        return $this->elo;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function getMain(){
        return $this->main;
    }

    //DEFAULT 
    public function sgetStatus(Conexao $conexao){
        $conexao = $conexao->conectar();

        $query = "SELECT * FROM coachtb WHERE coachID = " . $this->coachID;
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->status = $obj[0]->status;
        return $this->status;
    }


    public function setUserID($valor){
        $this->userID = $valor;
        return $this;
    }

    public function setCompraID($valor){
        $this->compraID = $valor;
        return $this;
    }

    public function setJogo($valor){
        $this->jogo = $valor;
        return $this;
    }

    public function setElo($valor){
        $this->elo = $valor;
        return $this;
    }

    public function setFuncao($valor){
        $this->funcao = $valor;
        return $this;
    }

    public function setMain($valor){
        $this->main = $valor;
        return $this;
    }
}

?>