<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
include_once 'Banco.php';

$objHorario = new Horario();

if (isset($_GET['flag']) AND $_GET['flag'] == 'adicionarHorario')  {

	$datetime = $_POST['datetime'];
	$id_medico = strip_tags(addslashes(trim($_POST['id'])))
	if (isset($datetime) AND isset($id_medico)) {
		$objHorario->setDataHorario($datetime);
		$objHorario->setIdMedico($id_medico);
		$retorno = $objHorario->insert($id_medico);

		if ($retorno) {
			$retorno = "Sucesso ao adicionar horário|||1";
		}else{
			$retorno = "Erro ao adicionar horário|||0";
		}
	}else{
		$retorno = "Erro|||0";
	}

	echo json_encode($retorno);
}