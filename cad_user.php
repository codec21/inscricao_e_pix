<?php
session_start();
include('conexao.php');

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$prefixo = $_POST['prefixo'];
$phone = $_POST['phone'];
$nic_name = $_POST['nickname'];
$senha = $_POST['senha'];

$telefone = "+".$prefixo." ".$phone;


$cod_pix = time();
echo " ";

$query = "INSERT INTO usuario (nome_user, nome, sobrenome, senha, email, nic_name, telefone) VALUES ('$usuario', '$nome', '$sobrenome', MD5('$senha'), '$email', '$nic_name', '$telefone');";

$result = mysqli_query($conexao, $query);

echo "<center><h1>Usuário Cadastrado com Sucesso !</h1></center>";

mysqli_close($conexao);

//header('location: pix.php?idevento='.$idevento.'&iduser='.$iduser);
?>

<center><a href="index.php" style="font-size: 26px; margin-top: 20px;">Ir para tela de Login</a></center>

