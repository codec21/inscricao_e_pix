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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/master/src/jquery.mask.js"></script>

	<title>War League - Inscreva-se</title>
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
		input[type=submit]{
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
			background-color: #fff;
			height: 40px;
		}
		select{
			border: 0px;
			border-bottom: 1px solid #000;
			background-color: #fff;
			padding: 10px;
			width: 110px;
		}
		h2#invalido{
			color: red;
		}
		p#criar-user{
			margin-top: 30px;
		}
		div#informe-username{
			max-width: 200px;
			text-align: start;
			font-size: 10px;
			padding: 0;
			margin-top: -10px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>





<form action="cad_user.php" method="post" onsubmit="return check_form()">
	<h2>Inscreva - se</h2>
	<input type="text" name="nome" class="text required" placeholder="Primeiro Nome..."><br>
	<input type="text" name="sobrenome" class="text required" placeholder="Ultimo nome..."><br>
	<input type="email" name="email" class="text required" placeholder="Email..."><br>





    <select name="prefixo">
        <option value="55">Brasil</option>
        <option value="54">Argentina</option>
    </select>
		<input type="text" placeholder="Telefone" name="phone" class="phone"/>

	<center>
		<div id="informe-username">
			<p>Selecione o país correspondente ao seu código de área:</p>
		</div>
	</center>
	
	<input type="text" name="usuario" class="text required" placeholder="Nome de Usuário..."><br>
	<center><div id="informe-username">Para nome de usuário não utilize acentos ou caracteres especiais no máximo "." ou "_" como por exemplo <strong>paulo.silva</strong> ou <strong>paulo_silva</strong></div></center>
	<input type="text" name="nickname" class="text required" placeholder="Nickname..."><br>
	<input type="password" name="senha" class="text required" placeholder="Senha..."><br>
	<!-- <button type="submit">Cadastrar</button> -->
	<input type="submit" value=" Cadastrar - se " />
	<br><br>
</form>


<script type="text/javascript">
	function check_form(){
    var inputs = document.getElementsByClassName('required');
  var len = inputs.length;
  var valid = true;
  for(var i=0; i < len; i++){
     if (!inputs[i].value){ valid = false; }
  }
  if (!valid){
    alert('Por favor preencha todos os campos.');
    return false;
  } else { return true; }
}





$(document).ready(function(){
    $('body').on('focus', '.phone', function(){
        var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);

                if(field[0].value.length >= 14){
                    var val = field[0].value.replace(/\D/g, '');
                    if(/\d\d(\d)\1{7,8}/.test(val)){
                        field[0].value = '';
                        alert('Telefone Invalido');
                    }
                }
            }
        };
        $(this).mask(maskBehavior, options);
    });
});
</script>


</body>
</html>