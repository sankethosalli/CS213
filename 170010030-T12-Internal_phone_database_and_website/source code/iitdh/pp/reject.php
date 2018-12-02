<?php


$id = $_GET['id'];


include 'settings.php';

  $conc = mysqli_connect("$domainname","$drootname","$dpassword");



  $uo = "use ipdr";
  mysqli_query($conc,$uo);


$update = "update request1729 set status = 'rejected' where slno = $id";


if(mysqli_query($conc,$update)){echo "<br>status updated successfully";}






 ?>
