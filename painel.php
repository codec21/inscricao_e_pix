
<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$usuario = $_SESSION['usuario'];

$query_nomeuser = "SELECT idusuario, nome, nic_name FROM usuario WHERE nome_user = '$usuario';";
$usuarionome = mysqli_query($conexao, $query_nomeuser);
$row_usuarionome = mysqli_fetch_assoc($usuarionome);
$iduser = $row_usuarionome['idusuario'];
$nic_name = $row_usuarionome['nic_name'];

$_SESSION['iduser'] = $iduser;
$_SESSION['nic_name'] = $nic_name;
?>

<!DOCTYPE html>
<html>
<head>
	<title>página inicial</title>
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
        div#btn10 {
            background-color: #A44046;
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


	<h1>Olá <?php echo $row_usuarionome['nome']; ?>,</h1>


	<h2 id="aaa"><a href="logout.php">Sair</a></h2>


		<?php 


/*##########################CONSULTA DE EVENTOS###########################*/
 $consulta = "SELECT * FROM evento WHERE status = 1;";
 /*SELECT `grupo_post_idgrupo_post` FROM `usuaraio_has_grupo_post` WHERE usuaraio_idusuaraio = $iduser*/
  $result = mysqli_query($conexao, $consulta);
   $nregistos = mysqli_num_rows($result);
   //echo $nregistos;


              for ($i=0; $i <$nregistos; $i++)  {  
               $registo = mysqli_fetch_assoc($result);

               $grupo = $registo['idevento'];





               $consulta_incritos = "SELECT * FROM inscricao WHERE evento_idevento = $grupo;";
         $result_inscricoes = mysqli_query($conexao, $consulta_incritos);
         $nregistos_incricoes = mysqli_num_rows($result_inscricoes);

         $numero_eventos = $nregistos_incricoes;









               /*$grupo = $registo['grupo_post_idgrupo_post'];*/

   			      $select_id = "SELECT * FROM evento WHERE status = 1 and idevento = $grupo;";

                 $select_id_res2 = mysqli_query($conexao, $select_id);

                 /*$resp_id = mysqli_num_rows($select_id_res);*/

                 $rowk = mysqli_fetch_assoc($select_id_res2);

                 ?>

                 <div id="campeonat">
					<h1><?php echo $rowk['nome_evento']; ?></h1>
					<p><?php echo $rowk['descricao_evento']; ?></p>
                    <?php
                    
                        $idevento = $rowk['idevento'];
                        $query_nic_and_cod = "SELECT nic_name, cod_pix, status_inscricao FROM inscricao WHERE usuario_idusuario = $iduser AND evento_idevento = $idevento;";
                    $nic_and_cod = mysqli_query($conexao, $query_nic_and_cod);
                    $row_nic_and_cod = mysqli_fetch_assoc($nic_and_cod);

                    $numero_linha_evento_user = mysqli_num_rows($nic_and_cod);





                    if ($numero_linha_evento_user == 1) {
                            if (isset($row_nic_and_cod['status_inscricao']) && $row_nic_and_cod['status_inscricao'] == 1 ) {
                                # code...
                                echo "<div id='pagar_alert'>caso já tenha pago aguarde a confirmação</div>";
                                echo "<a href="."pix.php?idevento=".$idevento."&iduser=".$iduser."><div id='btn2'><img src='https://img.icons8.com/metro/452/qr-code.png' width='20px'> Pagar</div></a>";
                            }elseif (isset($row_nic_and_cod['status_inscricao']) && $row_nic_and_cod['status_inscricao'] == 2) {
                                # code...
                                echo "<div id='pagar_alert2'>Inscrição confirmada</div>";
                                echo "<a href="."#"."><div id='btn3'><img src='https://image.flaticon.com/icons/png/512/190/190411.png' width='20px'> confirmada</div></a>";
                            }
                    }else {
                        if ($numero_eventos < 2 ) {
                                    echo "<a href=".'incricao.php?id='.$rowk['idevento']."><div id='btn'>Inscrever-se</div></a>";
                                }else {
                                    echo "<a href=".'#'."><div id='btn10'>Lotado tio</div></a>";
                                }
                    }


                    

                     ?>
					
				</div>
				<br>


                 <?php


				}

				mysqli_close($conexao);

	 ?>


</body>
</html>