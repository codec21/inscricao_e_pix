<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

$iduser = $_SESSION['iduser'];
$nome_evento = $_POST['nome-evento'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$cor = $_POST['cor'];



$query = "INSERT INTO evento(nome_evento, descricao_evento, valor, status, cor, user_adm_iduser_adm) VALUES ('$nome_evento', '$descricao', '$valor', 1, '$cor', $iduser);";

$result = mysqli_query($conexao, $query);

echo $query;

mysqli_close($conexao);

//header('location: pix.php?idevento='.$idevento.'&iduser='.$iduser);

?>

<p> </p>
<h1>Evento Cadastrado com sucesso !</h1>
<a href="painel.php">Voltar para Tela Incial</a>