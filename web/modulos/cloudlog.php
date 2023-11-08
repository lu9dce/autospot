<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirt = __DIR__;
$dirtx = dirname(dirname(__DIR__));
$adifFilePath = $dirtx . '/1.adi';
$adifContent = file_get_contents($adifFilePath);
$api_key = $cloudlogapi;
$station_profile_id = $cloudlogid;
$data = array(
    'key' => $api_key,
    'station_profile_id' => $station_profile_id,
    'type' => 'adif',
    'string' => $adifContent,
);
$ch = curl_init($cloudlogurl);
curl_setopt($ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);
if ($response === false) {
    echo "Error cloudlog\n\r";
} else {
    echo "Eniando cloudlog\n\r";
}
