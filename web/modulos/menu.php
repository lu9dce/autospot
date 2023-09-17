<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="en">
    <title>Configuración</title>
    <style>
    @font-face {
        font-family: mono;
    }

    body {
        font-family: sans;
        font-size: 14px;
        background-color: rgb(50, 50, 50);
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

    .red-div {
            background-color: red;
            color: white;
            padding: 10px;
            font-weight: bold;
    }

    .excluir {
        margin-top: -20px;
}
    </style>
</head>

<body>
    <center>
        <pre>
  <a href="../index.php"><button>Exit</button></a> <a href="menu.php"><button>Reload</button></a>
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
    header('WWW-Authenticate: Basic realm="Restricted access"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<br><center>Unauthorized.</center>';
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
<h2>Settings</h2>
Hover the mouse over the form input for assistance<br>
<p>Upload new adi</p>
<div class="red-div">
        Warning: When uploading a new ADI,
        use a complete one; this will
        overwrite the current ADI.
    </div>
    <?php
session_start();
?>
    <form class="excluir" action="upadi.php" method="POST" enctype="multipart/form-data">
    <br><label for="archivo"></label>
    <br><input type="file" name="archivo" id="archivo" accept=".adi">
    <br><input type="submit" value="Upload File"><br>
    <?php
    if (isset($_SESSION['upload_message'])) {
        echo '<div>' . $_SESSION['upload_message'] . '</div>';
        unset($_SESSION['upload_message']); // Limpia la variable de sesión después de mostrarla
    }
    ?>
</form>
<form method="post" action="">
<p>Web access</p>
<label for="webuser">User:</label>
<input type="text" name="webuser" value="<?php echo $webuser; ?>" title="Enter your username"><br>
<label for="webpass">Password:</label>
<input type="password" name="webpass" value="<?php echo $webpass; ?>" title="Enter your password"><br>
<p>User data</p>
<label for="milicencia">License:</label>
<input type="text" name="milicencia" value="<?php echo $milicencia; ?>" title="Enter your license number"><br>
<label for="miemail">Email:</label>
<input type="text" name="miemail" value="<?php echo $miemail; ?>" title="Enter your email address"><br>
<label for="minombre">Name:</label>
<input type="text" name="minombre" value="<?php echo $minombre; ?>" title="Enter your full name"><br>
<label for="miqth">QTH:</label>
<input type="text" name="miqth" value="<?php echo $miqth; ?>" title="Enter your QTH (location)"><br>
<label for="migrid">Grid:</label>
<input type="text" name="migrid" value="<?php echo $migrid; ?>" title="Enter your grid locator"><br>
<label for="dxcomen">Coment DX:</label>
<input type="text" name="dxcomen" value="<?php echo $dxcomen; ?>" title="Enter your DX comment"><br>
<p>Ports input</p>
<label for="uportzx">UDP port:</label>
<input type="text" name="uportzx" value="<?php echo $uportzx; ?>" title="Enter the UDP port number"><br>
<label for="tportzx">TCP port:</label>
<input type="text" name="tportzx" value="<?php echo $tportzx; ?>" title="Enter the TCP port number"><br>
<p>Cluster data</p>
<label for="activacluster">Activate:</label>
<input type="text" name="activacluster" value="<?php echo $activacluster; ?>" title="Enter 'yes' to activate the cluster, 'no' to deactivate"><br>
<label for="clustertelnet">IP:</label>
<input type="text" name="clustertelnet" value="<?php echo $clustertelnet; ?>" title="Enter the IP address of the cluster server"><br>
<label for="clusterport">Port:</label>
<input type="text" name="clusterport" value="<?php echo $clusterport; ?>" title="Enter the port number for the cluster connection"><br>
<p>eQSL data</p>
<label for="activaeqsl">Activate:</label>
<input type="text" name="activaeqsl" value="<?php echo $activaeqsl; ?>" title="Enter 'yes' to activate eQSL, 'no' to deactivate"><br>
<label for="eqsluser">User:</label>
<input type="text" name="eqsluser" value="<?php echo $eqsluser; ?>" title="Enter your eQSL username"><br>
<label for="eqslpass">Password:</label>
<input type="password" name="eqslpass" value="<?php echo $eqslpass; ?>" title="Enter your eQSL password"><br>
<p>APRS data</p>
<label for="activaaprs">Activate:</label>
<input type="text" name="activaaprs" value="<?php echo $activaaprs; ?>" title="Enter 'yes' to activate APRS, 'no' to deactivate"><br>
<label for="aprsqth">Coordinates:</label>
<input type="text" name="aprsqth" value="<?php echo $aprsqth; ?>" title="Enter your APRS coordinates"><br>
<label for="aprscode">Passcode:</label>
<input type="password" name="aprscode" value="<?php echo $aprscode; ?>" title="Enter your APRS passcode"><br>
<p>Club Log data</p>
<label for="activaclublog">Activate:</label>
<input type="text" name="activaclublog" value="<?php echo $activaclublog; ?>" title="Enter 'yes' to activate Club Log, 'no' to deactivate"><br>
<label for="clubuser">User:</label>
<input type="text" name="clubuser" value="<?php echo $clubuser; ?>" title="Enter your Club Log username"><br>
<label for="clubmail">Email:</label>
<input type="text" name="clubmail" value="<?php echo $clubmail; ?>" title="Enter your Club Log email address"><br>
<label for="clubpass">Password:</label>
<input type="password" name="clubpass" value="<?php echo $clubpass; ?>" title="Enter your Club Log password"><br>
<p>HRDLOG data</p>
<label for="activahrdlog">Activate:</label>
<input type="text" name="activahrdlog" value="<?php echo $activahrdlog; ?>" title="Enter 'yes' to activate HRDLOG, 'no' to deactivate"><br>
<label for="hrduser">User:</label>
<input type="text" name="hrduser" value="<?php echo $hrduser; ?>" title="Enter your HRDLOG username"><br>
<label for="hrdcode">Code:</label>
<input type="password" name="hrdcode" value="<?php echo $hrdcode; ?>" title="Enter your HRDLOG code"><br>
<p>Log Argentina data</p>
<label for="activaargentina">Activate:</label>
<input type="text" name="activaargentina" value="<?php echo $activaargentina; ?>" title="Enter 'yes' to activate Log Argentina, 'no' to deactivate"><br>
<label for="argenuser">User:</label>
<input type="text" name="argenuser" value="<?php echo $argenuser; ?>" title="Enter your Log Argentina username"><br>
<label for="argenpass">Password:</label>
<input type="password" name="argenpass" value="<?php echo $argenpass; ?>" title="Enter your Log Argentina password"><br>
<p>QRZ data</p>
<label for="activaqrz">Activate:</label>
<input type="text" name="activaqrz" value="<?php echo $activaqrz; ?>" title="Enter 'yes' to activate QRZ, 'no' to deactivate"><br>
<label for="qrzuser">User:</label>
<input type="text" name="qrzuser" value="<?php echo $qrzuser; ?>" title="Enter your QRZ username"><br>
<label for="qrzpass">Password:</label>
<input type="password" name="qrzpass" value="<?php echo $qrzpass; ?>" title="Enter your QRZ password"><br>
<label for="qrzkey">KEY:</label>
<input type="password" name="qrzkey" value="<?php echo $qrzkey; ?>" title="Enter your QRZ KEY"><br>
<p>HAMQTH data</p>
<label for="activahamqth">Activate:</label>
<input type="text" name="activahamqth" value="<?php echo $activahamqth; ?>" title="Enter 'yes' to activate HAMQTH, 'no' to deactivate"><br>
<label for="hamuser">User:</label>
<input type="text" name="hamuser" value="<?php echo $hamuser; ?>" title="Enter your HAMQTH username"><br>
<label for="hampass">Password:</label>
<input type="password" name="hampass" value="<?php echo $hampass; ?>" title="Enter your HAMQTH password"><br>
<p>LoTW data</p>
<label for="activalotw">Activate:</label>
<input type="text" name="activalotw" value="<?php echo $activalotw; ?>" title="Enter 'yes' to activate LoTW, 'no' to deactivate"><br>
<p>E-Mail data</p>
<label for="activamail">Activate:</label>
<input type="text" name="activamail" value="<?php echo $activamail; ?>" title="Enter 'yes' to activate email, 'no' to deactivate"><br>
<label for="fondo">Background:</label>
<input type="text" name="fondo" value="<?php echo $fondo; ?>" title="Enter the URL of the background JPG image"><br>
<label for="textqsl">Custom text:</label>
<input type="text" name="textqsl" value="<?php echo $textqsl; ?>" title="Enter custom text for QSL"><br>
<label for="usemail">SMTP IP:</label>
<input type="text" name="usemail" value="<?php echo $usemail; ?>" title="Enter the SMTP IP address"><br>
<label for="useport">SMTP Port:</label>
<input type="text" name="useport" value="<?php echo $useport; ?>" title="Enter the SMTP port number"><br>
<label for="useuser">Mail:</label>
<input type="text" name="useuser" value="<?php echo $useuser; ?>" title="Enter your email address"><br>
<label for="usepass">Password:</label>
<input type="password" name="usepass" value="<?php echo $usepass; ?>" title="Enter your email password"><br>
<input type="submit" value="Submit">
</form>
</div>
<br><br><br><br>
</body>
</html>