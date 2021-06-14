<?php
if (!$_SESSION['usuario']) {
	header('location: index.php');
	exit();
}

?>