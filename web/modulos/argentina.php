<?php
/*
* CREADO POR LU9DCE
* Copyright 2023 Eduardo Castillo
* Contacto: castilloeduardo@outlook.com.ar
* Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
*/
$dirt = __DIR__;
$arg = "https://www.logdeargentina.com.ar/php/subeqso2.php?user=$argenuser&pass=$argenpass&micall=$station_callsign&sucall=$call&banda=$band&modo=$mode&fecha=$qso_date&hora=$time_on&rst=$rst_sent";
$ch = curl_init( $arg );
if ( $ch ) {
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt' );
    $result = curl_exec( $ch );
    if ( $result === false ) {
        echo 'Error log argentina\n\r';
    } else {
        echo 'Enviando log argentina\n\r';
    }
    curl_close( $ch );
} else {
    echo 'Error log argentina\n\r';
}
?>
