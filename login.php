<HTML>
<head>
<link href="css1/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="maillogin.css">
	<title>Sign in HexaMail</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="css1/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="Images/hex.png" rel="icon">

</head>
<BODY>

<div class="container">
  <div class="d-flex justify-content-center h-100">
  <img src= "Images/polylogo.png" class="polylogo">
	<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
				    <img alt="Logo" src= "Images/logo2.png" class="logo">
                    
					<!-- <span><i class="fab fa-facebook-square"></i></span> -->
					<!-- <span><i class="fab fa-google-plus-square"></i></span> -->
					<!-- <span><i class="fab fa-twitter-square"></i></span> -->
				</div>
			</div>
		<div class="card-body">
			<form action='' method='POST'>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="mail" placeholder="Email/Username" >
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="mdp" placeholder="Password">
					</div>

					<div class="input-group form-group">
						 <input type="submit" id="submitbtn" value="Login" name="ok" class="btn float-none login_btn"  >
					</div>
			</form>
		 </div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="inscrire.php">Sign Up</a>
				</div>
			</div>
		</div>
	
<?php
if (ISSET($_POST['ok']))
{
	$email=$_POST['mail'];
	$mdp=$_POST['mdp'];
	include ("config.php");
	$res= mysqli_query($base,"SELECT * from membre WHERE email = '$email' or login='$email' and pass='$mdp'");
	if ($l=mysqli_fetch_array($res))
	{
		session_start();
		$_SESSION['id']=$l[0];
			$_SESSION['login'] = $l[1];
		
		// on enregistre en plus l'id du membre dans une variable de session
		$_SESSION['id'] = $l[0];
		
	?>
	<script type='text/javascript'>
    window.onload = function(){
        document.getElementById("submitbtn").style.display = "none";
    }
    </script>
		<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<?php
      header('Refresh: 3; accueil2.php');
	}		
	else
    echo'<div class="fullscreenDiv"> <div id="msgloginerreur">ERROR: INCORRECT INPUTS!</div> </div>​';
	mysqli_close($base);
}
?>
</div>
</div>
</body>
</html>