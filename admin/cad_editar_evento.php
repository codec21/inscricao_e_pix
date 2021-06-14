<?php 

session_start();
include('verifica_login.php');
include('../conexao.php');


	$idevento = $_GET['idevento'];

	$nome_evento = $_POST['nome-evento'];
	$descricao = $_POST['descricao'];
	$valor = $_POST['valor'];
	$cor = $_POST['cor'];


	$query = "UPDATE evento SET nome_evento='$nome_evento', descricao_evento = '$descricao', valor='$valor',cor='$cor' WHERE idevento = $idevento";

	$result = mysqli_query($conexao, $query);
	echo "Nome: ".$nome_evento."<br>";
	echo $query;

	mysqli_close($conexao);

	//header('location: incricoes.php');
