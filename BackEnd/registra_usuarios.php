    
<?php

    class RegistraUsuarios {
        private $conexao;
        private $usuario;
        
        public function __construct(Conexao $conexao, User $usuario) {
            $this->conexao = $conexao->conectar();
            $this->usuario = $usuario;
        }

        public function cadastrar() {
            if(!$this->verificaEmail()){
                $query = 'INSERT INTO userstb(username, email, senha)VALUES(:username, :email, :senha)';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':username', $this->usuario->__get('user'));
                $stmt->bindValue(':email', $this->usuario->__get('email'));
                $stmt->bindValue(':senha', $this->usuario->__get('senha'));
                $stmt->execute();
                session_start();
                $this->login();;
            }else {
                header('location: ../cadastro.php');
            }
        }

        public function login() {
            $query = "SELECT * FROM userstb WHERE email = :email";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->execute();
            $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            if(!isset($obj[0])){
                header('location: ../login.php?erro=1');
            }else {
                $verify = password_verify($this->usuario->__get('senha'), $obj[0]->senha);
                if($verify){
                    if(trim($obj[0]->status) == 'ativo'){
                        $_SESSION['user'] = $obj[0]->username;
                        $_SESSION['saldo'] = $obj[0]->saldo;
                        $_SESSION['email'] = $obj[0]->email;
                        header('location: ../index.php');
                    }else{
                        session_destroy();
                        header('location: ../login.php?erro=2');
                    }
                }else {
                    header('location: ../login.php?erro=1');
                }
            }
        }

        public function verificaEmail() {
            $query = "SELECT * FROM userstb WHERE email = :email";  
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->execute();
            $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(isset($obj[0]->email)){
                return true;
            }else {
                return false;
            }
        }

        public function atualizar() {
            session_start();
            $query = "SELECT * FROM userstb WHERE email = " . "'" . $this->usuario->__get('email') . "'";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
            $id = $obj[0]->userID;

            $this->usuario->__set('email', $_POST['email']);
            $this->usuario->__set('user', $_POST['user']);
            
            if(!$this->verificaEmail() || $obj[0]->email == $_POST['email']){
                $q = 'UPDATE userstb SET email = :email, username = :username WHERE userID = ' . $id .';';
                $st = $this->conexao->prepare($q);
                $st->bindValue(':email', $this->usuario->__get('email'));
                $st->bindValue(':username', $this->usuario->__get('user'));
                $st->execute();
                $_SESSION['user'] = $this->usuario->__get('user');
                $_SESSION['email'] = $this->usuario->__get('email');

                header("location: ../perfil.php?success=1");
            }else {
                header('location: ../perfil.php?erro=1');
            }
        }

        public function atualizaSenha() {
            
            $id = $this->pegaId();

            $verify = password_verify($_POST['atual'], $obj[0]->senha);

            if($verify){
                $hash_password = password_hash($_POST['nova'], PASSWORD_DEFAULT);
                $q = "UPDATE userstb SET senha = :new WHERE userID = " . $id;
                $st = $this->conexao->prepare($q);
                $st->bindValue(':new', $hash_password);
                $st->execute();
                header('location: ../perfil.php?success=2');
            } else {
                header('location: ../perfil.php?erro=2');
            }
        }

        public function pegaId() {
            $query = "SELECT * FROM userstb WHERE email = " . "'" . $this->usuario->__get('email') . "'";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
            $id = $obj[0]->userID;
            return $id;
        }

        public function abrirChamadoSuporte($subject) {
            $id = $this->pegaId();

            $query = "INSERT INTO pedidosdesuportetb (userID, assunto) VALUES (" . $id . ", :sub)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':sub', $subject);
            $stmt->execute();
        }

        public function registringirConta(){
            $query = "UPDATE userstb SET status = 'restrita' WHERE userID = ".$this->id;

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
        }

        public function banirConta(){
            $query = "UPDATE userstb SET status = 'banida' WHERE userID = ".$this->id;

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
        }
    }

?>