<?php

    session_start();
    require "../../libs/PHPMailer/Exception.php";
    require "../../libs/PHPMailer/OAuthTokenProvider.php";
    require "../../libs/PHPMailer/OAuth.php";
    require "../../libs/PHPMailer/PHPMailer.php";
    require "../../libs/PHPMailer/POP3.php";
    require "../../libs/PHPMailer/SMTP.php";
    require "../../BackEnd/conexao.php";
    require "../../BackEnd/registra_usuarios.php";
    require "../../BackEnd/user.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    


    class Mensagem {
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        private $remetente;
        public $status = array('codigo_status' => null, 'descricao_status' => '');

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $valor) {
            $this->$attr = $valor;
        }

        public function mensagemValida() {
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
                return false;
            }
            return true;
        }

    }

    $mensagem = new Mensagem();
    $mensagem->__set('para', 'suportetecnicositefelipe@gmail.com');
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);
    $mensagem->__set('remetente', $_SESSION['user']);

    if(!$mensagem->mensagemValida()) {
        header('Location: ../contato.php');
    }else if(!isset($_SESSION['user'])) {
        header('location: ../contato.php?error=login');
    }

    //CRIANDO A DB E COLOCANDO NA MERNSAGEM:
    $conexao = new Conexao();
    $user = new User();
    $user->__set('email', $_SESSION['email']);
    $registro = new RegistraUsuarios($conexao, $user);
    $registro->abrirChamadoSuporte($mensagem->__get('assunto'));
    //--------------------

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fzillo42@gmail.com';                   //SMTP username
        $mail->Password   = 'vouwnccwksyzkwio';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('fzillo42@gmail.com', $mensagem->__get('remetente'));
        $mail->addAddress($mensagem->__get('para'));     //Add a recipient
        //$mail->addAddress('ellen@example.com');                   //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject =  $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem') . '<hr>';
        $mail->AltBody = $mensagem->__get('mensagem');
    
        $mail->send();

        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso!';

    } catch (Exception $e) {

        $mensagem->status['codigo_status'] = 0;
        $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail, por favor tente novamente mais tarde.' . $mail->ErrorInfo;
    }

    if($mensagem->status['codigo_status'] == 1){
        header('location: ../contato.php?send=success');
    }else if($mensagem->status['codigo_status'] == 0) {
        header('location: ../contato.php?send=error');
    }
?>
