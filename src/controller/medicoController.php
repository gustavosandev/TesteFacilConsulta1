<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../model/Medico.php';

$objMedico = new Medico();

if (isset($_GET['flag']) AND $_GET['flag'] == 'cadastrarMedico')  {

	$nome =  strip_tags(addslashes(trim($_POST['nome'])));
	$email = strip_tags(addslashes(trim($_POST['email'])));
	$senha = strip_tags(addslashes(trim($_POST['senha'])));

	if (isset($nome) AND filter_var($email, FILTER_VALIDATE_EMAIL) AND isset($senha)) {

		if (strlen($nome) >= 6 AND strlen($email) >= 6 AND strlen($senha) >= 6) {
		
			$senha = md5($senha);
			$objMedico->setNome($nome);
			$objMedico->setEmail($email);
			$objMedico->setSenha($senha);
			$retorno = $objMedico->insert();

			if($retorno){
				$retorno = "Sucesso no cadastro|||1";
			}else{
				$retorno = "Erro no cadastro|||0";
			}
		}else{
			$retorno = "Os campos devem conter o mínimo de 6 caracteres!|||0";
		}
	}else{
		$retorno = "Erro|||0";
	}

	echo json_encode($retorno);



}