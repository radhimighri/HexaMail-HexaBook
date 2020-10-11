<?php
session_start();
include("config.php");

if (!isset($_SESSION['login'])) {

	header ('Location: login.php');
	exit();
}



	$sql = 'UPDATE messages SET trash=1 WHERE id_destinataire="'.$_SESSION['id'].'" ';

	$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

	mysqli_close($base);

	header ('Location: inbx.php');
	exit();

?>