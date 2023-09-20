<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirt = __DIR__;
$dirtx = dirname(dirname(__DIR__));
$last_dx = file_get_contents($dirtx . '/1.adi');
$qa = str_replace(' <', '<', $last_dx);
$qa = preg_replace('/\r|\n/', '', $qa);
$postData = array(
    'KEY' => $qrzkey,
    'ACTION' => 'INSERT',
    'ADIF' => $qa,
);
$apiUrl = 'https://logbook.qrz.com/api';
$ch = curl_init($apiUrl);
if ($ch) {
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt');

    $result = curl_exec($ch);
    if ($result === false) {
        echo "Error qrz\n\r";
    } else {
        echo "Enviando qrz\n\r";
    }
    curl_close($ch);
} else {
    echo "Error qrz\n\r";
}
