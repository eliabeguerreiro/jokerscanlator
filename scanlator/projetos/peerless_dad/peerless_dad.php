<?php
session_start();
$_SESSION['projeto'] = 'peerless_dad';
include_once('../../../funcoes/conexao.php');
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

    <form enctype="multipart/form-data" method="POST" action="peerless_dad.php?pg=cadastrando">
        <label>Número do capitulo: </label>
        <input type="text" name="capitulo"><br><br>
        <label>Volume do capitulo: </label>
        <input type="text" name="volume"><br><br>
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
	$volume = $_POST['volume'];
    $_UP['pasta'] = $capitulo.'/';
    mkdir($_UP['pasta'], 0777);
	$diretorio = $capitulo.'/';
	
	$result = "INSERT INTO capitulos ( projeto, volume, numero, link) VALUES('peerless', $volume, $capitulo, 'projetos/peerless_dad/.$diretorio)";

	if($resultado = mysqli_query($conn, $result)){
		echo 'Capitulo cadastrado no banco de dados';
	};
	

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
}









?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">

        <nav id="sidebar">

            <div class="sidebar-header col">
                <h3>Painel Joker</h3>
                <button type="button " id="sidebarCollapse" class="btn btn-danger col " href="#">
                    Sair
                </button><br>
            </div>
            <ul class="list-unstyled components">

                <p>Peerless Dad</p>
                <li>
                    <a href="?pg=cadastrarcap">Cadastrar Capítulo</a>
				</li>
				<li>
                    <a href="?pg=apagarcap">Apagar Capítulo</a>
                </li>
				<li>
                    <a href="?pg=nvprj">Editar Capítulo</a>
                </li>
            </ul>
        </nav>