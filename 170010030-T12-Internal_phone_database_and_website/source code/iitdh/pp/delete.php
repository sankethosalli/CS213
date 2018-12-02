<?php
session_start();

$id = $_GET['id'];
$dbname = "ipd";
$naam =$_SESSION['usr'];
$pass =$_SESSION['psr'];
$conc = mysqli_connect("localhost","$naam","$pass");
$uo = "use ipd";

 mysqli_query($conc,$uo);

$dltu = "delete from $naam where slno = $id";

if(mysqli_query($conc,$dltu) )
{
header("Location: http://localhost//iitdh/pp/userv.php");
exit;
}
else
{
echo "error deleting";
}

?>
