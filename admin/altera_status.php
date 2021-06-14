<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

$idinscricao = $_GET['idinscricao'];
$status = $_GET['status'];
$idevento = $_GET['idevento'];

if ($status == 1) {
	$query = "UPDATE inscricao SET status_inscricao = 2 WHERE idinscricao = $idinscricao;";

	$result = mysqli_query($conexao, $query);

	echo $query;

	mysqli_close($conexao);

	header('location: incricoes_evento.php?id='.$idevento);
}
else{
	$query = "UPDATE inscricao SET status_inscricao = 1 WHERE idinscricao = $idinscricao;";

	$result = mysqli_query($conexao, $query);

	echo $query;

	mysqli_close($conexao);

	header('location: incricoes_evento.php?id='.$idevento);
}


