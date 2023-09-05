<?php
/*
* CREADO POR LU9DCE
* Copyright 2023 Eduardo Castillo
* Contacto: castilloeduardo@outlook.com.ar
* Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
*/
$dirt = __DIR__;
$dirtx = dirname( dirname( __DIR__ ) );
$last_dx = file_get_contents( $dirtx . '/1.adi' );
$qa = preg_replace( '/\r|\n/', '', $last_dx );
$post = [
    'u' => $hamuser,
    'p' => $hampass,
    'prg' => 'logger32',
    'cmd' => 'insert',
    'adif' => $qa
];
$ch = curl_init( 'https://www.hamqth.com/qso_realtime.php' );
if ( $ch ) {
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt' );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
$result = curl_exec( $ch );
    if ( $result === false ) {
        echo "Error hamqth\n\r";
    } else {
        echo "Enviando hamqth\n\r";
    }
    curl_close( $ch );
} else {
    echo "Error hamqth\n\r";
}
?>
