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
        font-weight: bold;
        display: inline-block;
        padding: 5px 10px;
        font-size: 14px;
        border: 2px solid;
        border-radius: 15px;
        cursor: pointer;
        color: white;
        background-image: linear-gradient(#00AA00, #101010);
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
    }

    .red-div {
            background-color: red;
            color: white;
            padding: 10px;
            font-family: mono;
            font-size: 14px;
            font-weight: bold;
    }

    .excluir {
        margin-top: -20px;
}
    </style>
</head>

<body>
    <center>
    <div id="content">
    <h2>Adi</h2>
<div class="red-div">
        Warning: When uploading a new ADI,
        use a complete one; this will
        overwrite the current ADI.
        This process may take time, depending on the file size.
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
</center>
</div>
</body>
</html>
