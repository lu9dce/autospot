<?php
/*
* CREADO POR LU9DCE
* Copyright 2023 Eduardo Castillo
* Contacto: castilloeduardo@outlook.com.ar
* Licencia: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International
*/
$dirt = __DIR__;
$dirtx = dirname( dirname( __DIR__ ) );
$cf = $dirtx . '/1.adi';
$possible_dirs = array(
    '/usr/bin/tqsl',
    '/bin/tqsl',
    '/usr/local/bin/tqsl',
    '/opt/tqsl/bin/tqsl',
);
$tqsl_location = '';
foreach ( $possible_dirs as $dir ) {
    if ( file_exists( $dir ) ) {
        $tqsl_location = $dir;
        break;
    }
}
if ( !empty( $tqsl_location ) ) {
    $command = 'export DISPLAY=:1 && ' . $tqsl_location . ' -c ' . $milicencia . ' -l ' . $milicencia . ' -q -d -u ' . $cf . ' -a all > /dev/null 2>&1 &';
    $output = shell_exec( $command );
    echo "Enviando lotw\n\r";
} else {
    echo "Error tqsl no found\n\r";
}
?>
