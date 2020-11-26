<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../model/Horario.php';

$objHorario = new Horario();

if (isset($_GET['flag']) AND $_GET['flag'] == 'adicionarHorario')  {

	$data_horario = $_POST['dataHora'];
	$data_horario = date("Y-m-d H:i:s", strtotime($data_horario));
	$id_medico = strip_tags(addslashes(trim($_POST['idMedico'])));
	
	if (isset($data_horario) AND isset($id_medico)) {
		
		$horario_agendado = 0;

		$objHorario->setHorarioAgendado($horario_agendado);
		$objHorario->setDataHorario($data_horario);
		$objHorario->setIdMedico($id_medico);

		$retorno = $objHorario->insert();

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

if (isset($_GET['flag']) AND $_GET['flag'] == 'removerHorario')  {

	$id = strip_tags(addslashes(trim($_POST['id'])));
	
	if (isset($id)) {
		
		$objHorario->setId($id);

		$retorno = $objHorario->delete($id);

		if ($retorno) {
			$retorno = "Sucesso ao remover horário|||1";
		}else{
			$retorno = "Erro ao remover horário|||0";
		}
	}else{

		$retorno = "Erro|||0";
	}

	echo json_encode($retorno);
}


if (isset($_GET['flag']) AND $_GET['flag'] == 'agendarHorario')  {

	$id = strip_tags(addslashes(trim($_POST['id'])));
	
	if (isset($id)) {
		$horario_agendado = 1;
		$data_alteracao = date('Y-m-d H:i:s');
		$objHorario->setId($id);
		$objHorario->setHorarioAgendado($horario_agendado);
		$objHorario->setDataAlteracao($data_alteracao);

		$retorno = $objHorario->update($id);

		if ($retorno) {
			$retorno = "Sucesso ao agendar horário|||1";
		}else{
			$retorno = "Erro ao agendar horário|||0";
		}
	}else{

		$retorno = "Erro|||0";
	}

	echo json_encode($retorno);
}