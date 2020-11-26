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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
	<title>Cadastro</title>
</head>
<body>
	<header>
		<nav class="menu">
			<a href="#" class="nav-button">Cadastro de médico</a>
		</nav>
	</header>
	<main class="main">
		<div class="container container-register">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h3 class="text-center py-3">Cadastro de médico</h3>
	    			<form name="formCadastroMedico" class="form-register" method="post">
	    				<label for="nome">Nome</label>
				   		<input type="text" name="nome" id="nome" class="form-control" placeholder="Insira o nome do profissional" minlength="6" pattern="[A-Za-z \s]{5,30}$" required>
				   		<label for="email">E-mail</label>
				   		<input type="email" name="email" id="email" class="form-control" placeholder="exemplo@dominio.com.br" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" minlength="6" required>
				   		<label for="senha">Senha</label>
				   		<input type="password" name="senha" id="senha" class="form-control" placeholder="Escolha uma senha forte e segura" minlength="6" pattern="(?=.*[^\s]+[A-z0-9]).{6,}" required>
				   		<div class="form-button my-3">
				   			<button type="button" name="botaoRealizarCadastro" id="register" class="button-register my-2">Realizar cadastro</button>
				   			<a href="index.php" class="link-back-home">Voltar para a Página Inicial</a>
				   		</div>
				   		
	    			</form>
				    
				    	
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
    		
    		$('#register').on('click', function(e){
    			e.preventDefault();
    			var nome = $('#nome').val();
    			var email = $('#email').val();
    			var senha = $('#senha').val();
    			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    			
    			if(nome != "" && email != "" && senha != ""){
    				if (nome.length >= 6 && email.length >= 6 && senha.length >= 6 ) {

    					if (regex.test(email)) {
	    					$.ajax({
	    						method: "POST",
								url: "../controller/medicoController.php?flag=cadastrarMedico",
								data: { nome: nome, senha: senha, email: email },
								cache: false,
								dataType: "json",

								success: function(data) {
				                    console.log(data);
				                   
				                    data = data.split("|||");
				                    if(data[1]==1){
				                    	alert(data[0]);
				                    }else if(data[1]==0){
				                    	alert(data[0]);
				                    }else{
				                    	alert("Erro");
				                    }
	                            }, 
					            error: function(data){
				                    alert("Erro! Estamos passando por problemas técnicos.");
				                    console.log(data);
					            }

	    					});

	    				}else{
	    					alert("Este e-mail não é válido!");
	    				}
	    			}else{
	    				alert("Os campos devem conter o mínimo de 6 caracteres!");
	    			}

    			}else{
    				alert("Por favor, preencha todos os campos!");
    			}
    		});
    	});
    </script>
</html>