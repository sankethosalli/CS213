<?php
session_start();

$id = $_GET['id'];


include 'settings.php';

  $conc = mysqli_connect("$domainname","$drootname","$dpassword");
$uo = "use ipdr";

 mysqli_query($conc,$uo);

$dltu = "delete from request1729 where slno = $id";

if(mysqli_query($conc,$dltu) )
{
header("Location: http://localhost//iitdh/pp/adminv.php");
exit;
}
else
{
echo "error deleting";
}

?>
