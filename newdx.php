<?php
require __DIR__ . '/web/modulos/PHPMailer/src/Exception.php';
require __DIR__ . '/web/modulos/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/web/modulos/PHPMailer/src/SMTP.php';
$adiFile = __DIR__ . '/cluster.adi';
$dworDir = __DIR__ . '/web/';
$os = strtoupper(PHP_OS);
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
if (!file_exists($adiFile)) {
    file_put_contents($adiFile, "");
}
if ($os === 'LINUX') {
    exec("sudo fuser -k -n tcp 80");
    $command = 'sudo sh -c "php -S 0.0.0.0:80 -t web/ > /dev/null 2>&1 &"';
    exec($command);
}
date_default_timezone_set('UTC');
function deco()
{
    global $milicencia, $miemail, $minombre, $miqth, $migrid, $dxcomen, $activacluster, $clustertelnet, $clusterport, $activaeqsl, $eqsluser, $eqslpass, $activaaprs, $aprsqth, $aprscode, $activaclublog, $clubuser, $clubmail, $clubpass, $activahrdlog, $hrduser, $hrdcode, $activaargentina, $argenuser, $argenpass, $activaqrz, $qrzuser, $qrzpass, $qrzkey, $activahamqth, $hamuser, $hampass, $activalotw, $activamail, $fondo, $usemail, $useport, $useuser, $usepass, $uportzx, $tportzx, $textqsl;
    $milicencia = base64_decode($milicencia);
    $miemail = base64_decode($miemail);
    $minombre = base64_decode($minombre);
    $miqth = base64_decode($miqth);
    $migrid = base64_decode($migrid);
    $dxcomen = base64_decode($dxcomen);
    $activacluster = base64_decode($activacluster);
    $clustertelnet = base64_decode($clustertelnet);
    $clusterport = base64_decode($clusterport);
    $activaeqsl = base64_decode($activaeqsl);
    $eqsluser = base64_decode($eqsluser);
    $eqslpass = base64_decode($eqslpass);
    $activaaprs = base64_decode($activaaprs);
    $aprsqth = base64_decode($aprsqth);
    $aprscode = base64_decode($aprscode);
    $activaclublog = base64_decode($activaclublog);
    $clubuser = base64_decode($clubuser);
    $clubmail = base64_decode($clubmail);
    $clubpass = base64_decode($clubpass);
    $activahrdlog = base64_decode($activahrdlog);
    $hrduser = base64_decode($hrduser);
    $hrdcode = base64_decode($hrdcode);
    $activaargentina = base64_decode($activaargentina);
    $argenuser = base64_decode($argenuser);
    $argenpass = base64_decode($argenpass);
    $activaqrz = base64_decode($activaqrz);
    $qrzuser = base64_decode($qrzuser);
    $qrzpass = base64_decode($qrzpass);
    $qrzkey = base64_decode($qrzkey);
    $activahamqth = base64_decode($activahamqth);
    $hamuser = base64_decode($hamuser);
    $hampass = base64_decode($hampass);
    $activalotw = base64_decode($activalotw);
    $activamail = base64_decode($activamail);
    $fondo = base64_decode($fondo);
    $usemail = base64_decode($usemail);
    $useport = base64_decode($useport);
    $useuser = base64_decode($useuser);
    $usepass = base64_decode($usepass);
    $uportzx = base64_decode($uportzx);
    $tportzx = base64_decode($tportzx);
    $textqsl = base64_decode($textqsl);
}
include __DIR__ . '/web/modulos/variables.php';
deco();
if (file_exists(__DIR__ . '/1.adi')) {
    unlink(__DIR__ . '/1.adi');
}
$ip = "0.0.0.0";
if ($tportzx == null || $tportzx == "") {
    $tportzx = "52001";
}
$tcpPort = $tportzx;
$tcpSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($tcpSocket, $ip, $tcpPort);
socket_listen($tcpSocket);
echo "Esperando conexiones TCP en $ip:$tcpPort..." . PHP_EOL;
if ($uportzx == null || $uportzx == "") {
    $uportzx = "2223";
}
$udpPort = $uportzx;
$udpSocket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($udpSocket, $ip, $udpPort);
echo "Esperando datos UDP en $ip:$udpPort..." . PHP_EOL;
while (true) {
    $hash = hash_file("crc32", $adiFile);
    while ($hash === hash_file("crc32", $adiFile)) {
        $readSockets = array($tcpSocket, $udpSocket);
        $writeSockets = array();
        $exceptSockets = null;
        $timeout = 2;
        if (socket_select($readSockets, $writeSockets, $exceptSockets, $timeout) > 0) {
            foreach ($readSockets as $readSocket) {
                if ($readSocket === $tcpSocket) {
                    $clientSocket = socket_accept($tcpSocket);
                    $data = socket_read($clientSocket, 1024);
                    $data = procqso($data);
                    $data = genadi($data);
                    $data = $data[0];
                    echo "---------------------------------------------------" . PHP_EOL;
                    echo "Datos TCP: $data" . PHP_EOL;
                    echo "---------------------------------------------------" . PHP_EOL;
                    file_put_contents($adiFile, $data . "\n", FILE_APPEND);
                    socket_close($clientSocket);
                } elseif ($readSocket === $udpSocket) {
                    socket_recvfrom($udpSocket, $data, 1024, 0, $client_ip, $client_port);
                    $data = procqso($data);
                    $data = genadi($data);
                    $data = $data[0];
                    echo "---------------------------------------------------" . PHP_EOL;
                    echo "Datos UDP: $data" . PHP_EOL;
                    echo "---------------------------------------------------" . PHP_EOL;
                    file_put_contents($adiFile, $data . "\n", FILE_APPEND);
                }
            }
        }
    }
    sleep(1);
    $lineas = file($adiFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $last_dx = end($lineas);
    file_put_contents(__DIR__ . '/1.adi', $last_dx, FILE_APPEND);
    $last_dx = procqso($last_dx);
    qsotovar($last_dx[0]);
    $freq = str_replace('.', '', substr($freq, 0, -3));
    if ($mode === "MFSK") {
        $mode = "FT4";
    }
    if ($mode === "mfsk") {
        $mode = "ft4";
    }
    $att = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd";
    echo $att . "\n\r";
    echo "---------------------------------------------------" . PHP_EOL;
    if ($os === 'LINUX') {
    $pingresult = exec("ping -4 -n -c 1 8.8.8.8", $outcome, $status);
    } else {
    $pingresult = exec("ping -4 -n 1 8.8.8.8", $outcome, $status);
    }
    if ($status == 0) {
        include __DIR__ . '/web/modulos/variables.php';
        deco();
        $modules = ['cluster', 'aprs', 'eqsl', 'clublog', 'hrdlog', 'argentina', 'qrz', 'hamqth', 'lotw', 'mail'];
        foreach ($modules as $module) {
            if (${'activa' . $module} === "yes") {
                include __DIR__ . "/web/modulos/{$module}.php";
            }
        }
    } else {
        echo "Sin internet!\n\r";
    }
    echo "---------------------------------------------------" . PHP_EOL;
    $hash = hash_file("crc32", $adiFile);
    if (file_exists(__DIR__ . '/1.adi')) {
        unlink(__DIR__ . '/1.adi');
    }
}
