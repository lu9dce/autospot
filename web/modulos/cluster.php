<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$apap = "";
$at = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd";

$context = stream_context_create();
$da = fsockopen($clustertelnet, $clusterport, $errno, $errstr, 10);
if ($da) {
    fwrite($da, "$station_callsign\r\n");
    sleep(1);
    while (strpos($apap, '>') === false) {
        $apap .= fgets($da);
    }
    sleep(1);
    fwrite($da, "$at\r\n");
    sleep(1);
    $apap .= fgets($da);
    fwrite($da, "b\r\n");
    sleep(1);
    fclose($da);
    echo "Enviando cluster\n\r";
} else {
    echo "Error en la conexión cluster\n\r";
}
