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
if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
	header ('Location: trash.php');
	exit();
}
else {

	// on prépare une requête SQL permettant de supprimer le message tout en vérifiant qu'il appartient bien au membre qui essaye de le supprimer
	$sql = 'DELETE FROM messages WHERE id_destinataire="'.$_SESSION['id'].'" AND id="'.$_GET['id_message'].'"';
	// on lance cette requête SQL
	$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

	mysqli_close($base);

	header ('Location: trash.php');
	exit();
}
?>