<?php

session_start();

?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="whidt=device-whidth, initial-scale=1">
    <meta name="description" content="War League campeonatos de Call of Duty: Warzone">
    <meta name="keywords" content="eventos,ifpa">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<title>War League - Login</title>
	<style type="text/css">
		*{
			font-family: arial;
			background-color: #98a6b3;
		}
		form{
			text-align: center;
		}
		form h2{
			text-align: center;
			color: #fff;
			margin-top: 20px;
		}
		form input{
			padding: 6px;
			margin-bottom: 10px;
		}
		button[type=submit]{
			/*border: 1px solid #000;*/
			padding: 5px 20px 5px 20px;
			font-size: 20px;
			border: 1px solid #000;
			/*border-bottom: 3px solid #000;*/
			background-color: #fff;
			border-radius: 8px;

		}
		input{
			border: 0px;
			border-bottom: 1px solid #000;
			background-color: #fff
		}
		h2#invalido{
			color: red;
		}
		p#criar-user{
			margin-top: 30px;
		}
	</style>
</head>
<body>

	
	
    
<form action="login.php" method="post" >
	<h2>Login</h2>
	<?php
	if (isset($_SESSION['nao_autenticado'])):
	?>
	<center>
	<div class="alert alert-danger" role="alert" style="max-width: 300px;">
  	usuário ou senha inválidos !
	</div>
	</center>
	<?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
	<input type="text" name="usuario" placeholder="Nome de Usuário..."><br>
	<input type="password" name="senha" placeholder="Senha..."><br>
	<button type="submit">Entrar</button>
	<p id="criar-user"><a href="inscreva_se.php">Criar usuário..</a></p>
	<br><br>
</form>


</body>
</html>