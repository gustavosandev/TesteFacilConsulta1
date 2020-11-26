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
			$data_criacao = date('Y-m-d H:i:s');
			$senha = md5($senha);
			$objMedico->setNome($nome);
			$objMedico->setEmail($email);
			$objMedico->setSenha($senha);
			$objMedico->setDataCriacao($data_criacao);
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

if (isset($_GET['flag']) AND $_GET['flag'] == 'atualizarMedico')  {

	$nome =  strip_tags(addslashes(trim($_POST['nome'])));
	$senhaAntiga = strip_tags(addslashes(trim($_POST['senhaAntiga'])));
	$novaSenha = strip_tags(addslashes(trim($_POST['novaSenha'])));
	$id = strip_tags(addslashes(trim($_POST['id'])));

	if (isset($nome) AND isset($senhaAntiga) AND isset($novaSenha) AND isset($id)) {

		if (strlen($nome) >= 6 AND strlen($senhaAntiga) >= 6 AND strlen($novaSenha) >= 6) {
			$data_alteracao = date('Y-m-d H:i:s');
			$senhaAntiga = md5($senhaAntiga);
			$value = $objMedico->select($id);
			if ($value->senha == $senhaAntiga) {
				$novaSenha = md5($novaSenha);
				$objMedico->setNome($nome);
				$objMedico->setSenha($novaSenha);
				$objMedico->setDataAlteracao($data_alteracao);
				$retorno = $objMedico->update($id);

				if($retorno){
					$retorno = "Sucesso na atualização!|||1";
				}else{
					$retorno = "Erro na atualização!|||0";
				}
			}else{
				$retorno = "Senha antiga incorreta!|||0";
			}

				
		}else{
			$retorno = "Os campos devem conter o mínimo de 6 caracteres!|||0";
		}
	}else{
		$retorno = "Erro|||0";
	}

	echo json_encode($retorno);
}