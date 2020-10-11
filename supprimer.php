<?php
session_start();
include("config.php");

if (!isset($_SESSION['login'])) {

	header ('Location: login.php');
	exit();
}

if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
	header ('Location: inbx.php');
	exit();
}
else {

	$sql = 'UPDATE messages SET trash=1 WHERE id_destinataire="'.$_SESSION['id'].'" AND id="'.$_GET['id_message'].'"';

	$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

	mysqli_close($base);

	header ('Location: inbx.php');
	exit();
}
?>