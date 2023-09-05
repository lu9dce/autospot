<?php
/*
* CREADO POR LU9DCE
* Copyright 2023 Eduardo Castillo
* Contacto: castilloeduardo@outlook.com.ar
* Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
*/
$dirt = __DIR__;
date_default_timezone_set( 'UTC' );
$at = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd";
$hora = date( DATE_RFC850 );
$fontFile = realpath( $dirt . '/arial.ttf' );
$ioi = ', Thank you for the contact.';
if ( in_array( $dosPrimerasLetras, $combinacionesPermitidas ) ) {
    $ioi = ', Gracias por el contacto.';
}
if ( empty( $fondo ) ) {
    $fondo = 'azar';
}
if ( $fondo == 'azar' ) {
    $fp = fopen( $dirt . '/random.jpg', 'w+' );
    $ch = curl_init( 'https://unsplash.it/800/600' );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_FILE, $fp );
    curl_setopt( $ch, CURLOPT_CAINFO, $dirt . '/curl-ca-bundle.crt' );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt( $ch, CURLOPT_TIMEOUT, 1000 );
    curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0' );
    curl_exec( $ch );
    curl_close( $ch );
    fclose( $fp );
    $fondo = $dirt . '/random.jpg';
} else {
    $imageContent = file_get_contents( $fondo );
    file_put_contents( $dirt . '/random.jpg', $imageContent );
}
list( $w, $h ) = getimagesize( $fondo );
if ( $w !== 800 || $h !== 600 ) {
    $thumb = imagecreatetruecolor( 800, 600 );
    $origen = imagecreatefromjpeg( $fondo );
    imagecopyresized( $thumb, $origen, 0, 0, 0, 0, 800, 600, $w, $h );
    imagejpeg( $thumb, $dirt . '/random.jpg' );
    imagedestroy( $thumb );
    imagedestroy( $origen );
    $fondo = $dirt . '/random.jpg';
}
$im = imagecreatefromjpeg( $fondo );
$color = imagecolorallocatealpha( $im, 0, 0, 0, 30 );
imagefilledrectangle( $im, 0, 400, 800, 550, $color );
$color = imagecolorallocatealpha( $im, 0, 0, 0, 0 );
$outlineColor = imagecolorallocatealpha( $im, 0, 0, 0, 100 );
$textColor = imagecolorallocate( $im, 255, 255, 255 );
$outlineSize = 2;
for ( $dx = -$outlineSize; $dx <= $outlineSize; $dx++ ) {
    for ( $dy = -$outlineSize; $dy <= $outlineSize; $dy++ ) {
        imagettftext( $im, 60, 0, 30 + $dx, 80 + $dy, $outlineColor, $fontFile, $milicencia );
        imagettftext( $im, 30, 0, 32 + $dx, 150 + $dy, $outlineColor, $fontFile, $minombre );
        imagettftext( $im, 15, 0, 32 + $dx, 200 + $dy, $outlineColor, $fontFile, "$miqth - ($migrid)" );
        imagettftext( $im, 25, 0, 32 + $dx, 270 + $dy, $outlineColor, $fontFile, "$textqsl" );
        imagettftext( $im, 20, 0, 30 + $dx, 450 + $dy, $outlineColor, $fontFile, "$at" );
        imagettftext( $im, 20, 0, 30 + $dx, 510 + $dy, $outlineColor, $fontFile, "$hora" );
        imagettftext( $im, 8, 0, 700 + $dx, 590 + $dy, $outlineColor, $fontFile, 'Design by LU9DCE' );
        imagettftext( $im, 20, 0, 30 + $dx, 380 + $dy, $outlineColor, $fontFile, $malname . $ioi );
    }
}
imagettftext( $im, 60, 0, 30, 80, $textColor, $fontFile, $milicencia );
imagettftext( $im, 30, 0, 32, 150, $textColor, $fontFile, $minombre );
imagettftext( $im, 15, 0, 32, 200, $textColor, $fontFile, "$miqth - ($migrid)" );
imagettftext( $im, 25, 0, 32, 270, $textColor, $fontFile, "$textqsl" );
imagettftext( $im, 20, 0, 30, 450, $textColor, $fontFile, "$at" );
imagettftext( $im, 20, 0, 30, 510, $textColor, $fontFile, "$hora" );
imagettftext( $im, 8, 0, 700, 590, $textColor, $fontFile, 'Design by LU9DCE' );
imagettftext( $im, 20, 0, 30, 380, $textColor, $fontFile, $malname . $ioi );
imagejpeg( $im, $dirt . '/qsl.jpg' );
imagedestroy( $im );
if ( file_exists( $dirt . '/random.jpg' ) ) {
    unlink( $dirt . '/random.jpg' );
}
?>
