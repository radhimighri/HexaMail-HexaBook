<?php
include("config.php");
session_start();
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['login'])) {
  // si ce n'est pas le cas, on le redirige vers l'accueil
 header ('Location: login.php');
  exit();
}
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Trash view</title>

  <!-- Favicons -->
  <link href="Images/hex.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

 
</head>

<body>
  <section id="container">
 
    <!--header start-->
<?php
          include("header.php");
          ?>

          <?php
          include("sidebar.php");
          ?>     <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
          <div class="col-sm-3">
 
<?php
include("maimenutrash.php");
?>
          </div>



          <div id="printableArea">
  
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                Trash view
                    <form action="#" class="pull-right mail-src-position">
                      <div class="input-append">
                      </div>
                    </form>
                  </h4>
              </header>

 
<?php 
if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
  echo 'Aucun message reconnu.';
}
else {

  $sql = 'SELECT titre, date, message, membre.login as expediteur FROM messages, membre WHERE id_destinataire="'.$_SESSION['id'].'"   AND id_expediteur=membre.id AND messages.id="'.$_GET['id_message'].'" AND messages.trash=1 ';
  // on lance cette requete SQL à MySQL
  $req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
  
  
  $nb = mysqli_num_rows($req);
  $datitr=mysqli_fetch_assoc($req);

if ($nb == 0) {
  echo 'Aucun message reconnu.';
  }
  else {
  // si le message a été trouvé, on l'affiche
  $data = mysqli_fetch_array($req);
  ?>

 <div class="panel-body">
 <div id="printableArea">
  <div class="mail-sender" >
                  <div class="row" >
                    <div class="col-md-8"  >

                      
                      <strong></a>[My Message to :</strong>
                      <strong><?php echo stripslashes(htmlentities(trim($datitr['expediteur']))) ,']'?></strong>
                    </div>
                    <div class="col-md-4" id="printableArea">
                      <p class="date"><?php echo 'Message Date: ',stripslashes(htmlentities(trim($datitr['date'])))  ?></p>
                    </div>
                  </div>
                </div>
 
                <div class="mail-header row" id="printableArea">
                  <div class="col-md-8">
                    <h4 class="pull-left"> <?php echo 'Subject: ',$datitr['titre'] ?> </h4>
                  </div>
                  
                </div>


               
                <hr>
                <div class="view-mail">
                  <p id="msgsent"><?php echo 'Message : ',  $datitr['message'];?></p>
                </div>
				</div>
           
                <div class="compose-btn pull-left">
                 <br><br> 
                    <?php 

                        $x=$_SESSION['id'];
                        $a=$_GET['id_message'];

                    $requet="SELECT * from messages WHERE id_expediteur=$x AND id=$a ";
                    $exec=mysqli_query($base,$requet);
                    while($ligne=mysqli_fetch_array($exec))
                    {

                        if (($ligne['picture']) != "img/" )
						   {
                        ?>      
                           <img width="100px" height="100px" src="<?php echo $ligne['picture']; ?>" alt=""><br><hr>
					<?php 
					}
					
					}
					?>

                 

                  <button class="btn  btn-sm tooltips" data-original-title="Print" onclick="printDiv('printableArea')" value="print a div!" type="button" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-print"></i> </button>
                  <?php echo '<a href="empty_trash_sent.php?id_message_sent=' , $_GET['id_message_sent'] , '" '?> ><button class="btn btn-sm tooltips" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-trash-o"></i></button></a>
                </div>


                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->


<?php
include("foot.php"); 
?>
    <!--footer end-->
  </section>
  	<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script >
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}  
  </script>



<?php 


	

//echo '<br /><br /><a href="supprimer.php?id_message=' , $_GET['id_message'] , '">Supprimer ce message</a>';
  }
mysqli_free_result($req);
  mysqli_close($base);
}
?>
</body>

</html>
