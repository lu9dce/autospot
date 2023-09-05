<!DOCTYPE html>
<html>
<head>
    <title>Configuración</title>
    <style>
        @font-face {
            font-family: mono;
        }
        body {
            font-family: sans;
            font-size: 14px;
            background-color: rgb(50, 50, 50);
            /* margin: 5px;*/
            /* padding: 0px;*/
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        p {
        color: green;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        border-bottom: 2px solid blue;
        }
        #content {
            width: 500px;
            text-align: center;
            margin: 0 auto;
            background-color: #F0F0F0;
            padding: 10px;
            border: 2px solid black;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
        }
        @media (max-width: 800px) {
            body {
                padding: 20px;
            }
            #content {
                width: auto;
            }
        }
        form {
            margin-top: 20px;
        }
        label {
            font-family: mono;
            font-size: 12px;
            display: inline-block;
            width: 20%;
            padding: 5px 0;
        }
        input[type=text],
        input[type=password],
        select {
            font-family: mono;
            font-size: 12px;
            width: 50%;
            padding: 5px 5px;
            margin: 1px 0;
            display: inline-block;
            border: 2px solid rgb(204, 204, 204);
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            font-family: mono;
            font-size: 18px;
            width: 150px;
            background-color: rgb(0, 20, 255);
            color: white;
            padding: 5px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            font-family: mono;
            font-size: 18px;
            background-color: rgb(255, 40, 40);
        }
        h2 {
            font-family: mono;
            font-size: 18px;
            background-color: rgb(0, 20, 255);
            color: rgb(255, 255, 255);
        }
        label {
        text-align: left;
        }
        button {
        display: inline-block;
        padding: 5px 10px;
        font-size: 10px;
        border: 2px solid;
        border-radius: 15px;
        cursor: pointer;
        color: white;
        background-image: linear-gradient(#005500, #110000);
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<center>
<pre>
  <a href="../index.php"><button>EXIT</button></a> <a href="menu.php"><button>RECARGA</button></a>
<pre>
</center>
<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
$archivoVariables = 'variables.php';
include($archivoVariables);
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
$webuser = base64_decode($webuser);
$webpass = base64_decode($webpass);
$valid_username = $webuser;
$valid_password = $webpass;
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != $valid_username || $_SERVER['PHP_AUTH_PW'] != $valid_password) {
    header('WWW-Authenticate: Basic realm="Acceso restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<br><center>Acceso no autorizado.</center>';
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $milicencia = base64_encode($_POST["milicencia"]);
    $miemail = base64_encode($_POST["miemail"]);
    $minombre = base64_encode($_POST["minombre"]);
    $miqth = base64_encode($_POST["miqth"]);
    $migrid = base64_encode($_POST["migrid"]);
    $dxcomen = base64_encode($_POST["dxcomen"]);
    $activacluster = base64_encode($_POST["activacluster"]);
    $clustertelnet = base64_encode($_POST["clustertelnet"]);
    $clusterport = base64_encode($_POST["clusterport"]);
    $activaeqsl = base64_encode($_POST["activaeqsl"]);
    $eqsluser = base64_encode($_POST["eqsluser"]);
    $eqslpass = base64_encode($_POST["eqslpass"]);
    $activaaprs = base64_encode($_POST["activaaprs"]);
    $aprsqth = base64_encode($_POST["aprsqth"]);
    $aprscode = base64_encode($_POST["aprscode"]);
    $activaclublog = base64_encode($_POST["activaclublog"]);
    $clubuser = base64_encode($_POST["clubuser"]);
    $clubmail = base64_encode($_POST["clubmail"]);
    $clubpass = base64_encode($_POST["clubpass"]);
    $activahrdlog = base64_encode($_POST["activahrdlog"]);
    $hrduser = base64_encode($_POST["hrduser"]);
    $hrdcode = base64_encode($_POST["hrdcode"]);
    $activaargentina = base64_encode($_POST["activaargentina"]);
    $argenuser = base64_encode($_POST["argenuser"]);
    $argenpass = base64_encode($_POST["argenpass"]);
    $activaqrz = base64_encode($_POST["activaqrz"]);
    $qrzuser = base64_encode($_POST["qrzuser"]);
    $qrzpass = base64_encode($_POST["qrzpass"]);
    $qrzkey = base64_encode($_POST["qrzkey"]);
    $activahamqth = base64_encode($_POST["activahamqth"]);
    $hamuser = base64_encode($_POST["hamuser"]);
    $hampass = base64_encode($_POST["hampass"]);
    $activalotw = base64_encode($_POST["activalotw"]);
    $activamail = base64_encode($_POST["activamail"]);
    $fondo = base64_encode($_POST["fondo"]);
    $usemail = base64_encode($_POST["usemail"]);
    $useport = base64_encode($_POST["useport"]);
    $useuser = base64_encode($_POST["useuser"]);
    $usepass = base64_encode($_POST["usepass"]);
    $uportzx = base64_encode($_POST["uportzx"]);
    $tportzx = base64_encode($_POST["tportzx"]);
    $textqsl = base64_encode($_POST["textqsl"]);
    $webuser = base64_encode($_POST["webuser"]);
    $webpass = base64_encode($_POST["webpass"]);
    $contenido = '<?php' . PHP_EOL .
                 '$milicencia = "' . $milicencia . '";' . PHP_EOL .
                 '$miemail = "' . $miemail . '";' . PHP_EOL .
                 '$minombre = "' . $minombre . '";' . PHP_EOL .
                 '$miqth = "' . $miqth . '";' . PHP_EOL .
                 '$migrid = "' . $migrid . '";' . PHP_EOL .
                 '$dxcomen = "' . $dxcomen . '";' . PHP_EOL .
                 '$activacluster = "' . $activacluster . '";' . PHP_EOL .
                 '$clustertelnet = "' . $clustertelnet . '";' . PHP_EOL .
                 '$clusterport = "' . $clusterport . '";' . PHP_EOL .
                 '$activaeqsl = "' . $activaeqsl . '";' . PHP_EOL .
                 '$eqsluser = "' . $eqsluser . '";' . PHP_EOL .
                 '$eqslpass = "' . $eqslpass . '";' . PHP_EOL .
                 '$activaaprs = "' . $activaaprs . '";' . PHP_EOL .
                 '$aprsqth = "' . $aprsqth . '";' . PHP_EOL .
                 '$aprscode = "' . $aprscode . '";' . PHP_EOL .
                 '$activaclublog = "' . $activaclublog . '";' . PHP_EOL .
                 '$clubuser = "' . $clubuser . '";' . PHP_EOL .
                 '$clubmail = "' . $clubmail . '";' . PHP_EOL .
                 '$clubpass = "' . $clubpass . '";' . PHP_EOL .
                 '$activahrdlog = "' . $activahrdlog . '";' . PHP_EOL .
                 '$hrduser = "' . $hrduser . '";' . PHP_EOL .
                 '$hrdcode = "' . $hrdcode . '";' . PHP_EOL .
                 '$activaargentina = "' . $activaargentina . '";' . PHP_EOL .
                 '$argenuser = "' . $argenuser . '";' . PHP_EOL .
                 '$argenpass = "' . $argenpass . '";' . PHP_EOL .
                 '$activaqrz = "' . $activaqrz . '";' . PHP_EOL .
                 '$qrzuser = "' . $qrzuser . '";' . PHP_EOL .
                 '$qrzpass = "' . $qrzpass . '";' . PHP_EOL .
                 '$qrzkey = "' . $qrzkey . '";' . PHP_EOL .
                 '$activahamqth = "' . $activahamqth . '";' . PHP_EOL .
                 '$hamuser = "' . $hamuser . '";' . PHP_EOL .
                 '$hampass = "' . $hampass . '";' . PHP_EOL .
                 '$activalotw = "' . $activalotw . '";' . PHP_EOL .
                 '$activamail = "' . $activamail . '";' . PHP_EOL .
                 '$fondo = "' . $fondo . '";' . PHP_EOL .
                 '$usemail = "' . $usemail . '";' . PHP_EOL .
                 '$useport = "' . $useport . '";' . PHP_EOL .
                 '$useuser = "' . $useuser . '";' . PHP_EOL .
                 '$usepass = "' . $usepass . '";' . PHP_EOL .
                 '$uportzx = "' . $uportzx . '";' . PHP_EOL .
                 '$tportzx = "' . $tportzx . '";' . PHP_EOL .
                 '$textqsl = "' . $textqsl . '";' . PHP_EOL .
                 '$webuser = "' . $webuser . '";' . PHP_EOL .
                 '$webpass = "' . $webpass . '";' . PHP_EOL .
                 '?>';
    file_put_contents($archivoVariables, $contenido);
    sleep (1);
    header("Location: ../index.php");
    exit;
}
?>
<div id="content">
<h2>Configuración</h2>
<form method="post" action="">
    <p>Acceso a la web</p>
    <label for="webuser">Usuario:</label>
    <input type="text" name="webuser" value="<?php echo $webuser; ?>"><br>
    <label for="webpass">Contraseña:</label>
    <input type="password" name="webpass" value="<?php echo $webpass; ?>"><br>
    <p>Datos de usuario</p>
    <label for="milicencia">Licencia:</label>
    <input type="text" name="milicencia" value="<?php echo $milicencia; ?>"><br>
    <label for="miemail">Email:</label>
    <input type="text" name="miemail" value="<?php echo $miemail; ?>"><br>
    <label for="minombre">Nombre:</label>
    <input type="text" name="minombre" value="<?php echo $minombre; ?>"><br>
    <label for="miqth">QTH:</label>
    <input type="text" name="miqth" value="<?php echo $miqth; ?>"><br>
    <label for="migrid">Grid:</label>
    <input type="text" name="migrid" value="<?php echo $migrid; ?>"><br>
    <label for="dxcomen">Comentario DX:</label>
    <input type="text" name="dxcomen" value="<?php echo $dxcomen; ?>"><br>
    <p>Puertos a escuchar</p>
    <label for="dxcomen">UDP port:</label>
    <input type="text" name="uportzx" value="<?php echo $uportzx; ?>"><br>
    <label for="dxcomen">TCP port:</label>
    <input type="text" name="tportzx" value="<?php echo $tportzx; ?>"><br>
    <p>Datos del cluster</p>
    <label for="activacluster">Activa:</label>
    <input type="text" name="activacluster" value="<?php echo $activacluster; ?>"><br>
    <label for="clustertelnet">IP:</label>
    <input type="text" name="clustertelnet" value="<?php echo $clustertelnet; ?>"><br>
    <label for="clusterport">Puerto:</label>
    <input type="text" name="clusterport" value="<?php echo $clusterport; ?>"><br>
    <p>Datos de EQSL</p>
    <label for="activaeqsl">Activa:</label>
    <input type="text" name="activaeqsl" value="<?php echo $activaeqsl; ?>"><br>
    <label for="eqsluser">Usuario:</label>
    <input type="text" name="eqsluser" value="<?php echo $eqsluser; ?>"><br>
    <label for="eqslpass">Contraseña:</label>
    <input type="password" name="eqslpass" value="<?php echo $eqslpass; ?>"><br>
    <p>Datos de APRS</p>
    <label for="activaaprs">Activa:</label>
    <input type="text" name="activaaprs" value="<?php echo $activaaprs; ?>"><br>
    <label for="aprsqth">Coordenadas:</label>
    <input type="text" name="aprsqth" value="<?php echo $aprsqth; ?>"><br>
    <label for="aprscode">Passcode:</label>
    <input type="password" name="aprscode" value="<?php echo $aprscode; ?>"><br>
    <p>Datos de Club Log</p>
    <label for="activaclublog">Activa:</label>
    <input type="text" name="activaclublog" value="<?php echo $activaclublog; ?>"><br>
    <label for="clubuser">Usuario:</label>
    <input type="text" name="clubuser" value="<?php echo $clubuser; ?>"><br>
    <label for="clubmail">Email:</label>
    <input type="text" name="clubmail" value="<?php echo $clubmail; ?>"><br>
    <label for="clubpass">Contraseña:</label>
    <input type="password" name="clubpass" value="<?php echo $clubpass; ?>"><br>
    <p>Datos de HRDLOG</p>
    <label for="activahrdlog">Activa:</label>
    <input type="text" name="activahrdlog" value="<?php echo $activahrdlog; ?>"><br>
    <label for="hrduser">Usuario:</label>
    <input type="text" name="hrduser" value="<?php echo $hrduser; ?>"><br>
    <label for="hrdcode">Código:</label>
    <input type="password" name="hrdcode" value="<?php echo $hrdcode; ?>"><br>
    <p>Datos de Log Argentina</p>
    <label for="activaargentina">Activa:</label>
    <input type="text" name="activaargentina" value="<?php echo $activaargentina; ?>"><br>
    <label for="argenuser">Usuario:</label>
    <input type="text" name="argenuser" value="<?php echo $argenuser; ?>"><br>
    <label for="argenpass">Contraseña:</label>
    <input type="password" name="argenpass" value="<?php echo $argenpass; ?>"><br>
    <p>Datos de QRZ</p>
    <label for="activaqrz">Activa:</label>
    <input type="text" name="activaqrz" value="<?php echo $activaqrz; ?>"><br>
    <label for="qrzuser">Usuario:</label>
    <input type="text" name="qrzuser" value="<?php echo $qrzuser; ?>"><br>
    <label for="qrzpass">Contraseña:</label>
    <input type="password" name="qrzpass" value="<?php echo $qrzpass; ?>"><br>
    <label for="qrzkey">KEY:</label>
    <input type="password" name="qrzkey" value="<?php echo $qrzkey; ?>"><br>
    <p>Datos de HAMQTH</p>
    <label for="activahamqth">Activa:</label>
    <input type="text" name="activahamqth" value="<?php echo $activahamqth; ?>"><br>
    <label for="hamuser">Usuario:</label>
    <input type="text" name="hamuser" value="<?php echo $hamuser; ?>"><br>
    <label for="hampass">Contraseña:</label>
    <input type="password" name="hampass" value="<?php echo $hampass; ?>"><br>
    <p>Datos de LoTW</p>
    <label for="activalotw">Activa:</label>
    <input type="text" name="activalotw" value="<?php echo $activalotw; ?>"><br>
    <p>Datos para E-Mail</p>
    <label for="activamail">Activa:</label>
    <input type="text" name="activamail" value="<?php echo $activamail; ?>"><br>
    <label for="fondo">Fondo:</label>
    <input type="text" name="fondo" value="<?php echo $fondo; ?>"><br>
    <label for="textqsl">Texto QSL:</label>
    <input type="text" name="textqsl" value="<?php echo $textqsl; ?>"><br>
    <label for="usemail">SMTP IP:</label>
    <input type="text" name="usemail" value="<?php echo $usemail; ?>"><br>
    <label for="useport">SMTP Puerto:</label>
    <input type="text" name="useport" value="<?php echo $useport; ?>"><br>
    <label for="useuser">Mail:</label>
    <input type="text" name="useuser" value="<?php echo $useuser; ?>"><br>
    <label for="usepass">Contraseña:</label>
    <input type="password" name="usepass" value="<?php echo $usepass; ?>"><br>
    <input type="submit" value="Guardar">
</form>
</div>
<br><br><br><br>
</body>
</html>
