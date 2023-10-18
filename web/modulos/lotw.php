<?php
/*
 * CREADO POR LU9DCE
 * Copyright 2023 Eduardo Castillo
 * Contacto: castilloeduardo@outlook.com.ar
 * Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
 */
$dirt = __DIR__;
$dirtx = dirname(dirname(__DIR__));
$cf = $dirtx . '/1.adi';
$possible_dirs = array(
    '/usr/bin/tqsl',
    '/bin/tqsl',
    '/usr/local/bin/tqsl',
    '/opt/tqsl/bin/tqsl',
    'C:\Program Files (x86)\TrustedQSL\tqsl.exe',
);
$tqsl_location = '';
foreach ($possible_dirs as $dir) {
    if (file_exists($dir)) {
        $tqsl_location = $dir;
        break;
    }
}
$command = '';
if (!empty($tqsl_location)) {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $command = '"' . $tqsl_location . '" -c ' . $milicencia . ' -l ' . $milicencia . ' -q -d -u ' . $cf . ' -a all';
    } else {
        // Ejecutar 'who' para obtener la información de la sesión actual
        $who_output = shell_exec('who');
        $lines = explode("\n", $who_output);
        
        foreach ($lines as $line) {
            if (strpos($line, '(:') !== false) {
                // Encontrar la línea que contiene el valor de DISPLAY
                $display = explode('(:', $line)[1];
                $display = substr($display, 0, strpos($display, ')'));
                break;
            }
        }

        if (isset($display)) {
            $command = "DISPLAY=:{$display} {$tqsl_location} -c {$milicencia} -l {$milicencia} -q -d -u {$cf} -a all";
        } else {
            echo "No se pudo encontrar el valor de DISPLAY en la salida de 'who'.";
        }
    }
    $output = shell_exec($command);
    echo "Enviando lotw\n\r";
} else {
    echo "Error tqsl no encontrado\n\r";
}
