<!DOCTYPE html>
<html>
<head>
	<title>Incrição</title>
	<meta charset="utf-8">
	<meta name="viewport" content="whidt=device-whidth, initial-scale=1">
    <meta name="description" content="site de eventos IFPA">
    <meta name="keywords" content="eventos,ifpa">
    <meta name="robots" content="index, follow">
    <style type="text/css">
    	div#total{
    		max-width: 300px;
    		text-align: start;
    	}
    </style>
</head>
<body>
<center>
	<div id="total">
<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$usuario = $_SESSION['usuario'];
$iduser = $_SESSION['iduser'];

$idevento = $_GET['id'];

$query_nomeuser = "SELECT nome_evento, descricao_evento, valor, status, cor, user_adm_iduser_adm FROM evento WHERE idevento = $idevento;";
$usuarionome = mysqli_query($conexao, $query_nomeuser);
$row_usuarionome = mysqli_fetch_assoc($usuarionome);

echo "<h1>".$row_usuarionome['nome_evento']."</h1>";
echo "<p>".$row_usuarionome['descricao_evento']."</p><br>";
echo "<p>Valor: R$ ".$row_usuarionome['valor'].",00</p><br>";

?>

<form method="post" action="cad_evento.php">
<table>
	<tr>
	<td><label>nickname: </label></td>
	<td><input type="text" name="nic_name" value="<?php echo $_SESSION['nic_name']; ?>"></td>
	</tr>
	<tr>
	<td><label>nickname 2: </label></td>
	<td><input type="text" name="nic_name2"></td>
	</tr>
	<tr>
	<td><label>nickname 3: </label></td>
	<td><input type="text" name="nic_name3"></td>
	</tr>
</table>
	<input type="hidden" name="idevento" value="<?php echo $idevento; ?>">
	<input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
	<br><br>

	<div id= "consulta0" class="toggle div-inline"  align="center"> 
    <input type="checkbox" id="consultar-acervo" data-id="consultar-acervo" name="toggle">
    <i>Declaro que li e concordo com os <a href="#">termos do campeonato</a></i>
	</div>
	<br>
	<center>
	<button type="submit" class="btn btn-success" id="aplica" onclick="checar()" disabled>Confirmar Incrição</button>
	</center>
</form>

</div>
</center>

<script type="text/javascript">
		var checa = document.getElementsByName("toggle");
var numElementos = checa.length;
var bt = document.getElementById("aplica");
for(var x=0; x<numElementos; x++){
   checa[x].onclick = function(){
      // "input[name='toggle']:checked" conta os checkbox checados
      var cont = document.querySelectorAll("input[name='toggle']:checked").length;
      // ternário que verifica se há algum checado.
      // se não há, retorna 0 (false), logo desabilita o botão
      bt.disabled = cont ? false : true;
   }
}

</script>

</body>
</html>