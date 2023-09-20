<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirt = __DIR__;
$dirtx = dirname(dirname(__DIR__));
$cf = new CURLFile($dirtx . '/1.adi');
$post = [
    'EQSL_USER' => $eqsluser,
    'EQSL_PSWD' => $eqslpass,
    'Filename' => $cf,
];
$ch = curl_init('http://www.eqsl.cc/qslcard/ImportADIF.cfm');
if ($ch) {
    curl_setopt($ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    if ($result === false) {
        echo "Error eqsl\n\r";
    } else {
        echo "Enviando eqsl\n\r";
    }
    curl_close($ch);
} else {
    echo "Error eqsl\n\r";
}
