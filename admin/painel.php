<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

$usuario = $_SESSION['usuario-adm'];

$query_nomeuser = "SELECT iduser_adm, nome, sobrenome FROM user_adm WHERE nome_user = '$usuario';";
$usuarionome = mysqli_query($conexao, $query_nomeuser);
$row_usuarionome = mysqli_fetch_assoc($usuarionome);
$iduser = $row_usuarionome['iduser_adm'];
$name = $row_usuarionome['nome'];

$_SESSION['iduser'] = $iduser;
//$_SESSION['nome'] = $nome;
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

    	a{
    		text-decoration: none;
    	}
        ::selection {
        background: #BD1ADE;
        color: #fff;
        }
        div#item-menu-adm{
            background-color: #43a;
            color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            max-width: 300px;
            text-align: center;
            border-radius: 10px;
        }
        a#item-menu-adm{
            color: #fff;
        }
    </style>
</head>
<body>


	<h1>Olá <?php echo $row_usuarionome['nome']; ?>,</h1>
	<h2 id="aaa"><a href="logout.php">Sair</a></h2>
    <center>

    <a href="criar_evento.php" id="item-menu-adm">
        <div id="item-menu-adm">
        Criar Novo Evento
        </div>
    </a>
    <a href="inscricoes.php" id="item-menu-adm">
        <div id="item-menu-adm">
        Inscrições
        </div>
    </a>
    <a href="#" id="item-menu-adm">
        <div id="item-menu-adm">
        Adicionar ADM
        </div>
    </a>


    </center>





</body>
</html>