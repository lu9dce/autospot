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
$post = [
    'Callsign' => $hrduser,
    'Code' => $hrdcode,
    'ADIFData' => $last_dx,
];
$ch = curl_init('http://robot.hrdlog.net/NewEntry.aspx/');
if ($ch) {
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    if ($result === false) {
        echo "Error hrdlog\n\r";
    } else {
        echo "Enviando hrdlog\n\r";
    }
    curl_close($ch);
} else {
    echo "Error hdrlog\n\r";
}
