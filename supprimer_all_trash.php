<?php
session_start();
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
include("config.php");

if (!isset($_SESSION['login'])) {
	// si ce n'est pas le cas, on le redirige vers l'accueil
	header ('Location: login.php');
	exit();
}

// on teste si l'id du message a bien été fourni en argument au script envoyer.php


	// on prépare une requête SQL permettant de supprimer le message tout en vérifiant qu'il appartient bien au membre qui essaye de le supprimer
	$sql = 'DELETE FROM messages WHERE id_destinataire="'.$_SESSION['id'].'" and trash=1 ' ;
	// on lance cette requête SQL
	$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

	$sql2= 'DELETE FROM msg_sent WHERE id_expediteur="'.$_SESSION['id'].'" and trash=1 ';
	// on lance cette requête SQL
	$req = mysqli_query($base,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($base));
	
	mysqli_close($base);

	header ('Location: trash.php');
	exit();

?>