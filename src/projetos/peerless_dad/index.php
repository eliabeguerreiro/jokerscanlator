<?php
session_start();
include_once('../../conexao.php');


var_dump($_SESSION);


$projeto = $_SESSION['projeto'];
  
$capitulo = $_SESSION['capitulo'];

$_UP['pasta'] = $capitulo.'/';

mkdir($_UP['pasta'], 0777);

/*
$diretorio = 'projetos/'.$projeto.'/'.$capitulo.'/';

    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
        $destino = $diretorio."/".$arquivo['name'] [$controle];
        if (move_uploaded_file($arquivo['tmp_name'] [$controle], $destino)){
            echo 'Upload da imagem: '.$arquivo['tmp_name'].' executado com sucesso.' ;
        }else{
            echo 'O Upload falhou';
        }
    }
*/
