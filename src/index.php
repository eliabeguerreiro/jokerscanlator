<?php 
error_reporting(0);
session_start();
include_once('conecao.php');
$pg = $_GET['pg'];
?>
<html>
<head>
        <title>Upload de imagens com PHP</title>
        <meta charset="utf-8"/>
</head>
<body>
    <form enctype="multipart/form-data" method="POST" action="index.php?pg=upload">
        <label for="imagem">Imagens:</label><br/>
        <input type="file" name="arquivo[]" multiple="multiple"/></br></br>
        <input name="enviar" type="submit" value="Enviar"/>
    </form>
</body>
</html>
<?php










if ($pg = 'upload'){
    $diretorio = "img/";

    if (!is_dir($diretorio)){
        echo "Diretorio $diretorio Inesistente.";
    }else{
        $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
        for ($controle = 0; $controle < count($arquivo['name']); $controle++){
            $destino = $diretorio."/".$arquivo['name'] [$controle];
            if (move_uploaded_file($arquivo['tmp_name'] [$controle], $destino)){
                echo 'Upload da imagem: '.$arquivo['tmp_name'].' executado com sucesso.' ;
            }else{
                echo 'O Upload falhou';
            }
        }
    }
    
}
