<?php
    class EloJob {
        private $rank_atual;
        private $rank_desejado;
        private $numero_atual;
        private $numero_desejado;

        public function __construct($rank_atual, $rank_desejado, $numero_atual, $numero_desejado){
            $this->rank_atual = $rank_atual;
            $this->rank_desejado = $rank_desejado;
            $this->numero_atual = $numero_atual;
            $this->numero_desejado = $numero_desejado;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }


    class Valorant extends EloJob {

        public $valorElos = array(
            'iron'=>0, //1, 2, 3
            'bronze'=>3, //4, 5, 6
            'silver'=>6, //7, 8, 9
            'gold'=>9, //10, 11, 12
            'platinum'=>12, //13, 14, 15
            'diamond'=>15, //16, 17, 18
            'ascendant'=>18, //19, 20, 21
            'immortal'=>21 //22, 23, 24
        );

        public $transcript = array(
            'iron'=>"Ferro", 
            'bronze'=>"Bronze", 
            'silver'=>"Prata", 
            'gold'=>"Ouro", 
            'platinum'=>"Platina",
            'diamond'=>"Diamante", 
            'ascendant'=>"Ascendente", 
            'immortal'=>"Imortal"
        );
        
        public function converte() {
            foreach($this->valorElos as $elo => $numero) {
                if($this->__get('rank_atual') == $elo){
                    $rank = $numero + $this->__get('numero_atual');
                    $this->__set('rank_atual', $rank);
                } else if($this->__get('rank_desejado') == $elo) {
                    $rank = $numero + $this->__get('numero_desejado');
                    $this->__set('rank_desejado', $rank);
                }
            }
        }

        public function calculaPreco() {
            $this->converte();
            if($this->__get('rank_atual') > $this->__get('rank_desejado')){
                return -1;
            }
            $valor = 0;
            while($this->__get('rank_atual') < $this->__get('rank_desejado')) {
                $atual = $this->__get('rank_atual');
                if($atual == 1 || $atual == 2 || $atual == 3){ //Ferro
                    $valor += 3;
                }else if($atual == 4 || $atual == 5 || $atual == 6){ //Bronze
                    $valor += 5;
                }else if($atual == 7 || $atual == 8 || $atual == 9){ //Prata
                    $valor += 7;
                }else if($atual == 10 || $atual == 11 || $atual == 12){ //Ouro
                    $valor += 15;
                }else if($atual == 13 || $atual == 14 || $atual == 15){ //Platina
                    $valor += 25;
                }else if($atual == 16 || $atual == 17 || $atual == 18){ //Diamante
                    $valor += 50;
                }else if($atual == 19 || $atual == 20 || $atual == 21){ //Ascendente
                    $valor += 90;
                }else if($atual == 22 || $atual == 23 || $atual == 24){ //Imortal
                    $valor += 170;
                }
                $atual += 1;
                $this->__set('rank_atual', $atual);
            }
            return $valor;
        }
    }

        

    class Lol extends EloJob {
        
        public $valorElos = array(
            'iron'=>0, //1, 2, 3, 4
            'bronze'=>4, //5, 6, 7, 8
            'silver'=>8, //9, 10, 11, 12
            'gold'=>12, //13, 14, 15, 16
            'platinum'=>16, //17, 18, 19, 20
            'diamond'=>20, //21, 22, 23, 24
            'master'=>25, //25
            'grandmaster'=>26 //26
        );

        public $transcript = array(
            'iron'=>"Ferro", 
            'bronze'=>"Bronze", 
            'silver'=>"Prata", 
            'gold'=>"Ouro", 
            'platinum'=>"Platina",
            'diamond'=>"Diamante", 
            'master'=>"Mestre", 
            'grandmaster'=>"Grão-mestre"
        );

        public function converte() {
            foreach($this->valorElos as $elo => $numero) {
                if($this->__get('rank_atual') == $elo){
                    $rank = $numero + $this->__get('numero_atual');
                    $this->__set('rank_atual', $rank);
                } else if($this->__get('rank_desejado') == $elo) {
                    $rank = $numero + $this->__get('numero_desejado');
                    $this->__set('rank_desejado', $rank);
                }
            }
        }

        public function calculaPreco() {
            $this->converte();
            if($this->__get('rank_atual') > $this->__get('rank_desejado')){
                return -1;
            }
            $valor = 0;
            while($this->__get('rank_atual') < $this->__get('rank_desejado')) {
                $atual = $this->__get('rank_atual');
                if($atual == 1 || $atual == 2 || $atual == 3){ //Ferro
                    $valor += 3;
                }else if($atual == 4 || $atual == 5 || $atual == 6 || $atual == 7){ //Bronze
                    $valor += 10;
                }else if($atual == 8 || $atual == 9 || $atual == 10 || $atual == 11){ //Prata
                    $valor += 20;
                }else if($atual == 12 || $atual == 13 || $atual == 14 || $atual == 15){ //Ouro
                    $valor += 25;
                }else if($atual == 16 || $atual == 17 || $atual == 18 || $atual == 19){ //Platina
                    $valor += 50;
                }else if($atual == 20 || $atual == 21 || $atual == 22 || $atual == 23){ //Diamante
                    $valor += 130;
                }else if($atual == 24){ //Mestre
                    $valor += 500;
                }else if($atual == 25){ //Grao-Mestre
                    $valor += 1000;
                }
                $atual += 1;
                $this->__set('rank_atual', $atual);
            }
            return $valor;
        }
            
    }

    class CounterStrike extends EloJob  {

        public $valorElos = array(
            "prata"=>0, //1, 2, 3, 4, 5, 6
            "ouro"=>6, //7, 8, 9, 10
            "ak"=>10, //11, 12, 13
            "xerife"=>14, //14
            "aguia"=>14, //15, 16
            "supremo"=>17, //17
            "global"=>18 //18
        );

        public $transcript = array(
            "prata"=>"Prata",
            "ouro"=>"Ouro",
            "ak"=>"Ak",
            "xerife"=>"Xerife",
            "aguia"=>"Águia",
            "supremo"=>"Supremo",
            "global"=>"Global"
        );

        public function converte() {
            foreach($this->valorElos as $elo => $numero) {
                if($this->__get('rank_atual') == $elo){
                    $rank = $numero + $this->__get('numero_atual');
                    $this->__set('rank_atual', $rank);
                } else if($this->__get('rank_desejado') == $elo) {
                    $rank = $numero + $this->__get('numero_desejado');
                    $this->__set('rank_desejado', $rank);
                }
            }
        }

        public function calculaPreco() {
            $this->converte();
            if($this->__get('rank_atual') > $this->__get('rank_desejado')){
                return -1;
            }
            $valor = 0;
            while($this->__get('rank_atual') < $this->__get('rank_desejado')) {
                $atual = $this->__get('rank_atual');
                if($atual == 1 || $atual == 2 || $atual == 3 || $atual == 4 || $atual == 5){ //Prata
                    $valor += 5;
                }else if($atual == 6 || $atual == 7|| $atual == 8 || $atual == 9){ //Ouro
                    $valor += 10;
                }else if($atual == 10 || $atual == 11 || $atual == 12){ //Ak
                    $valor += 15;
                }else if($atual == 13){ //Xerife
                    $valor += 20;
                }else if($atual == 14){ //Aguia 1
                    $valor += 30;
                }else if($atual == 15){ //Aguia 2
                    $valor += 35;
                }else if($atual == 16){ //Supremo
                    $valor += 50;
                }else if($atual == 17){ //Global
                    $valor += 75;
                }
                $atual += 1;
                $this->__set('rank_atual', $atual);
            }
            return $valor;
        }
    }

    class DeadByDaylight {

        private $rank_atual;
        private $rank_desejado;
        private $numero_atual;
        private $numero_desejado;
        private $funcao;

        public function __construct($rank_atual, $rank_desejado, $numero_atual, $numero_desejado, $funcao){
            $this->rank_atual = $rank_atual;
            $this->rank_desejado = $rank_desejado;
            $this->numero_atual = $numero_atual;
            $this->numero_desejado = $numero_desejado;
            $this->funcao = $funcao;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }


        public $valorElos = array(
            "ash"=>0, //1, 2, 3, 4
            "bronze"=>4, //5, 6, 7, 8
            "silver"=>8, //9, 10, 11, 12
            "gold"=>12, //13, 14, 15, 16
            "iridescent"=>16 //17, 18, 19, 20
        );

        public $transcript = array(
            "ash"=>"Cinza",
            "bronze"=>"Bronze",
            "silver"=>"Prata",
            'gold'=>'Ouro',
            "iridescent"=>"Iridescente",
            'survivor'=>"Sobrevivente",
            "killer"=>"Assassino"
        );

        public function converte() {
            foreach($this->valorElos as $elo => $numero) {
                if($this->__get('rank_atual') == $elo){
                    $rank = $numero + $this->__get('numero_atual');
                    $this->__set('rank_atual', $rank);
                } else if($this->__get('rank_desejado') == $elo) {
                    $rank = $numero + $this->__get('numero_desejado');
                    $this->__set('rank_desejado', $rank);
                }
            }
        }

        public function calculaPreco() {
            $this->converte();
            if($this->__get('rank_atual') > $this->__get('rank_desejado')){
                return -1;
            }
            $valor = 0;
            if($this->__get('funcao') == 'killer'){
                while($this->__get('rank_atual') < $this->__get('rank_desejado')) {
                    $atual = $this->__get('rank_atual');
                    if($atual == 1 || $atual == 2 || $atual == 3){ //ash
                        $valor += 1;
                    }else if($atual == 4 || $atual == 5|| $atual == 6 || $atual == 7){ //bronze
                        $valor += 3;
                    }else if($atual == 8 || $atual == 9 || $atual == 10 || $atual == 11){ //silver
                        $valor += 4;
                    }else if($atual == 12 || $atual == 13 || $atual == 14 || $atual == 15){ //gold
                        $valor += 10;
                    }else if($atual == 16 || $atual == 17 || $atual == 18 || $atual == 19){ //iridescent
                        $valor += 15;
                    }
                    $atual += 1;
                    $this->__set('rank_atual', $atual);
                }
            }else{
                while($this->__get('rank_atual') < $this->__get('rank_desejado')) {
                    $atual = $this->__get('rank_atual');
                    if($atual == 1 || $atual == 2 || $atual == 3){ //ash
                        $valor += 2;
                    }else if($atual == 4 || $atual == 5|| $atual == 6 || $atual == 7){ //bronze
                        $valor += 6;
                    }else if($atual == 8 || $atual == 9 || $atual == 10 || $atual == 11){ //silver
                        $valor += 8;
                    }else if($atual == 12 || $atual == 13 || $atual == 14 || $atual == 15){ //gold
                        $valor += 12;
                    }else if($atual == 16 || $atual == 17 || $atual == 18 || $atual == 19){ //iridescent
                        $valor += 16;
                    }
                    $atual += 1;
                    $this->__set('rank_atual', $atual);
                }
            }
            return $valor;
        }
    }




?>