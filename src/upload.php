<?php
$diretorio = "img/";

if (!is_dir($diretorio)){
    echo "Diretorio $diretorio Inesistente.";
}else{
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
        $destino = $diretorio."/".$arquivo['name'] [$controle];
        if (move_uploaded_file($arquivo['tmp_name'] [$controle], $destino)){
            echo 'Deu certo PAE';
        }else{
            echo 'Deus certo não cabeça';
        }
    }
}

