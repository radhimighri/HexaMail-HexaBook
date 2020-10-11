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
  <title>Trash</title>

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
          ?>        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    
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
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">

                    <?php
                    $results3=mysqli_query($base,"SELECT count(*) as total from messages where trash=1 and $_SESSION[id]=id_destinataire");
                    $results4=mysqli_query($base,"SELECT count(*) as total from msg_sent where trash=1 and $_SESSION[id]=id_expediteur");
          
                    $dattrash=mysqli_fetch_assoc($results3); 
                    $dattrash2=mysqli_fetch_assoc($results4); 
                    $c=$dattrash['total']+$dattrash2['total'];
          ?>
                    <h4 class="gen-case">
                    Trash (<?php echo "$c" ?> Deleted message)
                    <form action="#" class="pull-right mail-src-position example">
                      <div class="input-append">
                      <input id="myInput" type="text" class="form-control " placeholder="Search Mail..">
                      </div>
                    </form>
                  </h4>
              </header>
           <div class="panel-body minimal">
                <div class="mail-option">

               <div class="btn-group">
                    <a data-original-title="Refresh"    class="btn mini tooltips" value="Refresh Page" onClick="window.location.reload()">
                      <i class=" fa fa-refresh"></i>
                      </a>
                  </div>
				  
                
		  <a href="supprimer_all_trash.php" class="btn btn-suppp" onclick="return confirm('By clicking Ok all your mails will be deleted !!! Are you sure ?')">
           
               <strong><font color="red"> <i class="fa fa-trash"></i> Empty Trash</font></strong>            
                   </a> 
				   
                  <ul class="unstyled inbox-pagination">
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                    </li>
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="table-inbox-wrap ">
      
     <table class="table table-inbox table-hover">
     <th></th>
					<th>Date</th>
					<th>Subject</th>
          <th></th>
					<th><center></center></th>
     <tbody id="myTable">
      

      		 <?php

$sql = 'SELECT titre, date, membre.login as expediteur, messages.id as id_message FROM messages, membre WHERE id_destinataire="'.$_SESSION['id'].'" AND id_expediteur=membre.id AND messages.trash=1 ORDER BY date DESC';

//$sql = 'SELECT titre, date, membre.login as expediteur, messages.id as id_message FROM messages, membre WHERE id_destinataire="'.$_SESSION['id'].'" or id_expediteur="'.$_SESSION['id'].'"  and trash=1 ORDER BY date DESC';


// lancement de la requete SQL
$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
$nb = mysqli_num_rows($req);

if ($nb == 0) {
  //echo 'Vous n\'avez aucun message.';
 // echo 'Zero message réçu.';
}

else {
	
	while ($data1 = mysqli_fetch_array($req)) {
		
	?>         
     <tr >                 
                         <td class="inbox-small-cells">
                          
                        </td>

                        <td class="view-message  dont-show"><?php echo ' - <a href="trash_view.php?id_message=' , $data1['id_message'] , '">' , $data1['date'] ,'</a>' ?> </td>
						<td class="view-message "><?php echo  ' - <a href="trash_view.php?id_message=' , $data1['id_message'] , '">' , stripslashes(htmlentities(trim($data1['titre']))) ,'</a>'?></td>
            <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>

                        <td class="view-message  text-right"> <?php echo ' - <a href="trash_view.php?id_message=' , $data1['id_message'] , '">' , '[ Message from ' , stripslashes(htmlentities(trim($data1['expediteur']))) , ' ]' ,'</a>' ?> </td>
                      </tr> 
					  <?php
	}
}



mysqli_free_result($req);

?>  

<?php 
$sql2 = 'SELECT titre, date, membre.login as destinateur, msg_sent.id as id_message_sent FROM msg_sent, membre WHERE id_expediteur="'.$_SESSION['id'].'" AND id_destinataire=membre.id AND trash=1 ORDER BY date DESC';
$req2 = mysqli_query($base,$sql2) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

	$nb = mysqli_num_rows($req2);

if ($nb == 0) {
  //echo 'Vous n\'avez aucun message.';
  //echo 'Zero message envoyé.';

}

else {
			
  while ($data = mysqli_fetch_array($req2)) { ?>
   
          <tr>
                         <td class="inbox-small-cells">
                         
                        </td>


                        <td class="view-message  dont-show"><?php echo ' - <a href="trash_view_sent.php?id_message_sent=' , $data['id_message_sent'] , '">' ,  $data['date'] ,'</a>' ?> </td>
            <td class="view-message "><?php echo  ' - <a href="trash_view_sent.php?id_message_sent=' , $data['id_message_sent'] , '">' , stripslashes(htmlentities(trim($data['titre']))) ,'</a>'?></td>
            <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>

                        <td class="view-message  text-right"> <?php echo ' - <a href="trash_view_sent.php?id_message_sent=' , $data['id_message_sent'] , '">' , '[ Message To ' , stripslashes(htmlentities(trim($data['destinateur']))) , ' ]' ,'</a>' ?> </td>


                      </tr>
                    </div>

              <?php }}
                      mysqli_close($base);
                  ?>           
          </tbody>
          </table>   
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
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>

  <script src="/lib/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <!--script for this page-->

</body>

</html>
