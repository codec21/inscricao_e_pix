<?php
if (!$_SESSION['usuario-adm']) {
	header('location: index.php');
	exit();
}

?>