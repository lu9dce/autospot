<?php
/*
* CREADO POR LU9DCE
* Copyright 2023 Eduardo Castillo
* Contacto: castilloeduardo@outlook.com.ar
* Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
*/
$dirt = __DIR__;
$dirtx = dirname( dirname( __DIR__ ) );
$adifFilePath = $dirtx . '/1.adi';
$adifContent = file_get_contents( $adifFilePath );
$post = [
    'email' => $clubmail,
    'password' => $clubpass,
    'callsign' => $clubuser,
    'api' => '21507885dece41ca049fec7fe02a813f2105aff2',
    'adif' => $adifContent
];
$ch = curl_init( 'https://clublog.org/realtime.php' );
if ( $ch ) {
    curl_setopt( $ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt' );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
    $result = curl_exec( $ch );
    if ( $result === false ) {
        echo 'Error clublog\n\r';
    } else {
        echo 'Enviando clublog\n\r';
    }
    curl_close( $ch );
} else {
    echo 'Error clublog\n\r';
}
?>
