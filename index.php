<?php 
error_reporting(0);
session_start();
$imagem = $_GET['imagem'];
?>
<html>
<head>
        <title>Upload de imagens com PHP</title>
        <meta charset="utf-8"/>
</head>
<body>
    <form action="index.php" method="get" enctype="multipart/form-data">
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"/>
        <br/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>
<?php
if ($imagem){
    $_SESSION['imagem'] = $imagem;
    header('Location: gravar.php');
}
