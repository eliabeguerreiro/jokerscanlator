<?php
session_start();
$_SESSION['projeto'] = 'peerless_dad';
include_once('../../conexao.php');
$pg = $_GET['pg'];
//var_dump($_SESSION);


if($pg == 'cadastrarcap'){?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Upload capitulo <?php echo $_SESSION['projeto'];?></title>
	</head>
	<body>

		<form enctype="multipart/form-data" method="POST" action="index.php?pg=cadastrando">
			<label>Número do capitulo: </label>
			<input type="text" name="capitulo"><br><br>	
			<input type="file" name="arquivo[]" multiple="multiple" /><br><br>
			<input name="enviar" type="submit" value="Enviar">
	
		</form>
	
	</body>
</html>
<?php
}
if($pg == 'cadastrando'){
    $projeto = $_SESSION['projeto'];
    $capitulo = $_POST['capitulo'];
    $_UP['pasta'] = $capitulo.'/';
    mkdir($_UP['pasta'], 0777);
    $diretorio = $capitulo.'/';
	if(!is_dir($diretorio)){ 
        echo "Pasta $diretorio nao existe";
    }else{
        $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
        for ($controle = 0; $controle < count($arquivo['name']); $controle++){
            
            $destino = $diretorio."/".$arquivo['name'][$controle];
            if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
                echo "Upload realizado com sucesso<br>"; 
            }else{
                echo "Erro ao realizar upload";
            }      
        }
    }
echo "<a href='index.php'>Voltar</a></br></br>";
}
if($pg == 'apagarcap'){ 
	echo'ainda falta fazer!!';
	echo "<a href='index.php'>Voltar</a></br></br>";
}


?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Painel <?php echo $_SESSION['projeto'];?></title>
	</head>
	<body>
		<?php
			echo "<a href='index.php?pg=cadastrarcap'>Cadastrar novo capitulo</a></br></br>";
			echo "<a href='index.php?pg=apagarcap'>Apagar capitulo</a></br></br>";
			echo "<a href='../../index.php'>Voltar</a></br></br>";
		?>
	</body>
</html>







