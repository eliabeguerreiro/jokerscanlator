<?php 
error_reporting(0);
session_start();
include_once('conexao.php');

?>
<html>
<head>
        <title>Painel de Projetos</title>
        <meta charset="utf-8"/>
</head>
<body>
    
    <label for="projeto">Projetos:</label></br>
    <?php

//aqui vão aparecer todos os projetos existentes



echo "<a href='projetos/peerless_dad/peerless_dad.php'>Peerless Dad</a></br>";
echo "<a href='projetos/yuru_camp/yuru_camp.php'>Yuru Camp</a></br>";






//acesso ao sistema de postagem do blog







echo "</br></br><a href='../../index.php'>Voltar</a>";
?>
       
</body>
</html>
<?php
