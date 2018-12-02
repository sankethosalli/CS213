<html>
<body>
	
<?php
////////////////Display To All<Start>
include 'settings.php';



if(isset($_POST['dise'])){
  echo " <center> <br><b>DISPLAYING PROFILE DATA</b><br> </center><br><br> ";





 $conc = mysqli_connect("$domainname","$drootname","$dpassword");
 $uo = "use ipd";

 mysqli_query($conc,$uo);


// <center>
$empat = $_POST['ema'];
$chk = 0;
$ext= "show tables";
$result =  mysqli_query($conc,$ext);
$n=mysqli_num_rows($result);
$i = 0;
while($i<$n)
{
$r = mysqli_fetch_assoc($result);
$current = $r['Tables_in_ipd'];
$tabname = "select * from $current  where name like '%$empat%'";
$rendavu =  mysqli_query($conc,$tabname);
$lar = mysqli_fetch_assoc($rendavu);

if($lar !== NULL)
{
$chk = 1;
$mat = "select * from $current";
$resultmat =  mysqli_query($conc,$mat);
$nmat=mysqli_num_rows($resultmat);

$tab1 = '<table style="width:50%" border="1" bordercolor="green">';
$tab1 .= "<tr><td><b>email</b></td><td><b>companyno</b></td><td><b>phone</b></td><td><b>webpage</b></td></tr>";
$ij = 0;
while($ij<$nmat)
{
$rowmat = mysqli_fetch_assoc($resultmat);
$tab1 .= "<tr><td>".$rowmat['email']."</td><td>".$rowmat['companyno']."</td><td>".$rowmat['phone']."</td><td>".$rowmat['webpage']."</td></tr>";
$ij =$ij+1;
}
$tab1 .="</table>";
$rowfornamemat = mysqli_fetch_assoc($resultmat);

echo "<center> <b>Name</b>: ".$lar['name']."      "."  <b>User Id</b>: $current </center>  ";
echo "\r\n";
echo "<center> $tab1 </center> ";
echo "<br><br><br>";    
}
$i =$i+1;
}

// </center>

if($chk == 0){echo "no matches found, please use appropriate pattern";}
}



////////////Display to all <End>


?>

<center>
<br>

<form action="usercreate.php" method="POST">
<!-- <input type="text" name="ema" placeholder="email pattern"/> -->
<input type="submit" name="MiCe" value="GO BACK"  />
</form>

<br>

</center>

</body>

</html>