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
  <title>Sent Mails</title>

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
include("mailmenusent.php");
?>
          </div>
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
           <?php  $results2=mysqli_query($base,"SELECT count(*) as total from msg_sent where trash=0 and $_SESSION[id]=id_expediteur");
          $datsent=mysqli_fetch_assoc($results2); ?>

                    Sent Mails (<?php echo "$datsent[total]" ?> Sent message)
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
                
		  <a href="supprimer_all_sent.php" class="btn btn-supp" onclick="return confirm('By clicking Ok all your mails will be deleted !!! Are you sure ?')">
           
               <strong><font color="red"> <i class="fa fa-trash"></i> Delete All</font></strong>            
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
					<th><center>Destination</center></th>
   <tbody id="myTable">

     <?php


$sql = 'SELECT titre, date, membre.login as destinateur, msg_sent.id as id_message FROM msg_sent, membre WHERE id_expediteur="'.$_SESSION['id'].'" AND id_destinataire=membre.id AND trash=0 ORDER BY date DESC' ;

$req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
$nb = mysqli_num_rows($req);

if ($nb == 0) {
	echo 'No sent messages !';
  //echo 'Vous n\'avez aucun message.';

}

else {
	
	while ($data = mysqli_fetch_array($req)) {
		
	?>         
	   <tr >

                         <td class="inbox-small-cells">
                          
                        </td>
                        <td class="view-message  dont-show"><?php echo ' - <a href="sent_view.php?id_message=' , $data['id_message'] , '">' , $data['date'] ,'</a>'?> </td>
						<td class="view-message "><?php echo  ' - <a href="sent_view.php?id_message=' , $data['id_message'] , '">' , stripslashes(htmlentities(trim($data['titre']))) ,'</a>'?></td>
                        <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                        <td class="view-message  text-right"> <?php echo ' - <a href="sent_view.php?id_message=' , $data['id_message'] , '">' ,'[ Message To: ' , stripslashes(htmlentities(trim($data['destinateur']))) , ' ]' ,'</a>' ?> </td>
                      </tr>
					  <?php
	}
}
mysqli_free_result($req);
mysqli_close($base);
?>						
                     
                    
                    </tbody>
                  </table>
            
           
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
