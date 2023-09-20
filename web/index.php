<!DOCTYPE html>
<html>
<head>
    <title>DXCluster - By LU9DCE</title>
<style>
  :root {
    --background-color-even: #1a1a1a;
    --background-color-odd: #101010;
  }

  @keyframes changeColor {
    0% {
      background-color: #101010;
    }
    50% {
      background-color: red;
    }
    100% {
      background-color: #101010;
    }
  }

  .highlight-row {
    animation-name: changeColor;
    animation-duration: 1s;
    animation-fill-mode: forwards;
  }

  body {
    background-color: #000;
    color: #00ff00;
    font-family: monospace;
  }

  table {
    border-collapse: collapse;
    background-color: #101010;
    width: auto;
    table-layout: auto;
  }

tr {
  border-bottom: 1px solid #103010;
}

  table th, table td {
    text-align: left;
    padding: 8px;
  }

  .circle {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }

  .red-circle {
    background-color: #ff0000;
  }

  .green-circle {
    background-color: #00ff00;
  }

  .qsook {
    color: #00ff00;
  }

  .qsono {
    color: #ff0000;
  }

.tper{
  background: linear-gradient(yellow, green);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  -webkit-text-stroke: 1px black;
  filter: drop-shadow(2px 2px #103010);
  font-size: 30px;
}

</style>
  <meta http-equiv="refresh" content="60">
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include __DIR__ . '/modulos/variables.php';
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
?>
</head>
<body>
    <div style="text-align: center;">
    <h1 class="tper">Auto-Spot - <?php echo $milicencia; ?></h1>
    <button onclick="location.href='modulos/menu.php'">Menu</button><br>
    </div><br>
<?php

function calcDist($loc1, $loc2)
{
    $ll1 = locToLL($loc1);
    $ll2 = locToLL($loc2);
    $dist = calcDistLL($ll1[0], $ll1[1], $ll2[0], $ll2[1]);
    return $dist;
}

function locToLL($loc)
{
    $ln = (ord($loc[0]) - 65) * 20 - 180;
    $lt = (ord($loc[1]) - 65) * 10 - 90;
    $ln += intval($loc[2]) * 2;
    $lt += intval($loc[3]) * 1;
    return array($lt, $ln);
}

function calcDistLL($lt1, $ln1, $lt2, $ln2)
{
    $r = 6371;
    $lt1 = deg2rad($lt1);
    $ln1 = deg2rad($ln1);
    $lt2 = deg2rad($lt2);
    $ln2 = deg2rad($ln2);
    $dlt = $lt2 - $lt1;
    $dln = $ln2 - $ln1;
    $a = sin($dlt / 2) * sin($dlt / 2) + cos($lt1) * cos($lt2) * sin($dln / 2) * sin($dln / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $dist = $r * $c;
    return $dist;
}

function load_cty_array()
{
    $cty_array = array();
    $dirt = __DIR__ . '/cty.csv';
    $handle = fopen($dirt, "r");
    while (($raw_string = fgets($handle)) !== false) {
        $row = str_getcsv($raw_string);
        $array = explode(' ', $row[9]);
        foreach ($array as &$value) {
            $value = str_replace(';', '', $value);
            $cty_array[$value] = $row[1];
        }
    }
    fclose($handle);
    return $cty_array;
}
$cty_array = load_cty_array();
function locate($licrx)
{
    global $cty_array;
    $z = strlen($licrx);
    for ($i = $z; $i >= 1; $i--) {
        $licrx = substr($licrx, 0, $i);
        if (isset($cty_array[$licrx])) {
            return $cty_array[$licrx];
        }
    }
    return "??";
}

$fechaActual = date('Ym');
$archivoLog = dirname(__DIR__) . "/cluster.adi";
$logContenido = file_get_contents($archivoLog);
$conteoPorDia = array();
for ($dia = 1; $dia <= 31; $dia++) {
    $conteoPorDia[$dia] = 0;
}
$patron = '/<QSO_DATE:?\d*:?\w?>?(\d{8})/i';
preg_match_all($patron, $logContenido, $fechas);
if (isset($fechas[1])) {
    foreach ($fechas[1] as $fecha) {
        $dia = intval(substr($fecha, 6, 2));
        if ($dia >= 1 && $dia <= 31 && substr($fecha, 0, 6) == $fechaActual) {
            $conteoPorDia[$dia]++;
        }
    }
}
$resultados = array();
foreach ($conteoPorDia as $conteo) {
    $resultados[] = $conteo;
}
$cresu = $resultados;
$anchoImagen = 800;
$altoImagen = 150;
$margen = 40;
$imagen = imagecreatetruecolor($anchoImagen, $altoImagen);
$colorFondo = imagecolorallocate($imagen, 0, 0, 0);
$colorLineas = imagecolorallocate($imagen, 50, 50, 50);
$colorLineaEstadistica = imagecolorallocate($imagen, 0, 255, 0);
$colorTexto = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $colorFondo);
$valorMaximo = max($resultados);
$valorMinimo = min($resultados);
$intervaloY = ($altoImagen - 2 * $margen) / ($valorMaximo - $valorMinimo + 1);
for ($i = 0; $i <= floor($valorMaximo / 10); $i++) {
    $y = $altoImagen - $margen - $i * 10 * $intervaloY;
    imageline($imagen, $margen, $y, $anchoImagen - $margen, $y, $colorLineas);
}
$anchoBarra = ($anchoImagen - 2 * $margen) / count($resultados);
$x = $margen + $anchoBarra;
for ($i = 1; $i < count($resultados); $i++) {
    imageline($imagen, $x, $margen, $x, $altoImagen - $margen, $colorLineas);
    $x += $anchoBarra;
}
$x = $margen;
for ($i = 0; $i < count($resultados); $i++) {
    $y = $altoImagen - $margen - ($resultados[$i] - $valorMinimo) * $intervaloY;
    if ($i > 0) {
        imageline($imagen, $x - $anchoBarra, $yAnterior, $x, $y, $colorLineaEstadistica);
    }
    $yAnterior = $y;
    $x += $anchoBarra;
}
$xTexto = $margen - 25;
$yTextoMinimo = $altoImagen - $margen - ($valorMinimo - $valorMinimo) * $intervaloY - 5;
$yTextoMedio = $altoImagen - $margen - (($valorMaximo - $valorMinimo) / 2) * $intervaloY - 5;
$yTextoMaximo = $altoImagen - $margen - ($valorMaximo - $valorMinimo) * $intervaloY - 5;
imagestring($imagen, 3, $xTexto, $yTextoMinimo, $valorMinimo, $colorTexto);
imagestring($imagen, 3, $xTexto, $yTextoMedio, round(($valorMaximo + $valorMinimo) / 2), $colorTexto);
imagestring($imagen, 3, $xTexto, $yTextoMaximo, $valorMaximo, $colorTexto);
$yTexto = $altoImagen - $margen + 10;
for ($i = 1; $i <= count($resultados); $i++) {
    $xTexto = ($margen / 1.3) + $anchoBarra * ($i - 1) + ($anchoBarra / 2) - (strlen($i) * 4);
    imagestring($imagen, 3, $xTexto, $yTexto, $i, $colorTexto);
}
imagejpeg($imagen, 'grafico.jpg');
imagedestroy($imagen);
$rutaArchivo = $archivoLog;
$lineasArchivo = file($rutaArchivo, FILE_IGNORE_NEW_LINES);
$qsos = array();
foreach ($lineasArchivo as $linea) {
    $linea = strtoupper($linea);
    if (preg_match("/$fechaActual/", $linea)) {
        $regex = '/<([A-Z0-9_]+):(\d+)(:[A-Z])?>([^<\s]+)\s*/';
        preg_match_all($regex, $linea, $matches, PREG_SET_ORDER);
        foreach ($matches as $i => $match) {
            $field = $match[1];
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
    }
}
$fecha_actual = date('Ymd');
$resultados = array();
foreach ($qsos as $i => $qso) {
    $qso_date = $qso['QSO_DATE'];
    if ($qso_date !== $fecha_actual) {
        continue;
    }
    $call = $qso['CALL'];
    $gridsquare = isset($qso['GRIDSQUARE']) ? $qso['GRIDSQUARE'] : '';
    $mode = $qso['MODE'];
    $rst_sent = $qso['RST_SENT'];
    $rst_rcvd = $qso['RST_RCVD'];
    $time_on = $qso['TIME_ON'];
    $band = $qso['BAND'];
    $freq = substr($qso['FREQ'], 0, 6);
    $qso_date = strtotime($qso_date);
    $qso_date = date('Y-m-d', $qso_date);
    $time_on = strtotime($time_on);
    $time_on = date('H:i:s', $time_on);
    $resultados[] = array(
        'call' => $call,
        'gridsquare' => $gridsquare,
        'mode' => $mode,
        'rst_sent' => $rst_sent,
        'rst_rcvd' => $rst_rcvd,
        'qso_date' => $qso_date,
        'time_on' => $time_on,
        'band' => $band,
        'freq' => $freq,
    );
}
echo '<table border="2" align="center" style="width: 500px; font-size: 10px;">';
echo '<tbody>';
echo '<tr align="center"><td style="text-align:center; font-weight: normal; color: white;">Day</td>';
for ($diax = 1; $diax <= 31; $diax++) {
    $diaseros = str_pad($diax, 2, '0', STR_PAD_LEFT);
    echo "<th style='text-align:center; font-weight: normal; color: white;'>$diaseros</th>";
}
echo '</tr>';
echo '<tr align="center"><td style="text-align:center; font-weight: normal; color: white;">QSOs</td>';
for ($diax = 0; $diax <= 30; $diax++) {
    $repeticiones = isset($cresu[$diax]) ? $cresu[$diax] : 0;
    echo "<td style='text-align:center; font-weight: normal; color: white;'>$repeticiones</td>";
}
echo '</tr>';
echo '</table>';
$n = count($resultados);
$resultados = array_reverse($resultados);
$archivo = fopen($archivoLog, 'r');
$anoActual = date('Y');
$repeticionesPorMes = array();
while ($linea = fgets($archivo)) {
    $linea = strtoupper($linea);
    if (preg_match('/<QSO_DATE:8>(\d{8})/', $linea, $matches)) {
        $fecha = $matches[1];
        $ano = substr($fecha, 0, 4);
        $mes = substr($fecha, 4, 2);
        if ($ano == $anoActual) {
            $clave = $mes;
            if (isset($repeticionesPorMes[$clave])) {
                $repeticionesPorMes[$clave]++;
            } else {
                $repeticionesPorMes[$clave] = 1;
            }
        }
    }
}
fclose($archivo);
echo '<center><img src="grafico.jpg" alt="grafico"></center>';
echo '<table border="2" align="center" style="width: 600px;">';
echo '<tr align="center"><th style="text-align:center; font-weight: normal; color: white; width: 10%;">Month</th>';
$mesesDelAno = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
foreach ($mesesDelAno as $mes) {
    echo "<th style='text-align:center; font-weight: normal; color: white; width: 7%;'> $mes</th>";
}
echo '</tr>';
echo '<tr align="center"><td style="text-align:center; font-weight: normal; color: white;">QSOs</td>';
foreach ($mesesDelAno as $mes) {
    $repeticiones = isset($repeticionesPorMes[$mes]) ? $repeticionesPorMes[$mes] : 0;
    echo "<td style='text-align:center; font-weight: normal; color: white; width: 7%;'>$repeticiones</td>";
}
echo '</tr>';
echo '</table><br>';
$table = '<table align="center">';
$table .= '<tr>';
$table .= '<th>Qso</th>';
$table .= '<th>Call</th>';
$table .= '<th>Grid</th>';
$table .= '<th>Mode</th>';
$table .= '<th>Sent</th>';
$table .= '<th>Rcvd</th>';
$table .= '<th>Date</th>';
$table .= '<th>Time</th>';
$table .= '<th>Band</th>';
$table .= '<th>Freq</th>';
$table .= '<th>Country</th>';
$table .= '<th>Dist Km</th>';
$table .= '</tr>';
foreach ($resultados as $i => $resultado) {
    $gg = $n - $i;
    $loc2 = $migrid;
    $loc1 = $resultado['gridsquare'];
    if ($loc1 == "") {
        $loc1 = $loc2;
    }
    $table .= '<tr>';
    $table .= '<td>' . $gg . '</td>';
    $table .= '<td>' . $resultado['call'] . '</td>';
    $table .= '<td>' . $resultado['gridsquare'] . '</td>';
    $table .= '<td>' . $resultado['mode'] . '</td>';
    $table .= '<td>' . $resultado['rst_sent'] . '</td>';
    $table .= '<td>' . $resultado['rst_rcvd'] . '</td>';
    $table .= '<td>' . $resultado['qso_date'] . '</td>';
    $table .= '<td>' . $resultado['time_on'] . '</td>';
    $table .= '<td>' . $resultado['band'] . '</td>';
    $table .= '<td>' . $resultado['freq'] . '</td>';
    $table .= '<td>' . locate($resultado['call']) . '</td>';
    $dista = number_format(calcDist($loc1, $loc2), 0, '', '.');
    if ($dista == "0") {
        $dista = "No Grid";
    }
    $table .= '<td>' . $dista . '</td>';
    $table .= '</tr>';
}
$table .= '</table>';
echo $table;
?>
<br><br>
 </body>
</html>
