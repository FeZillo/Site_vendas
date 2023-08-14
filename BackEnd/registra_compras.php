<?php

class RegistraCompras {
    private $conexao;
    private $compra;
    private $usuario;

    public function __construct(Conexao $conexao, Compra $compra, User $usuario){
        $this->conexao = $conexao->conectar();
        $this->compra = $compra;
        $this->usuario = $usuario;
    }

    private function toSQL($valor){
        return "'".$valor."'";
    }

    public function cadastrarCompra(){
        $query = 'INSERT INTO comprastb (produto, valor, compradorID) VALUES ('.$this->toSQL($this->compra->getProduto()).', '.$this->compra->getValor().', '.$this->usuario->__get('id').')';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        $this->compra->getCompraID($this->conexao);
        $this->compra->changeDefaultStatus($this->conexao);
    }

    public function cadastrarEloJob(EloJobCompras $elojob, Conexao $conexao){
        $query = 'INSERT INTO elojobtb (compradorID, compraID, rankAtual, rankDesejado, valor, jogo) VALUES ('.
                                                                                                        $this->usuario->__get('id').
                                                                                                        ', '.
                                                                                                        $this->compra->getCompraID($this->conexao).
                                                                                                        ', '. 
                                                                                                        $this->toSQL($elojob->getRankAtual()).
                                                                                                        ', '. 
                                                                                                        $this->toSQL($elojob->getRankDesejado()).
                                                                                                        ', '. 
                                                                                                        $this->compra->getValor().
                                                                                                        ', '. 
                                                                                                        $this->toSQL($elojob->getJogo()).
                                                                                                        ")";

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();                                                                              
    }

    public function cadastrarCoach(CoachCompras $coach){
        $query = 'INSERT INTO coachtb (userID, compraID, jogo, elo, funcao, main) VALUES (' . 
                                                                                            $this->usuario->__get('id') .
                                                                                            ', ' . 
                                                                                            $coach->getCompraID() . 
                                                                                            ', '. 
                                                                                            $this->toSQL($coach->getJogo()) . 
                                                                                            ', ' . 
                                                                                            $this->toSQL($coach->getElo()) . 
                                                                                            ', '. 
                                                                                            $this->toSQL($coach->getFuncao()). 
                                                                                            ", :main)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':main', $this->toSQL($coach->getMain()));
        $stmt->execute();
    }

    public function checkElojob(){
        $query = 'SELECT * FROM elojobtb WHERE compradorID = ' . $this->usuario->__get('id');
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(isset($obj[0])){
            return false;
        }
        return true;
    }

    public function checkCoach(){
        $query = 'SELECT * FROM coachtb WHERE userID = ' . $this->usuario->__get('id');
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(isset($obj[0])){
            return false;
        }
        return true;
    }

}

?>