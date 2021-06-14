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
    	table{
    		width: 100%;
    	}
    	a{
    		text-decoration: none;
    	}
    	div#btn6 {
            background-color: #3A50DE;
            border: 0px;
            padding: 10px;
            width: 150px;
            position: relative;
            text-align: center;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
        }
        div#btn7 {
            background-color: #ffa00a;
            border: 0px;
            padding: 10px;
            width: 150px;
            position: relative;
            text-align: center;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
        }

    </style>
    
</head>
<body>


<table border="1" cellspacing="0">
	<tr><td align="center"><strong>Primeiro Nome:</strong></td><td align="center"><strong>Telefone:</strong></td><td align="center"><strong>Nickname:</strong></td><td align="center"><strong>Nickname 2:</strong></td><td align="center"><strong>Nickname 3:</strong></td><td align="center"><strong>E-mail:</strong></td><td align="center"><strong>Cod pix:</strong></td><td align="center"><strong>Pagamento:</strong></td>
<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

$idevento = $_GET['id'];

//echo $idevento;

?>

<?php 


 $consulta = "SELECT idinscricao FROM inscricao WHERE evento_idevento =$idevento;";
 /*SELECT `grupo_post_idgrupo_post` FROM `usuaraio_has_grupo_post` WHERE usuaraio_idusuaraio = $iduser*/
  $result = mysqli_query($conexao, $consulta);
   $nregistos = mysqli_num_rows($result);


              for ($i=0; $i <$nregistos; $i++)  {  
               $registo = mysqli_fetch_assoc($result);

               $grupo = $registo['idinscricao'];

               /*$grupo = $registo['grupo_post_idgrupo_post'];*/

   			      $select_id = "SELECT * FROM inscricao WHERE idinscricao = $grupo;";

                 $select_id_res2 = mysqli_query($conexao, $select_id);

                 /*$resp_id = mysqli_num_rows($select_id_res);*/

                 $rowk = mysqli_fetch_assoc($select_id_res2);
                 
                 //echo $rowk['status_inscricao'];


                 /*===================================================================================*/

                    
                        $iduser = $rowk['usuario_idusuario'];
                        $query_nic_and_cod = "SELECT * FROM usuario WHERE idusuario = $iduser;";
                    $nic_and_cod = mysqli_query($conexao, $query_nic_and_cod);
                    $row_nic_and_cod = mysqli_fetch_assoc($nic_and_cod);
                    //echo $row_nic_and_cod['nome_user'];

                    echo "<tr><td>".$row_nic_and_cod['nome_user']."</td><td>".$row_nic_and_cod['telefone']."</td><td>".$rowk['nic_name']."</td><td>".$rowk['nic_name2']."</td><td>".$rowk['nic_name3']."</td><td>".$row_nic_and_cod['email']."</td><td>".$rowk['cod_pix']."</td>";

                    if ($rowk['status_inscricao'] == 1) {
                    	echo "
                    	<td><center><a href='altera_status.php?idinscricao=".$rowk['idinscricao']."&status=".$rowk['status_inscricao']."&idevento=".$rowk['evento_idevento']."'><div id='btn6'>Confirmar</div></a></center></td>
                    	";
                    }
                    else{
                    	echo "
                    	<td><center><a href='altera_status.php?idinscricao=".$rowk['idinscricao']."&status=".$rowk['status_inscricao']."&idevento=".$rowk['evento_idevento']."'><div id='btn7'>Cancelar</div></a></center></td>
                    	";

                    }

                    /*


                    if (isset($row_nic_and_cod['status_inscricao']) && $row_nic_and_cod['status_inscricao'] == 1) {
                        # code...
                        echo "<div id='pagar_alert'>caso já tenha pago aguarde a confirmação</div>";
                        echo "<a href="."pix.php?idevento=".$idevento."&iduser=".$iduser."><div id='btn2'><img src='https://img.icons8.com/metro/452/qr-code.png' width='20px'> Pagar</div></a>";
                    }elseif (isset($row_nic_and_cod['status_inscricao']) && $row_nic_and_cod['status_inscricao'] == 2) {
                        # code...
                        echo "<div id='pagar_alert2'>Inscrição confirmada</div>";
                        echo "<a href="."#"."><div id='btn3'><img src='https://image.flaticon.com/icons/png/512/190/190411.png' width='20px'> confirmada</div></a>";
                    }else {
                        # code...
                        echo "<a href=".'incricoes_evento.php?id='.$rowk['idevento']."><div id='btn'>Inscrições</div></a>";
                    }
                    */
                }

                     ?>


                     <table><tr><td></td></tr></table>




<strong></strong>


                     </body>
</html>