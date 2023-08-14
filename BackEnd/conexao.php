<?php

class Conexao {
    private $host = 'localhost';
    private $dbname = 'zilloDB';
    private $user = 'felipe';
    private $pass = 'wvb305zsxyLk2l2A';

    public function conectar() {
        try {
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            return $conexao;
        } catch(PDOException $e){
            echo '<hr>' . $e->getMessage();
        }
    }
}

?>