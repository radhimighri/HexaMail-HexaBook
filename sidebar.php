    <!--sidebar start-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <aside>

  <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">  

<?php 

$x=$_SESSION['id'];
//$a=$_GET['id_message'];
$requet="SELECT  DISTINCT chemin from image WHERE idmem=$x ";
$exec=mysqli_query($base,$requet);
while($ligne=mysqli_fetch_array($exec))
{
?>
<img src="<?php echo $ligne['chemin'];  ?>" alt="" class="img-circle" width="120">
  <?php }?>
          <h5 class="centered">Welcome <u><b>
		  
		  <?php         					

		  echo strtoupper (stripslashes(htmlentities(trim($_SESSION['login'])))); ?> </b></u></h5> </a>
             

              <li>
            <li class="mt">
            <a  href="inbx.php">
              <i class="fa fa-envelope"></i>
              <span>MailSpace</span>
              <?php  $results=mysqli_query($base,"SELECT count(*) as total from messages where $_SESSION[id]=id_destinataire and trash=0 and lu=0");
              $datamdp=mysqli_fetch_assoc($results); ?>
              <span class="label label-theme pull-right mail-info" style="color:white;font-weight:bold">(<?php echo "$datamdp[total]" ?> new)</span>
              </a>
            </li>

             <li class="mt">
            <a  href="accueil.php">
              <i class="fa fa-dashboard"></i>
              <span>HexaBook</span>
              <span class="label label-theme pull-right mail-info" style="color:white;font-weight:bold"></span>
              </a>
            </li> 

                    <a href="lock_screen.php"><button id="buttonv" class="btn"> Lock <i class="fa fa-power-off" ></i>
</button>
</a>

                           
             </li>   
			 
    </ul>
		<h5 class="ml8">
  <span class="letters-container">
    <span class="letters letters-left" style="color:#376eac;">H<i style="color:gold;">M</i> </span>
  </span>
  <span class="circle circle-white"></span>
  <span class="circle circle-dark"></span>
  <span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span>
</h5> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>	
<script>
	anime.timeline({loop: true})
  .add({
    targets: '.ml8 .circle-white',
    scale: [0, 3],
    opacity: [1, 0],
    easing: "easeInOutExpo",
    rotateZ: 360,
    duration: 1100
  }).add({
    targets: '.ml8 .circle-container',
    scale: [0, 1],
    duration: 1100,
    easing: "easeInOutExpo",
    offset: '-=1000'
  }).add({
    targets: '.ml8 .circle-dark',
    scale: [0, 1],
    duration: 1100,
    easing: "easeOutExpo",
    offset: '-=600'
  }).add({
    targets: '.ml8 .letters-left',
    scale: [0, 1],
    duration: 1200,
    offset: '-=550'
  }).add({
    targets: '.ml8 .bang',
    scale: [0, 1],
    rotateZ: [45, 15],
    duration: 1200,
    offset: '-=1000'
  }).add({
    targets: '.ml8',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1400
  });

anime({
  targets: '.ml8 .circle-dark-dashed',
  rotateZ: 360,
  duration: 8000,
  easing: "linear",
  loop: true
});</script>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

        