<?php
session_start();
include('verifica_login.php');
include('conexao.php');


/*##########################USAR ESSA PARTE PARA FAZER A VALIDAÇÃO DO NUMERO DE USERS###########################*/
 $consulta_incritos = "SELECT * FROM inscricao WHERE evento_idevento = 1;";
  $result_inscricoes = mysqli_query($conexao, $consulta_incritos);
   $nregistos_incricoes = mysqli_num_rows($result_inscricoes);

   echo $nregistos_incricoes;


?>