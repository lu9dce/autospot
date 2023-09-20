<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirtx = dirname(dirname(__DIR__));
$xdownadi = $dirtx . DIRECTORY_SEPARATOR . "cluster.adi";
$fal = date("Ymd");
$nuevoNombre = "logadi" . $fal . ".adi";
$rutaNuevoArchivo = $nuevoNombre;
file_put_contents($rutaNuevoArchivo, file_get_contents($xdownadi));
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$nuevoNombre\"");
readfile($rutaNuevoArchivo);
unlink($rutaNuevoArchivo);
