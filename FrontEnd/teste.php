<?php

session_start();

require "hidden/pix.php";
require '../libs/vendor/autoload.php'; 
require '../libs/vendor2/autoload.php';

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;
use Ramsey\Uuid\Uuid;

//Generating Uuid:
$uuid = Uuid::uuid4();

$obPayload = (new Payload)->setPixKey('46999993874')
                            ->setDescription('Pagamento do Pedido 12345')
                            ->setMerchantName('Felipe Zillo')
                            ->setMerchantCity('Bauru')
                            ->setAmount(100.00)
                            ->setTxid($uuid->toString());



$payloadQRCode = $obPayload->getPayload();

$obQrCode = new QrCode($payloadQRCode);

$image = (new Output\Png)->output($obQrCode, 400);

$_SESSION['QRCode'] = $image;

header('location: ../FrontEnd/perfil.php?pix=true');

?>
<h1>QRCode:</h1>

<br>

<img src="data:image/png;base64, <?=base64_encode($image)?>">

<br><br>

Codigo:
<br>
<strong><?=$payloadQRCode?></strong>
