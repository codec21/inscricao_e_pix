<?php
/*session_start();
include('conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('location: index.php');
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select idusuario, nome_user from usuario where nome_user = '{$usuario}' and senha = md5({$senha});";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('location: painel.php');
	exit();
}else {
	$_SESSION['nao_autenticado'] = true;
	header('location: index.php');
	exit();
}*/
?>





<?php
session_start();

include('../conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('location: index.php');
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select iduser_adm, nome_user from user_adm where nome_user = '{$usuario}' and senha = md5('{$senha}');";
echo $query;

$result = mysqli_query($conexao, $query);



if (mysqli_num_rows($result) == 1) {
	$_SESSION['usuario-adm'] = $usuario;
	header('location: painel.php');
	exit();
}else {
	$_SESSION['nao_autenticado'] = true;
	header('location: index.php');
	exit();
}
?>