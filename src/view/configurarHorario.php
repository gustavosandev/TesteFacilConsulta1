<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once'../controller/medicoController.php';
require_once'../controller/horarioController.php';

$id = strip_tags(addslashes(trim($_GET['id'])));
$value = $objMedico->select($id)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
	<title>Configurar Horários</title>
</head>
<body>
	<header>
		<nav class="menu">
			<a href="cadastro.php" class="nav-button">Cadastro de Médico</a>
		</nav>
	</header>
	<main class="main">
		<div class="row">
			<div class="col-md-6">
				<div class="container-add p-3">
			    	<div class="row my-3">
			    		<div class="col-md-12">
			    			<h4 class="text-center darkblue">Adicionar horários</h4>
			    		</div>			    	
			    	</div>
			    	<div class="row">
			    		<div class="col-md-12">
			    			<p class="darkblue">Nome:</p>
			    		</div>	
			    	</div>
			    	<div class="row">
			    		<div class="col-md-12">
			    			<h5 class="text-left darkblue"><?php echo $value->nome; ?></h5>
			    		</div>	
			    	</div>
			    	<div class="row">
			    		<div class="col-md-12">
			    			<form name="formAddTime" method="post" class="form-add">
			    				<input type="hidden" name="idMedico" value="<?php echo $value->id; ?>">
			    				<label for="datetime" class="darkblue">Data e hora</label>
			    				<input type="datetime-local" id="datetime" name="dataHora" class="form-control" required>
			    				<div class="form-button my-3">
						   			<button type="submit" name="botaoAdicionarHorario" id="add" class="button-register my-2">Adicionar horário</button>
						   			<a href="index.php" class="link-back-home">Voltar para a Página Inicial</a>
						   		</div>
			    			</form>
			    		</div>	
			    	</div>
			    </div>
			</div>
			<div class="col-md-6">
				<div class="container-config">
			    	<div class="row my-3">
			    		<div class="col-md-12">
			    			<h4 class="text-center darkblue">Horários configurados</h4>
			    		</div>			    	
			    	</div>
			    	<?php 
			    		foreach ($objHorario->selectTime($id) as $key => $valueHorario) {
			    	?>	
			    		<div class="row p-2" id="idHorario-<?php echo $valueHorario->id; ?>">
			    			<div class="col-md-9 darkblue"><?php echo date("d/m/Y H:i", strtotime($valueHorario->data_horario)); ?></div>
			    			<div class="col-md-3"><?php echo $remover = $valueHorario->horario_agendado ? "" : "<button type='button' class='remove-button' data-id='$valueHorario->id'>Remover</button>"; ?></div>
			    		</div>
			    		<hr>
			    	<?php	
			    		}
			    	?>
			    </div>
			</div>
		</div>
				    
	</main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
 <script type="text/javascript">
    	$(document).ready(function(){

    		$(document).on('click', '.remove-button', function(e){
    			e.preventDefault();

    			if (confirm("Clique em Ok para remover o horário")) {

	    			var id = $(this).data('id');

	    			$.ajax({
						method: "POST",
						url: "../controller/horarioController.php?flag=removerHorario",
						data: {id:id},
						cache: false,
						dataType: "json",

						success: function(data) {
		                    console.log(data);
		                   
		                    data = data.split("|||");
		                    //Se a segunda posição vier 1, então é sucesso
		                    if(data[1] == 1){
		                    	$('#idHorario-'+id).attr('hidden', true);
		                    	alert(data[0]);
		                    	//document.location.href = "index.php";

		                    }else if(data[1] == 0 ){//Se a segunda posição vier 0, então deu erro

		                    	alert(data[0]);

		                    }else{//Se a segunda posição não for nem 1 ou 0, então deu erro
		                    	alert("Erro!");
		                    }
	                    }, 
			            error: function(data){
		                    alert("Erro! Estamos passando por problemas técnicos.");
		                    console.log(data);
			            }

					});
				}
    		});
    		
    		$('.form-add').on('submit', function(e){
    			e.preventDefault();
    			var data = $(this).serialize();
    			$.ajax({
					method: "POST",
					url: "../controller/horarioController.php?flag=adicionarHorario",
					data: data,
					cache: false,
					dataType: "json",

					success: function(data) {
	                    console.log(data);
	                   
	                    data = data.split("|||");
	                    //Se a segunda posição vier 1, então é sucesso
	                    if(data[1] == 1){

	                    	alert(data[0]);
	                    	document.location.reload(true);

	                    }else if(data[1] == 0 ){//Se a segunda posição vier 0, então deu erro

	                    	alert(data[0]);

	                    }else{//Se a segunda posição não for nem 1 ou 0, então deu erro
	                    	alert("Erro!");
	                    }
                    }, 
		            error: function(data){
	                    alert("Erro! Estamos passando por problemas técnicos.");
	                    console.log(data);
		            }

				});
    		});
    		
    	});
    </script>
</html>