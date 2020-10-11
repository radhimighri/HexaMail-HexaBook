           <section class="panel">
              <div class="panel-body">
                <a href="mail_compose.php" class="btn btn-compose">
                  <i class="fa fa-pencil"></i>  Send Mail
                  </a>
                <ul class="nav nav-pills nav-stacked mail-nav">
          <?php  
          $results=mysqli_query($base,"SELECT count(*) as total from messages where trash=0 and lu=0 and  $_SESSION[id]=id_destinataire");
          $datamdp=mysqli_fetch_assoc($results);

          $results2=mysqli_query($base,"SELECT count(*) as total from msg_sent where trash=0 and $_SESSION[id]=id_expediteur");
          $datsent=mysqli_fetch_assoc($results2); 


                     
          $results3=mysqli_query($base,"SELECT count(*) as total from messages where trash=1 and $_SESSION[id]=id_destinataire");
          $results4=mysqli_query($base,"SELECT count(*) as total from msg_sent where trash=1 and $_SESSION[id]=id_expediteur");

          $dattrash=mysqli_fetch_assoc($results3); 
          $dattrash2=mysqli_fetch_assoc($results4); 
          $c=$dattrash['total']+$dattrash2['total'];
          ?>

                  <li><a href="inbx.php"> <i class="fa fa-inbox"></i> Mails <span class="label label-theme pull-right inbox-notification"><?php echo "$datamdp[total]" ?></span></a></li>
                  <li><a href="sent.php"> <i class="fa fa-envelope-o"></i> Sent Mails <span class="label label-theme pull-right inbox-notification"><?php echo "$datsent[total]" ?></span></a></li>
                  </li>
                  <li class="active"><a href="trash.php"> <i class="fa fa-trash-o"></i> Trash <span class="label label-theme pull-right inbox-notification"><?php echo "$c" ?></span></a></li>
                </ul>
                <br>


           
              </div>
            </section>