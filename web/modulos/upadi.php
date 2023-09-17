<?php
session_start();

$dirtx = dirname( dirname( __DIR__ ) );

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES["archivo"]["tmp_name"];
        $nombre_guardado = $dirtx . DIRECTORY_SEPARATOR . "cluster.adi";
        
        if (move_uploaded_file($nombre_temporal, $nombre_guardado)) {
            $_SESSION['upload_message'] = "The file has been uploaded and saved successfully.";
        } else {
            $_SESSION['upload_message'] = "There was a problem saving the file.";
        }
    } else {
        $_SESSION['upload_message'] = "Error uploading the file.";
    }

    header("Location: menu.php");
    exit;
}
?>




