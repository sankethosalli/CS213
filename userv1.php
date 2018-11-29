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

<form action="userv.php"  method="POST" >
  Profile:
<input type="text" name="em" placeholder="email"/>
<input type="text" name="cy" placeholder="comapny-nos"/>
<input type="text" name="py" placeholder="phone-nos"/>
<input type="submit" name="adda" value="Add Record"  />
</form>

<form action="userv.php" method="POST">
<input type="submit" name="out" value="logout" style="color:blue" />

<input type="submit" name="clr" value="clear" style="color:blue" />
<input type="submit" name="dis" value="Display profile"  />

</form>


<?php
session_start();
if(!isset($_SESSION['loggedinv']))
{

  header("Location: http://localhost//iitdh/pp/usercreate.php");

}

$naam =$_SESSION['usr'];
$pass =$_SESSION['psr'];
 $conc = mysqli_connect("localhost","$naam","$pass");
 $uo = "use ipd";

 mysqli_query($conc,$uo);
if(isset($_POST['dis'])){
  echo "  <br>displaying $naam <br> ";
$t = $_SESSION['tabname'];
$ex= "select * from  $t";
$result1 =  mysqli_query($conc,$ex);
$result2 =  mysqli_query($conc,$ex);

$n1=mysqli_num_rows($result1);
$tab1 = '<table style="width:50%" border="1" bordercolor="green">';
$tab1 .= "<tr><td><b>email</b></td><td><b>companyno</b></td><td><b>phone</b></td></tr>";
$i = 0;
while($i<$n1)
{
 $row = mysqli_fetch_assoc($result1);

$tab1 .= "<tr><td>".$row['email']."</td><td>".$row['companyno']."</td><td>".$row['phone']."</td><td><a href='delete.php?id=".$row['slno']."'>delete</a> </td></tr>";
  $i =$i+1;
}
$tab1 .="</table>";

$rowforname = mysqli_fetch_assoc($result2);

echo "<b>Name</b>: ".$rowforname['name'];
echo $tab1;
}

if(isset($_POST['adda'])){

$t = $_SESSION['tabname'];

$si= "select * from  $t";

$resultsi =  mysqli_query($conc,$si);

$nsi=mysqli_num_rows($resultsi);
$nsi = ($nsi+1)*(rand());
$email = $_POST['em'];
$comn = $_POST['cy'];
$phon = $_POST['py'];
$t = $_SESSION['tabname'];
$name = "";

$inwryt = "insert into $t values('$nsi','$name','$email','$comn','$phon')";

if(mysqli_query($conc,$inwryt)){echo "<br>added successfully";}

}

if(isset($_POST['clr'])){
  echo "";

}

if(isset($_POST['out']))
{
session_destroy();
header("Location: http://localhost//iitdh/pp/usercreate.php");
}
?>

</html>
