<?php

session_start();

require_once "D:/xampp/htdocs/BackEnd/pix_estatico.php";
require_once "D:/xampp/htdocs/BackEnd/registra_usuarios.php";
require_once "D:/xampp/htdocs/BackEnd/user.php";
require_once "D:/xampp/htdocs/BackEnd/conexao.php";
require '../../libs/vendor/autoload.php'; 
require '../../libs/vendor2/autoload.php';

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;
use Ramsey\Uuid\Uuid;

$conexao = new Conexao();
$user = new User();
$user->__set('email', $_SESSION['email']);

$registro = new RegistraUsuarios($conexao, $user);
$id = $registro->pegaId();

//Generating Uuid:
$uuid = Uuid::uuid4();
$uuid = $uuid->toString();

if(str_replace('-', '', $uuid))


$valorString = number_format($_POST['quantidade'],2,",",".");

$obPayload = (new Payload)->setPixKey('46999993874')
                            ->setDescription('Adicionar Saldo')
                            ->setMerchantName('Felipe Zillo')
                            ->setMerchantCity('Sao Paulo')
                            ->setAmount($_POST['quantidade'])
                            ->setTxid($id . $_SESSION['user']);



$payloadQRCode = $obPayload->getPayload();

$obQrCode = new QrCode($payloadQRCode);

$image = (new Output\Png)->output($obQrCode, 400);

$_SESSION['QRCode'] = $image;
$_SESSION['valor'] = $valorString;
$_SESSION['codigo'] = $payloadQRCode;

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
header('location: ../perfil.php?pix=true');

?>