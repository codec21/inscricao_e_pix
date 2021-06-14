<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$nic_name = $_POST['nic_name'];
$nic_name2 = $_POST['nic_name2'];
$nic_name3 = $_POST['nic_name3'];
$idevento = $_POST['idevento'];
$iduser = $_POST['iduser'];
$cod_pix = time();
echo $cod_pix;

$query = "INSERT INTO inscricao (cod_pix, nic_name, nic_name2, nic_name3, status_inscricao, evento_idevento, usuario_idusuario) VALUES ($cod_pix, '$nic_name', '$nic_name2', '$nic_name3', 1, $idevento, $iduser)";

$result = mysqli_query($conexao, $query);

echo $query;

mysqli_close($conexao);

header('location: pix.php?idevento='.$idevento.'&iduser='.$iduser);