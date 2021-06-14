<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="whidt=device-whidth, initial-scale=1">
    <meta name="description" content="site de eventos IFPA">
    <meta name="keywords" content="eventos,ifpa">
    <!-- <meta http-equiv="refresh" content="1" > -->
    <meta name="robots" content="index, follow">
	<style type="text/css">
        body{
            /*background-color: #98a6b3;*/
        }
    	div#campeonat {
    		color: #006633;
    		border: 1px solid #000;
    		padding: 10px;
    		border-radius: 10px;
    		margin-bottom: 10px;
    	}
    	div#btn {
    		background-color: #DFDA3C;
    		border: 0px;
    		padding: 10px;
    		width: 150px;
    		position: relative;
    		text-align: center;
    		color: #fff;
    		font-weight: bold;
    		border-radius: 10px;
    	}
        div#btn2 {
            background-color: #EF3838;
            border: 0px;
            padding: 10px;
            width: 150px;
            position: relative;
            text-align: center;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            float: right;
            margin-top: -39px;
        }
        div#btn3 {
            background-color: #24E945;
            border: 0px;
            padding: 10px;
            width: 150px;
            position: relative;
            text-align: center;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;

        }
        div#pagar_alert{
            color: #ff0000;
            margin-bottom: 10px;

        }
        div#pagar_alert2{
            color: #C224E9;
            margin-bottom: 10px;

        }
    	a{
    		text-decoration: none;
    	}
        ::selection {
    background: #BD1ADE;
    color: #fff;
}
    </style>
</head>
<body>


<h1><a href="painel.php">Voltar</a></h1>




<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

?>

<?php 


 $consulta = "SELECT * FROM evento WHERE status = 1;";
 /*SELECT `grupo_post_idgrupo_post` FROM `usuaraio_has_grupo_post` WHERE usuaraio_idusuaraio = $iduser*/
  $result = mysqli_query($conexao, $consulta);
   $nregistos = mysqli_num_rows($result);


              for ($i=0; $i <$nregistos; $i++)  {  
               $registo = mysqli_fetch_assoc($result);

               $grupo = $registo['idevento'];

               /*$grupo = $registo['grupo_post_idgrupo_post'];*/

   			      $select_id = "SELECT * FROM evento WHERE status = 1 and idevento = $grupo;";

                 $select_id_res2 = mysqli_query($conexao, $select_id);

                 /*$resp_id = mysqli_num_rows($select_id_res);*/

                 $rowk = mysqli_fetch_assoc($select_id_res2);

                 ?>

                 <div id="campeonat">
                 	<a href="editar_evento.php?idevento=<?php echo $rowk['idevento']; ?>">Editar</a>
					<h1><?php echo $rowk['nome_evento']; ?></h1>
					<p><?php echo $rowk['descricao_evento']; ?></p>
                    <?php
                    
                        $idevento = $rowk['idevento'];
                        $query_nic_and_cod = "SELECT * FROM evento WHERE status = 1";
                    $nic_and_cod = mysqli_query($conexao, $query_nic_and_cod);
                    $row_nic_and_cod = mysqli_fetch_assoc($nic_and_cod);


                    echo "<a href=".'incricoes_evento.php?id='.$rowk['idevento']."><div id='btn'>Ver Inscrições</div></a>
                    	  <a href=".'cancela_evento.php?idevento='.$rowk['idevento']."&status=".$rowk['idevento']."><div id='btn2'>Cancelar evento
                    	  </div></a></div>";
                }

                     ?>




</body>
</html>