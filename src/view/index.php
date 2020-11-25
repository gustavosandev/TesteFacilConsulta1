<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once'../controller/medicoController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Início</title>
</head>
<body>
	<header>
		<nav class="menu">
			<a href="cadastro.php" class="nav-button">Cadastro de Médico</a>
		</nav>
	</header>
	<main class="main">
	<?php 
		foreach ($objMedico->selectAll() as $key => $value) {
			
	?>
		<div class="container-list">
	    	<div class="row my-3 borda">
	    		<div class="col-md-8 borda">
	    			<h4 class="text-left"><?php echo $value->nome; ?></h4>
	    		</div>
	    		<div class="col-md-2 borda">
	    			<a href="editarCadastro.php?id=<?php echo $value->id; ?>" class="container-button">Editar cadastro</a>
	    		</div>
	    		<div class="col-md-2 borda">
	    			<a href="configurarHorario.php?id=<?php echo $value->id; ?>" class="container-button">Configurar horários</a>
	    		</div>
	    	</div>
	    	<div class="row my-3 px-2">
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    		</div>
    		<div class="row my-3 px-2 justify-content-center">
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    		</div>
    		<div class="row my-3 px-2 justify-content-center">
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    			<div class="col-sm-3 borda "><button class="btn btn-primary btn-sm">16/11/2020 às 08:00</button></div>
    		</div>
	    </div>
	    <?php
		    } 
		?>
	    
	</main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
 <script type="text/javascript">
    	$(document).ready(function(){
    		
    		
    	});
    </script>
</html>