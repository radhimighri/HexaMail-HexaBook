<?php
include("config.php");
session_start();
// on vérifie toujours qu'il s'agit d'un membre qui est connecté

?>

<!DOCTYPE html>
<html >

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

 
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="upld/dist/css/bootstrap-imageupload.css" rel="stylesheet">
<style type="text/css">
textarea {
 background-color: white;
 font-size: 1em;
 font-weight: bold;
 font-family: Verdana, Arial, Helvetica, sans-serif;
}
</style>
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
		  
			  
<Br><Br><Br><Br><Br><Br><Br><Br><Br><Br>

 <div class="panel green-panel no-margin" style="position:relative;top:40px;">

                <div class="panel-body">
           
<?php

if(empty($_SESSION['id']))
  header("location:connexion1.php");
else
{
  $id=$_SESSION['id'];



if(isset($_POST['publier']))
{ 
  $date=date("d-m-Y");
    $heure=date('H:i');
  $titre=$_POST['pub'];
  echo $_FILES['fichier']['name'];
  if(!empty($_FILES['fichier']['name']))
  {

    $name=$_FILES['fichier']['name'];
    $type=$_FILES['fichier']['type'];
    //$data=file_get_contents($_FILES['myfile']['tmp_name']);
    $target="upload_image/".basename($_FILES['fichier']['name']);
    //echo $target;
    move_uploaded_file($_FILES['fichier']['tmp_name'], $target);
    //$res=mysqli_query($base,"insert into image2 values(NULL,'4','3','$target')");
    
  }
  else
    $target="";
  $res=mysqli_query($base,"insert into publication values('','$id','$titre','$date','$heure','$target')");

}


echo"<form action='' method='POST' enctype='multipart/form-data'>";
echo"<div align='left'>";
echo"<table>
<tr><td><textarea rows='4' name='pub' cols='60' class='form-control' placeholder='Whats on your mind ?'></textarea></td></tr>
<tr><td><div class='imageupload panel panel-default'>
             
                <div class='file-tab panel-body'>
                    <label class='btn btn-default btn-file'>
                        <span>Browse</span>
                        
                        <input type='file' name='fichier'>
                    </label>
                    <button type='button' class='btn btn-default'>Remove</button>
                </div>
                <div class='url-tab panel-body'>
                    <div class='input-group'>
                        <input type='text' class='form-control hasclear' placeholder='Image URL'>
                        <div class='input-group-btn'>
                            <button type='button' class='btn btn-default'>Submit</button>
                        </div>
                    </div>
                    <button type='button' class='btn btn-default'>Remove</button>
                    <input type='hidden' name='image-url'>
                </div>

                
</div></tr>
                           

            


<tr><td align='left'><button class='btn btn-sm btn-theme03' name='publier' value='publier'>POST</button></td></tr>
<tr><td></td></tr>
</table><br>";
echo"<Hr>";

  $res=mysqli_query($base,"SELECT DISTINCT prenom,datepub,heure,titre,idpub,target,chemin FROM membre,publication,image WHERE membre.id=publication.idp and membre.id=image.idmem order by datepub desc,heure desc");
  if(isset($_POST['c']))
{

  $d=date('d-m-Y');
  $h=date('H:i');
  $idpub=$_POST['idpub'];
  $text=$_POST['textecom'];
  $res55=mysqli_query($base,"insert into commentaire values('','$idpub','$id','$text','$d','$h')");

}

  while ($l=mysqli_fetch_array($res)) {
    echo"<br><br>";
    
    echo"<fieldset><table>";
  echo"<tr><td></td><td></td><td  align='left'><IMG SRC='$l[6]' hight='50' width='50' class='img-circle'>$l[0]</td><tr><td></td><td></td><td>$l[1]  $l[2]</td></tr><tr><td></td>";
  if(!empty($l[5]))
  { 
    echo"<td></td><td><div align='left'  rows='4' cols='61' disabled>$l[3]</div></td></tr>";
    echo"<tr><td></td><td></td><td><IMG SRC='$l[5]' hight='500' width='500'  ></td></tr>";
  }
  else
    {echo"<td></td><td><div align='left' rows='4' cols='61' disabled>$l[3]</div></td></tr>";
    }
  
    if(isset($_GET['p1'])and ($l[4]==$_GET['p1']))
    {$res2=mysqli_query($base,"SELECT DISTINCT textecom,prenom,datecomm,chemin,heure3 FROM publication,commentaire,membre,image WHERE publication.idpub=commentaire.idpub and commentaire.idp=membre.id and commentaire.idp=image.idmem and publication.idpub='$l[4]' order by datecomm ,heure3");
    
    while($l1=mysqli_fetch_array($res2))
    {
      echo"<tr><td></td><td align='right'><IMG SRC='$l1[3]' hight='30' width='30' class='img-circle'> $l1[1]</td><td><pre align='left' rows='3' cols='62' disabled> $l1[0]</pre></td><td>$l1[2] $l1[4]</td></tr>";
    }
  }
  echo"  
  <tr><td></td><td></td><td>
  <a href= '?p=$l[4]'><button type='button' class='btn btn-primary btn-xs'>Commenter</button></a><a href ='?p1=$l[4]'> <button type='button' class='btn btn-primary btn-xs'>Commentaires</button></a>
  </td><td >
  </td></tr> ";

      if(isset($_GET['p'])and ($l[4]==$_GET['p']))
  { 
    echo"<tr><td></td><td></td><td><textarea align='left' rows='4' cols='60' name='textecom'></textarea></td><td><input type='hidden' name='idpub' value=$l[4]><input type='submit' name='c' value='Valider' class='btn btn-primary btn-xs'></td></tr>";
  }
  
  echo"</table></fieldset>";


}

  echo"</table>";
  echo"</div>";
  



}
  ?>




           </div>



</div>

<div class="hh">

</div>    
          </aside>
        
        <!-- page end-->
		
			<div class="col-lg-3">
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
    
	
	
	
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="upld/dist/js/bootstrap-imageupload.js"></script>

        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>
</section>


</body>



</html>




