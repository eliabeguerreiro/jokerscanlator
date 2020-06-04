<?php 
error_reporting(0);
session_start();
include_once('conexao.php');
$pg = $_GET['pg'];


if ($pg == 'upload'){
    $_SESSION = $_POST;
    header('Location: projetos/'.$_POST['projeto'].'/index.php');
    }
    
?>
<html>
<head>
        <title>Upload de imagens com PHP</title>
        <meta charset="utf-8"/>
</head>
<body>
    <form enctype="multipart/form-data" method="POST" action="index.php?pg=upload">
        <label>Número do capitulo: </label>
        <input type="text" name="capitulo"><br><br>
        <label for="imagem">Imagens:</label><br/>
        <input type="file" name="arquivo[]" multiple="multiple"/></br></br>
        <label for="projeto">Projeto</label>
        <select name="projeto">
            <option value="">--</option>
            <option value="peerless_dad">Peerless Dad</option>
            <option value="yuru_camp">Yuru camp</option>
        </select>
        <input name="enviar" type="submit" value="Enviar"/>
    </form>
</body>
</html>
<?php

