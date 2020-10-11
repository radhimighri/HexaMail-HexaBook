<?php
session_start();
include("config.php");

if (!isset($_SESSION['login'])) {

	header ('Location: login.php');
	exit();
}




	$sql = 'UPDATE msg_sent SET trash=1 WHERE id_expediteur="'.$_SESSION['id'].'"';


	$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

	mysqli_close($base);

	header ('Location: sent.php');
	exit();

?>