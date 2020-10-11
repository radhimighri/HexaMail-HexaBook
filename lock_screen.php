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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Locked</title>

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

<body onload="getTime()">
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="container" id="all">
    <div id="showtime"></div>
    <div class="col-lg-4 col-lg-offset-4">
      <div class="lock-screen">
        <h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
        <p>Unlock</p>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Welcome Back <?php echo strtoupper (stripslashes(htmlentities(trim($_SESSION['login'])))); ?> !!</h4>
              </div>
              <div class="modal-body">
				<?php 

					$x=$_SESSION['id'];
					//$a=$_GET['id_message'];
					$requet="SELECT DISTINCT chemin from image WHERE idmem=$x ";
					$exec=mysqli_query($base,$requet);
					while($ligne=mysqli_fetch_array($exec))
					{
				?>
                <p class="centered">
				<img src="<?php echo $ligne['chemin'];  ?>" alt="" class="img-circle" width="80"> </p>
				<?php }?>
				 <form action='' method='POST'>
				<input type="password" name="passlock"  placeholder="Password">
				
              </div>
              <div class="modal-footer centered">
			 
			  
                <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>      
			   <input type="submit" value="Enter" name="enterbut" class="btn btn-theme03"  >
			   </form>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
      <!-- /lock-screen -->
    </div>
    <!-- /col-lg-4 -->
  </div>
  
  <?php
				if (ISSET($_POST['enterbut']))
				{
					$mdp=$_POST['passlock'];
					$x = $_SESSION['id'];
					include ("config.php");
					$res= mysqli_query($base,"SELECT * from membre WHERE id='$x' and pass='$mdp'");
					if ($l=mysqli_fetch_array($res))
						header("Location:accueil22.php");
                    else
                        echo '<form action="" method="POST"> <p id="errorlock"> <center style="color:red;">Incorrect Password! <u><a href="?pageSet=true" style="color:red;">Logout?</a></u></center> </p></form>';						
				}
				
				if (ISSET($_GET['pageSet']))
				{
					?>
						<script type='text/javascript'>
						window.onload = function(){
						document.getElementById("all").style.display = "none";
						}
						</script>
				       <div class="sk-circle" id="discolock">
  				       <div class="sk-circle1 sk-child"></div>
  				       <div class="sk-circle2 sk-child"></div>
  				       <div class="sk-circle3 sk-child"></div>
  				       <div class="sk-circle4 sk-child"></div>
 				       <div class="sk-circle5 sk-child"></div>
  				       <div class="sk-circle6 sk-child"></div>
 				       <div class="sk-circle7 sk-child"></div>
 				       <div class="sk-circle8 sk-child"></div>
 				       <div class="sk-circle9 sk-child"></div>
  				       <div class="sk-circle10 sk-child"></div>
  				       <div class="sk-circle11 sk-child"></div>
 				       <div class="sk-circle12 sk-child"></div>
					   </div>
					   <?php
					   header('Refresh: 3; fermer.php');
				}
				
				?>
  
  
  
  <!-- /container -->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
  
  
  

    $.backstretch("img/lock.jpg", {
      speed: 500
    });
  </script>
  <script>
    function getTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function() {
        getTime()
      }, 500);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  </script>
</body>

</html>
