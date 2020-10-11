
<?php
session_start();
include("config.php");

// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['login'])) {
	// si ce n'est pas le cas, on le redirige vers l'accueil
	header ('Location: login.php');
	exit();
}

// on teste si le formulaire a bien été soumis
if (isset($_POST['go']) && $_POST['go'] == 'Envoyer') {
	if (empty($_POST['destinataire']) || empty($_POST['titre']) || empty($_POST['message'])) {
	$erreur = 'Au moins un des champs est vide.';
	}
	else {
	//$base = mysql_connect ('serveur', 'login', 'password');
	//mysql_select_db ('nom_base', $base);
	//$base=mysqli_connect("localhost","root","","nom_base");
	// si tout a été bien rempli, on insère le message dans notre table SQL
	$sql = 'INSERT INTO messages VALUES("", "'.$_SESSION['id'].'", "'.$_POST['destinataire'].'", "'.date("Y-m-d H:i:s").'", "'.mysqli_escape_string($base,$_POST['titre']).'", "'.mysqli_escape_string($base,$_POST['message']).'",0,0,"img/'.mysqli_escape_string($base,$_POST['picture']).'")';
	mysqli_query($base,$sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($base));


	$sql2 = 'INSERT INTO msg_sent VALUES("", "'.$_SESSION['id'].'", "'.$_POST['destinataire'].'", "'.date("Y-m-d H:i:s").'", "'.mysqli_escape_string($base,$_POST['titre']).'", "'.mysqli_escape_string($base,$_POST['message']).'",0,0,"img/'.mysqli_escape_string($base,$_POST['picture']).'")';
	mysqli_query($base,$sql2) or die('Erreur SQL !'.$sql2.'<br />'.mysqli_error($base));


	mysqli_close($base);

	header('Location: env_scc.php');
	exit();
	}
}
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Send Mail</title>

  <!-- Favicons -->
  <link href="Images/hex.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
<?php
          include("header.php");
          ?>

          <?php
          include("sidebar.php");
          ?>    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
          <div class="col-sm-3">
    
<?php
include("mailmenu.php");
?>


          </div>
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                    Send Mail
                    <form action="#" class="pull-right mail-src-position">
					<?php
//$base = mysql_connect ('serveur', 'login', 'password');
//mysql_select_db ('nom_base', $base);
//$base=mysqli_connect("localhost","root","","nom_base");
// on prépare une requete SQL selectionnant tous les login des membres du site en prenant soin de ne pas selectionner notre propre login, le tout, servant à alimenter le menu déroulant spécifiant le destinataire du message
$sql = 'SELECT membre.login as nom_destinataire, membre.id as id_destinataire FROM membre WHERE id <> "'.$_SESSION['id'].'" ORDER BY login ASC';
// on lance notre requete SQL
$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
$nb = mysqli_num_rows ($req);

if ($nb == 0) {
	// si aucun membre n'a été trouvé, on affiche tout simplement aucun formulaire
	echo 'Vous êtes le seul membre inscrit.';
}
else {
	// si au moins un membre qui n'est pas nous même a été trouvé, on affiche le formulaire d'envoie de message
	?>
                      <div class="input-append">
                      </div>
                    </form>
                  </h4>
              </header>
              <div class="panel-body">
                <div class="compose-btn pull-right">
                </div>
				

	
	<!--Pour : <select name="destinataire"!-->
	
	
                <div class="compose-mail">
                  <form role="form-horizontal"  action="mail_compose.php" method="post">
                    <div class="form-group">
                      <label for="to" class="">To:  </label>
					  
					  
					
					  
					  
                       <select class="form-control" name="destinataire">
					 
					  <?php   
						// on alimente le menu déroulant avec les login des différents membres du site
						while ($data = mysqli_fetch_array($req)) {
						echo '<option value="' , $data['id_destinataire'] , '">' , stripslashes(htmlentities(trim($data['nom_destinataire']))) , '</option>';
						}
						?> 
                      </select>
					  </div>
                    </div>
                    <div class="form-group">
                      <label for="subject" class="">Subject:</label>
                      <input type="text" tabindex="1" id="subject" class="form-control" name="titre" value="<?php if (isset($_POST['titre'])) echo stripslashes(htmlentities(trim($_POST['titre']))); ?>">
                    </div>
                    <div class="compose-editor">
                      <textarea class="wysihtml5 form-control" rows="9" name="message"><?php if (isset($_POST['message'])) echo stripslashes(htmlentities(trim($_POST['message']))); ?></textarea>
                      <input type="file" class="default" name="picture">
                    </div>
			
                    <div class="compose-btn">
                      <button class="btn btn-sm" id="annuler"> <i   class="fa fa-times"></i> Cancel</button>

                      <button class="btn btn-sm" id="envoyer" name="go" value="Envoyer" ><i class="fa fa-check"></i> Send</button>

                    </div>
                  </form>
                </div>
              </div>
			  
			  </section>	  <?php
				include("foot.php");

				?>
            </section>
          </div>
        </div>
      </section>
      <!-- /wrapper -->

    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->




    <!--footer end-->
  
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript" src="lib/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

  <script type="text/javascript">
    //wysihtml5 start

    $('.wysihtml5').wysihtml5();

    //wysihtml5 end
  </script>
  <?php
}
mysqli_free_result($req);
mysqli_close($base);
?>
</select>

<br /><br /><a href="deconnexion.php">Déconnexion</a>
<?php
// si une erreur est survenue lors de la soumission du formulaire, on l'affiche
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>

</html>
