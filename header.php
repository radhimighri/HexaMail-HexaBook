    <?php
include("config.php");
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['login'])) {
  // si ce n'est pas le cas, on le redirige vers l'accueil
  header ('Location: login.php');
  exit();
}
?>
    <header class="header black-bg">
      <div class="sidebar-toggle-box">

        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
	       <a href="accueil3.php" class="logoo"><b><span>Hexa</span></b></a>
           <a href="accueil3.php" class="logo"><b><span>Mail</span></b></a>
      <!--logo end-->
	  
	  
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
        
		
		            <li><a class="logout" id="disco">Disconnect</a></li>
					<li><a class="logout" href="profile.php">Settings</a></li>
					<li><a class="logout" href="">About us</a> <button id="myBtn"></button></li>
					
					
					
    <form action='' method='POST'>
		         <input type="submit" value="Login" name="disco" id="discobut" class="logout">
					</form>
<?php
if (ISSET($_POST['disco']))
{	
?>
	<script type='text/javascript'>
    window.onload = function(){
        document.getElementById("disco").style.display = "none";
    }
    </script>
	
<div class="sk-circle">
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
 

<!-- The Modal -->
<div id="myModall" class="modal">

  <!-- Modal content -->
  <div class="modall-content">
    <div class="modall-header">
      <span class="close">&times;</span>
      <center><h2>About us</h2></center>
    </div>
    <div class="modall-body">
      <p><b>Title:</b> <b><i style="color:#376eac;"> Hexa</i><i style="color:gold;">Mail</i> <i style="color:#376eac;">'H</i><i style="color:gold;">M'</i> </b></p>
      <p><b>Developed by :</b> <b><i style="color:black;">Ben Amor <i style="color:#376eac;">H</i>achem & <i style="color:gold;">M</i>ighri Radhi</i></b></p>
	  <p><b>Created: <i style="color:black;">Wednesday, 13th Mars 2019 >> Wednesday, 20th Mars 2019</i></b></p>
	  <p><b><i style="color:black;">The purpose of this website is to allow all EPS members to connect with each other. In here you can send 'HexaMails' using specific email addresses.
  <p>We created this local messenger as part of a mini-project and we think that thanks to this web application communication will be easier between the members of the EPS.</p>
	  <p>Please note: To use this website, you will need an e-mail '@ Polytechnicien.tn' so that only students, professors and other members working within the EPS can use it.</i><b></p>
    </div>
    <div class="modall-footer">
   					
			
    </div>

  </div>

</div>






<script>

// Get the modal
var modall = document.getElementById('myModall');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modall.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modall.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modall) {
    modall.style.display = "none";
  }
}
</script>
	  <div id="time" style="color:white;"> </div>
<script>
function updateClock() {
    var now = new Date(), // current date
        months = ['January', 'February', 'March','April','May','June','July','August','September','October','November','December',]; // you get the idea
        time = now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds(), // again, you get the idea

        // a cleaner way than string concatenation
        date = [now.getDate(), 
                months[now.getMonth()],
                now.getFullYear()].join(' ');

    // set the content of the element with the ID time to the formatted string
    document.getElementById('time').innerHTML = [date, time].join(' / ');

    // call this function again in 1000ms
    setTimeout(updateClock, 1000);
}
updateClock(); // initial call
</script>



        </ul>	


		<marquee scrollamount="7" direction="left" behavior="scroll" >
		<b style="color:#376eac;"><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HEXA</b> <b style="color:gold;">MAIL >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><b>
</marquee>
      </div>
	  
	  
	  
	
  
    </header>
    <!--header end-->

