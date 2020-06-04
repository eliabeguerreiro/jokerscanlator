<?php 
error_reporting(0);
session_start();
include_once('conexao.php');
$pg = $_GET['pg'];


if ($pg == 'upload'){
    $_SESSION = $_POST;
    header('Location: projetos/index.php');
    }
    
?>
<html>
<head>
        <title>Painel de Projetos</title>
        <meta charset="utf-8"/>
</head>
<body>
    <form enctype="multipart/form-data" method="POST" action="index.php?pg=upload">      
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

