<?php
//ob_start();
include("config.php");
session_start();
ob_start();
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
  <title>Profil</title>
  <link href="Images/hex.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">

      
              <!-- /col-md-4 -->
      
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
              
                 

                 
                   
                    <center>Account Settings</center>
                  
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
          
                  <!-- /tab-pane -->
                  
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane active">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Personal Information</h4>
                          

<?php
if (isset($_SESSION['id']))
{
include("config.php");
$x=$_SESSION['id'];
$req=mysqli_query($base,"select * from membre where id='$x' ");
$req2=mysqli_query($base,"select * from image i,membre m where m.id='$x' and $x=i.idmem ");

if($l=mysqli_fetch_array($req))

if($k=mysqli_fetch_array($req2))



                       ?>
					   <form action="profile.php" method="POST">
					   <?php

                            echo '<div class="form-group">';

                              echo " Name: <input type='text' name='nom' class='form-control' value='$l[6]'><br>"; ?>
                          </div>

                          <div class="form-group">
                              <?php echo "Last Name: <input type='text'  name='prenom' class='form-control' value='$l[7]'><br>"; ?>
                          </div>


                          <div class="form-group">
                              <?php echo "Date of Birth: <input type='DATE'  name='datenais' class='form-control' value='$l[4]'><br>"; ?>
                          </div>

                          <div class="form-group">
                              <?php echo "E-mail: <input type='text'  name='email' class='form-control' value='$l[5]'><br>"; ?>
                          </div>


                          <div class="form-group">
                              <?php echo "Login: <input type='text' name='login' class='form-control' value='$l[1]'><br>"; ?>
                           </div>

                          <div class="form-group">
                              <?php echo "Password: <input type='password'  name='pass' class='form-control' value='$l[2]'><br>"; ?>
                            </div>

                          <div class="form-group">
                              <?php echo "Re-enter Password: <input type='password'  name='repass' class='form-control' value='$l[3]'><br>"; ?>
                          </div>

                          <div class="form-group">
                              <?php echo "SEXE: <input type='text'  name='sexe' class='form-control' value='$l[8]'><br>"; ?>
                          </div>

                          <div class="form-group">
                              <?php echo "Country: <input type='text'  name='country' class='form-control' value='$l[9]'><br>"; ?>
                          </div>


                          <div class="form-group" >
                               Profile Picture: 

                    <i class="glyphicon glyphicon-plus"></i>
                  <input type="file" name="photo" multiple>


                            </div> 
                   <div class="form-group" align="center">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button  type="submit"  name="ok" class="btn btn-theme02">Confirm</button>
                              <button class="btn btn-theme04" type="submit" name="annu">Decline</button>
                            </div>
                          </div>
                       </form>
 <?php 
if(isset($_POST['ok']))
{
  header("location:accueil.php");

  $Nom=$_POST['nom'];
  $Prenom=$_POST['prenom'];
  $datenais=$_POST['datenais'];
  $email=$_POST['email'];
  $Login=$_POST['login'];
  $PASSWD=$_POST['pass'];
  $repass=$_POST['repass'];
  $photo=$_POST['photo'];
  $sex=$_POST['sexe'];
  $contr=$_POST['country'];


  $res=mysqli_query($base,"update membre set nom='$Nom',prenom='$Prenom',datenais='$datenais',login='$Login',pass='$PASSWD',pass_confirm='$repass',email='$email',sex='$sex',country='$contr' where id='$x' ");
  $res2=mysqli_query($base,"INSERT INTO image VALUES('','$x','5','5')" );
  $res3=mysqli_query($base,"UPDATE image set chemin='img/$photo' where idmem='$x'" );
  
  mysqli_close($base);
  header("location:profile.php");

}
}
else
{
  header("location:index.php");
}
?>

                      </div>
                      <div class="col-lg-8 col-lg-offset-2 detailed mt">
                      
                        
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
	  <?php
include("foot.php");
?>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->


</body>

</html>
