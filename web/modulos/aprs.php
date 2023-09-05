<?php
/*
* CREADO POR LU9DCE
* Copyright 2023 Eduardo Castillo
* Contacto: castilloeduardo@outlook.com.ar
* Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
*/
$dirt = __DIR__;
$at = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd";
$comando = "$milicencia-8>APZ100,WIDE1*:=$aprsqth-$at";
$da = fsockopen( '148.251.228.231', '14580', $errno, $errstr, 10 );
if ( $da ) {
    echo 'Enviando aprs\n\r';
    fwrite( $da, "user $milicencia pass $aprscode\r\n" );
    fwrite( $da, "$comando\r\n" );
    fclose( $da );
} else {
    echo 'Error aprs \n\r';
}
?>
