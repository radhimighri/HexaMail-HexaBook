<?php
include("config.php");
session_start();
// on vérifie toujours qu'il s'agit d'un membre qui est connecté

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  
  <title>Welcome to HexaMail <?php  $results=mysqli_query($base,"SELECT count(*) as total from messages where $_SESSION[id]=id_destinataire and trash=0 and lu=0");
              $datamdp=mysqli_fetch_assoc($results); ?>
              (<?php echo "$datamdp[total]" ?>)</title>
<link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Favicons -->
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link href="Images/hex.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->

  <!--external css-->


  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

 
  
</head>

<body>


  <section id="container">
  
  
          <?php
          include("header.php");
          ?>

          <?php
          include("sidebar.php");
          ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <!-- page start-->
          <aside class="mid-side">
			<div class="col-lg-12">
				<div class="row content-panel">

              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3> <?php 

					$x=$_SESSION['id'];
					//$a=$_GET['id_message'];
					$requet="SELECT  * from membre WHERE id=$x ";
					$exec=mysqli_query($base,$requet);
					while($ligne=mysqli_fetch_array($exec))
					{
						echo '<p id="textcenter">';
						echo $ligne['nom'],' ',$ligne['prenom']; 
						if (strtoupper($ligne['login']) == 'HACHEM' or strtoupper($ligne['login']) == 'RADHI' )
						{ 							
							echo '<p style="color: red ;" id="devteamcenter" >~Developement Team~ </p> ';}else{echo '<p style="color: green ;" id="hexamembercenter" >~HexaMail Member~ </p> ';} ;  
							echo'</p>';
							}?>
				</h3>
				
				
					<h5 id="textcenter">Future Engineer - Student at EPS.</h5>
						   
              </div> 
			  <audio autoplay id="myaudio" >
						<source src="sounds/hexa.ogg" type="audio/ogg">
					</audio>
                        <script>
						var vid = document.getElementById("myaudio");
							vid.volume = 0.2;
						</script>
			    
			   <div class="col-md-2 centered">
                <div class="profile-pic">
				
                 <?php 

					$x=$_SESSION['id'];
					//$a=$_GET['id_message'];
					$requet="SELECT  DISTINCT chemin from image WHERE idmem=$x ";
					$exec=mysqli_query($base,$requet);
					while($ligne=mysqli_fetch_array($exec))
					{
				?>
                <p >
				<img  src="<?php echo $ligne['chemin'];  ?>" alt="" class="img-circle" width="80" id="imgprof"> </p>
				<?php }?>
                  <p>
                  </p>
                </div>
              </div>

			  </div>

			  </div>
		  
			  
			<h1>
  <span style="color:gold;">P</span>
  <span style="color:green;">r</span>
  <span style="color:blue;">é</span>
  <span style="color:red;">s</span>
  <span style="color:orange;">e</span>
  <span style="color:purple;">n</span>
  <span style="color:oilver;">t</span>
  <span style="color:#FF05F0;">a</span>
  <span style="color:brown;">t</span>
  <span style="color:black;">i</span>
  <span style="color:aqua;">o</span>
  <span style="color:teal;">n</span>
</h1> 
<Br><Br><Br><Br><Br><Br><Br><Br><Br><Br>

 <div class="panel green-panel no-margin" style="position:relative;top:40px;">
                <div class="panel-body">
            <p style="color:black;"><br>Notre mini projet "HexaMail", ayant pour but de consolider nos connaissances acquises en programmation Web lors des séances de cours et de mettre en pratique celles-ci, a été porté sur la création d’une messagerie locale.</p>
<p style="color:black;">Réalisé par :
Ben Amor Hachem
&
Mighri Radhi </p>
<p style="color:black;">Encadré par :
Boudriga Imed</p>
<p style="color:black;">Année universitaire:
2018 - 2019</p>
<p style="color:black;">   L’implémentation de notre application web s'est appuyée sur Bootstrap, PHP, JavaScript, html5, MySQL</p>
<p style="color:black;">Perspectives :</p>
<p style="color:black;">- Création des comptes utilisateurs</p>
<p style="color:black;">- S’authentifier grâce à une adresse mail(ou login) et un mot de passe</p>
<p style="color:black;">- Envoie et consultation des mails</p> 
<p style="color:black;">- Suppression sélectif ou bien collectif des mails</p>
<p style="color:black;">- Répondre ou transmettre (à) un mail</p>
<p style="color:black;">- Compteurs sur les mails (non lus, envoyés, supprimés)</p> 
<p style="color:black;">- Ajouter des publications et consulter celles des autres membres inscrits sur le site.</p> 
<p style="color:black;">- Commenter les publications et consulter les commentaires</p> 

</div></div>

     <div class="hh">
  <span style="color:red;">H</span>
  <span>A</span>
  <span>C</span>
  <span>H</span>
  <span>E</span>
  <span style="color:red;">M</span>
</br>
 <span>& </span>
</br>
  <span style="color:red;">R</span>
  <span>A</span>
  <span>D</span>
  <span>H</span>
  <span style="color:red;">I</span>

</div>    
          </aside>
        
        <!-- page end-->
		
			<div class="col-lg-3">
		 <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>
			</div>
		

			
			
			

      </section>
<?php
include("foot.php");

?>
  



  <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
 <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to HexMail!',
        // (string | mandatory) the text inside the notification
		
       
		
		
		 text: 'Welcome <?php $x=$_SESSION['id'];$requet="SELECT  * from membre WHERE id=$x ";$exec=mysqli_query($base,$requet);while($ligne=mysqli_fetch_array($exec))echo '♥ ',$ligne['prenom']?> ♥, thanks for using our website. Feel free to send any Hexa Mail you want! #MadeWithLove ~Enjoy your stay!~',
        // (string | optional) the image to display on the left
        image: '<?php 

$x=$_SESSION['id'];
$requet="SELECT  DISTINCT chemin from image WHERE idmem=$x ";
$exec=mysqli_query($base,$requet);
while($ligne=mysqli_fetch_array($exec))
	{
	echo $ligne['chemin'];
    	}?>',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  
    <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
 
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
    
	
	
	
</section>


</body>



</html>




