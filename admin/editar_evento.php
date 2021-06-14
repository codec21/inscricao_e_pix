<!DOCTYPE html>
<html>
<head>
	  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:"textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

	<title>Cadatrar Novo Evento</title>
	<meta charset="utf-8">
	<meta name="viewport" content="whidt=device-whidth, initial-scale=1">
    <meta name="description" content="site de eventos IFPA">
    <meta name="keywords" content="eventos,ifpa">
    <!-- <meta http-equiv="refresh" content="1" > -->
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style type="text/css">
    	<style type="text/css">
		*{
			font-family: arial;
			background-color: #98a6b3;
		}
		h1{
			padding: 10px;
		}
		form{
			text-align: center;
			margin-top: 30px;
		}
		form h2{
			text-align: center;
			color: #fff;
			margin-top: 20px;
		}
		form input{
			padding: 6px;
			margin-bottom: 10px;
		}
		input[type=submit]{
			/*border: 1px solid #000;*/
			padding: 5px 20px 5px 20px;
			font-size: 20px;
			border: 1px solid #000;
			/*border-bottom: 3px solid #000;*/
			background-color: #fff;
			border-radius: 8px;

		}
		input{
			border: 0px;
			border-bottom: 1px solid #000;
			background-color: #fff
		}
		h2#invalido{
			color: red;
		}
		p#criar-user{
			margin-top: 30px;
		}
		textarea{
			max-width: 300px;
			margin: 10px;
		}
	</style>
    </style>
</head>
<body>

<?php
session_start();
include('verifica_login.php');
include('../conexao.php');

$idevento = $_GET['idevento'];

$query_nomeuser = "SELECT nome_evento, descricao_evento, valor, status, cor, user_adm_iduser_adm FROM evento WHERE idevento = $idevento;";
$usuarionome = mysqli_query($conexao, $query_nomeuser);
$row_usuarionome = mysqli_fetch_assoc($usuarionome);

echo "<h1>Editar: ".$row_usuarionome['nome_evento']."</h1>";
//echo "<p>".$row_usuarionome['descricao_evento']."</p><br>";
//echo "<p>Valor: R$ ".$row_usuarionome['valor'].",00</p><br>";


?>



<center>
	<form method="post" action="cad_editar_evento.php?idevento=<?php echo $idevento?>">
		<input type="text" name="nome-evento" placeholder="Título do Evento" value="<?php echo $row_usuarionome['nome_evento']; ?>"><br>
		<textarea id="editor" name="descricao" placeholder="Insira a descrição.."><?php echo $row_usuarionome['descricao_evento']; ?></textarea><br>
		<input type="number" name="valor" placeholder="Valor da Inscrição" value="<?php echo $row_usuarionome['valor']; ?>"><br>
		<input type="color" name="cor" value="<?php echo $row_usuarionome['cor']; ?>"><br>
		<input type="submit" name="Atualizar Evento">
	</form>
</center>



</body>
</html>