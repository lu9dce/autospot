<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2022 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirt = __DIR__;
$qrx = "https://www.hamqth.com/xml.php?u=xx0php&p=phpdce";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $qrx);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt');
$qxml = curl_exec($ch);
curl_close($ch);
$qxml = simplexml_load_string($qxml);
$id = $qxml->session->session_id;
$qrx = "https://www.hamqth.com/xml.php?id=$id&callsign=$call&prg=logger32";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $qrx);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt');
$zxml = curl_exec($ch);
curl_close($ch);
$myya = fopen($dirt . '/xusq.xml', 'w');
fwrite($myya, $zxml);
fclose($myya);
