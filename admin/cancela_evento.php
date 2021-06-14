<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

$idevento = $_GET['idevento'];
$status = $_GET['status'];


if ($status == 1) {
	$query = "UPDATE evento SET status = 2 WHERE idevento = $idevento;";

	$result = mysqli_query($conexao, $query);

	echo $query;

	mysqli_close($conexao);

	header('location: inscricoes.php');
}
else{
	$query = "UPDATE evento SET status = 2 WHERE idevento = $idevento;";

	$result = mysqli_query($conexao, $query);

	echo $query;

	mysqli_close($conexao);

	header('location: inscricoes.php');
}


