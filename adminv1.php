<html>


<head>
<style type="text/css">
h1 { text-align: center}
h3 { text-align: center}

body {
    background-color: lightgreen;
}

input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

</body>
</style>
</head>


<form action="adminv.php" method="POST">
<input type="submit" name="distall" value="Display all profiles"/>
</form>

<form action="adminv.php" method="POST">
<input type="text" name="nama" placeholder="name pattern"/>
<input type="submit" name="dist" value="Display profiles"/>
</form>


<form action="adminv.php"  method="POST" >
<br><h3 style="color: deeppink">Fill the User Id after viewing for complete deletion:</h3>
<input type="text" name="iddlt" placeholder="User ID"/>
<input type="submit" name="dlt" value="Delete profile"  />
</form>

<form action="adminv.php" method="POST">
<input type="submit" name="out" value="logout" style="color:blue" />
</form>

<?php
session_start();
if(!isset($_SESSION['loggedinsuper']))
{
  header("Location: http://localhost//iitdh/pp/usercreate.php");
}

 $conc = mysqli_connect("localhost","root","");
 $uo = "use ipd";
mysqli_query($conc,$uo);

 if(isset($_POST['dlt'])){
 $uid = $_POST['iddlt'];
 $indlt = "drop table $uid";
 $dltuser = "drop user '$uid'@'localhost' ";

 if(mysqli_query($conc,$indlt) && mysqli_query($conc,$dltuser)){echo "<br>deleted account and data successfully";}
 else {echo "didn't match";}
 }

if(isset($_POST['distall'])){
echo "displaying all <b>user IDs & </b> profile names<br>";
$extall= "show tables";
$resultall =  mysqli_query($conc,$extall);
$nall=mysqli_num_rows($resultall);
$ia = 0;
while($ia<$nall)
{
$rall = mysqli_fetch_assoc($resultall);
$tabwa = $rall['Tables_in_ipd'];
$namfetch = "select name from $tabwa";
$nq =  mysqli_query($conc,$namfetch);
$namwa = mysqli_fetch_assoc($nq);
echo "<strong>".$rall['Tables_in_ipd']."</strong>"."   ".$namwa['name']."<br>";
$ia = $ia +1;
}
}

if(isset($_POST['dist'])){
  echo "  <br><b>displaying  profile data</b><br> ";
$nmpat = $_POST['nama'];
$chk = 0;
$ext= "show tables";
$result =  mysqli_query($conc,$ext);
$n=mysqli_num_rows($result);
$i = 0;
while($i<$n)
 {
$r = mysqli_fetch_assoc($result);
$current = $r['Tables_in_ipd'];
$tabname = "select * from $current  where name like '%$nmpat%'";
$rendavu =  mysqli_query($conc,$tabname);
$lar = mysqli_fetch_assoc($rendavu);

if($lar !== NULL)
 {
$chk = 1;
$mat = "select * from $current";
$resultmat =  mysqli_query($conc,$mat);
$nmat=mysqli_num_rows($resultmat);
$tab1 = '<table style="width:50%" border="1" bordercolor="green">';
$tab1 .= "<tr><td><b>email</b></td><td><b>companyno</b></td><td><b>phone</b></td></tr>";
$ij = 0;
while($ij<$nmat)
 {
$rowmat = mysqli_fetch_assoc($resultmat);
$tab1 .= "<tr><td>".$rowmat['email']."</td><td>".$rowmat['companyno']."</td><td>".$rowmat['phone']."</td></tr>";
  $ij =$ij+1;
 }
$tab1 .="</table>";
$rowfornamemat = mysqli_fetch_assoc($resultmat);

echo "<b>Name</b>: ".$lar['name']."     "."<b>User Id</b>: ".$current;
echo "\r\n";
echo $tab1;


}
$i =$i+1;
}

if($chk == 0){echo "no matches found, please use appropriate pattern";}
}
if(isset($_POST['out']))
{
session_destroy();
header("Location: http://localhost//iitdh/pp/usercreate.php");

}

?>
</html>
