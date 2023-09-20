<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
session_start();
function procqso($data)
{
    $data = strtoupper($data);
    $regex = '/<([A-Z0-9_]+):(\d+)(:[A-Z])?>([^<]+)\s*/';
    preg_match_all($regex, $data, $matches, PREG_SET_ORDER);
    $qsos = array();
    $qso = array();
    foreach ($matches as $i => $match) {
        $field = strtolower($match[1]);
        $length = $match[2];
        $type = $match[3];
        $content = $match[4];
        $qso[$field] = $content;
        $is_last_element = ($i === count($matches) - 1);
        if ($is_last_element || ($i < count($matches) - 1 && $matches[$i + 1][1] === 'EOR')) {
            $qsos[] = $qso;
            $qso = array();
        }
    }
    return $qsos;
}
function genadi($qsos)
{
    $adi_entries = array_map(function ($qso) {
        $adi_entry = '';
        foreach ($qso as $field => $content) {
            $content = trim($content);
            $field_length = strlen($content);
            $adi_entry .= "<$field:" . $field_length . ">$content ";
        }
        $adi_entry .= '<eor>';
        return $adi_entry;
    }, $qsos);
    return $adi_entries;
}
function qsotovar($array)
{
    $variables = [];
    foreach ($array as $campo => $valor) {
        $valor = rtrim($valor);
        global ${$campo};
        ${$campo} = $valor;
        $variables[$campo] = $valor;
    }
    return $variables;
}
$dirtx = dirname(dirname(__DIR__));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES["archivo"]["tmp_name"];
        $nombre_guardado = $dirtx . DIRECTORY_SEPARATOR . "cluster.adi";
        if (file_exists($nombre_guardado)) {
            unlink($nombre_guardado);
        }
        $_SESSION['upload_message'] = "The file has been uploaded successfully.";
        $archivoTemp = fopen($nombre_temporal, 'r');
        while (($linea = fgets($archivoTemp)) !== false) {
            if (strpos($linea, '<eor>') !== false || strpos($linea, '<EOR>') !== false) {
                $linea = procqso($linea);
                $linex = genadi($linea);
                $ho = $linex[0] . "\n";
                file_put_contents($nombre_guardado, $ho, FILE_APPEND);
            }
        }
        fclose($archivoTemp);
    } else {
        $_SESSION['upload_message'] = "Error uploading the file.";
    }
    if (file_exists($nombre_temporal)) {
        unlink($nombre_temporal);
    }
    header("Location: menu.php");
    exit;
}
