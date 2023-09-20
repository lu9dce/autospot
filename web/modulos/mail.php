<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirt = __DIR__;
date_default_timezone_set('UTC');
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
include $dirt . '/busq.php';
$xml = simplexml_load_file($dirt . '/xusq.xml');
$malmail = $xml->search->email;
$malname = $xml->search->nick;
if (!empty($malmail)) {
    $dosPrimerasLetras = strtoupper(substr($call, 0, 2));
    $combinacionesPermitidas = array('EA', 'XE', 'LU', 'LW', 'CE', 'CA', 'CB', 'HK', 'YV', 'YW', '4M', 'CO', 'CL', 'CM', 'OA', 'OB', 'OC', 'HC', 'CP', 'CB', 'CD', 'CX', 'TG', 'HR', 'YS', 'YN', 'TI', 'HP', 'HI', 'KP4', 'NP3', 'NP4');
    include $dirt . '/qsl.php';
    $cuerpo = "<br>
---------------------------------------------------------------------<br>
<br>
Dear<br>
Thank you for our contact:<br>
<br>
Date : $qso_date - $time_on<br>
Freq : $freq<br>
Band : $band<br>
Mode : $mode<br>
RST  : $rst_sent<br>
RCV  : $rst_rcvd<br>
<br>
Please find attached my QSL card<br>
Best Regards and 73<br>
<br>
$minombre - $milicencia<br>
<br>
My QRZ https://www.qrz.com/db/$milicencia<br>
<br>
---------------------------------------------------------------------<br>
                   Software  Auto-Spot - by Eduardo Castillo (LU9DCE)<br>
<br>";
    $zxz = 'Hi! ' . $call . ' -  Thanks for the qso';
    if (in_array($dosPrimerasLetras, $combinacionesPermitidas)) {
        $cuerpo = str_replace('Dear', 'Estimado', $cuerpo);
        $cuerpo = str_replace('Thank you for our contact', 'Gracias por el contacto', $cuerpo);
        $cuerpo = str_replace('Please find attached my QSL card', 'Por favor, encuentre adjunta mi tarjeta QSL', $cuerpo);
        $cuerpo = str_replace('Best Regards and 73', 'Saludos cordiales y 73', $cuerpo);
        $zxz = 'Hola! ' . $call . ' - Gracias por el qso';
    }
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $usemail;
        $mail->SMTPAuth = true;
        $mail->Username = $useuser;
        $mail->Password = $usepass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $useport;
        $mail->setFrom($useuser, $milicencia);
        $mail->addAddress($malmail);
        $mail->addAttachment($dirt . '/qsl.jpg');
        $mail->isHTML(true);
        $mail->Subject = $zxz;
        $mail->Body = $cuerpo;
        $mail->send();
        $result = '1';
        echo "Enviado mail a $malmail\n\r";
    } catch (Exception $e) {
        $result = '0';
    }
} else {
    $result = '0';
    echo "Mail no encontrado\n\r";
}

if (file_exists($dirt . '/xusq.xml')) {
    unlink($dirt . '/xusq.xml');
}
if (file_exists($dirt . '/qsl.jpg')) {
    unlink($dirt . '/qsl.jpg');
}
