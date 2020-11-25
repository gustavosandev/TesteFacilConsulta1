<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once'../controller/medicoController.php';
$id = strip_tags(addslashes($_GET['id']));
$value = $objMedico->select($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Editar</title>
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
	    			<h3 class="text-center py-3">Editar médico</h3>
	    			<form name="formEditarMedico" class="form-edit" method="post">
	    				<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	    				<label for="nome">Nome</label>
				   		<input type="text" name="nome" id="nome" class="form-control" placeholder="Insira o nome do profissional" minlength="6" pattern="[A-Za-z \s]{5,30}$" value="<?php echo $value->nome; ?>" required>

				   		<label for="senhaAntiga">Senha Antiga</label>
				   		<input type="password" name="senhaAntiga" id="senhaAntiga" class="form-control" placeholder="Insira a senha antiga" minlength="6" pattern="(?=.*[^\s]+[A-z0-9]).{6,}" required>

				   		<label for="novaSenha">Nova Senha</label>
				   		<input type="password" name="novaSenha" id="novaSenha" class="form-control" placeholder="Escolha uma senha forte e segura" minlength="6" pattern="(?=.*[^\s]+[A-z0-9]).{6,}" required>

				   		<div class="form-button my-3">
				   			<button type="button" name="botaoRealizarEdicao" id="edit" class="button-register my-2">Atualizar cadastro</button>
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
    		
    		$('#edit').on('click', function(e){
    			e.preventDefault();
    			var id = $('#id').val();
    			var nome = $('#nome').val();
    			var senhaAntiga = $('#senhaAntiga').val();
    			var novaSenha = $('#novaSenha').val();
    		
    			if(nome != "" && senhaAntiga != "" && novaSenha != ""){
    				if (nome.length >= 6 && senhaAntiga.length >= 6 && novaSenha.length >= 6 ) {
    					$.ajax({
    						method: "POST",
							url: "../controller/medicoController.php?flag=atualizarMedico",
							data: { id: id, nome: nome, senhaAntiga: senhaAntiga, novaSenha: novaSenha },
							cache: false,
							dataType: "json",

							success: function(data) {
			                    console.log(data);
			                   
			                    data = data.split("|||");
			                    //Se a segunda posição vier 1, então é sucesso
			                    if(data[1] == 1){

			                    	alert(data[0]);
			                    	document.location.href = "index.php";

			                    }else if(data[1] == 0 ){//Se a segunda posição vier 0, então deu erro

			                    	alert(data[0]);

			                    }else{//Se a segunda posição não for nem 1 ou 0, então deu erro
			                    	alert("Erro");
			                    }
                            }, 
				            error: function(data){
			                    alert("Erro! Estamos passando por problemas técnicos.");
			                    console.log(data);
				            }

    					});

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