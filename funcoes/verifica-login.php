<?php
session_start();
include("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);


if($btnLogin){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
    if((!empty($email)) AND (!empty($senha))){
		$result_usuario = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			ob_start();
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['tipo'] = $row_usuario['tipo'];
				$nh = '';
    			$nh .='Dia: '. date('d/m/Y') .' Hora: '.date('h:i:s');
				$relat = "INSERT INTO `entrada` (`email`, `entrada`) VALUES ('" .$_SESSION['email']. "','$nh')";
				$resultado_usario = mysqli_query($conn, $relat);
                if($_SESSION['tipo']== 'ADM'){
                    header("Location:../scanlator/painel.php");
                }else{
                    header("Location:../scanlator/blog.php");
                }                
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: ../scanlator/login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Você precisar inserir os dados de login!";
		header("Location: ../scanlator/login.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: ../scanlator/login.php");
}
ob_end_flush();
