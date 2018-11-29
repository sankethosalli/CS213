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


<form action="user.php"  method="POST" >
    Profile:
  <input type="text" name="em" placeholder="email"/>
  <input type="text" name="cy" placeholder="comapny-nos"/>
  <input type="text" name="py" placeholder="phn-nos"/>
  <input type="text" name="wy" placeholder="paste complete URL"/>
  <input type="submit" name="add1" value="add record"  />
  </form>

<form action="user.php" method="POST">
  <input type="submit" name="out" value="logout" style="color:blue" />
</form>

<?php
 session_start();

 if(!isset($_SESSION['loggedinuser']))
 {
   header("Location: http://localhost//iitdh/pp/usercreate.php");
 }

$uu = $_SESSION['su'];
$up = $_SESSION['sp'];
$conc = mysqli_connect("localhost","$uu","$up");
$uo = "use ipd";
mysqli_query($conc,$uo);
if($conc) {echo "eneterd";}
if(isset($_POST['add1']))
{
$name = $_SESSION['suname'];
$email = $_POST['em'];
$comn = $_POST['cy'];
$phon = $_POST['py'];
$tab = $_SESSION['su'];
if($_POST['wy'] == NULL)
{
  $hyperw = "";
}
else {
$url = $_POST['wy'];
$hyperw = "<a href=$url>goto</a>";
}
$si= "select * from  $tab";
$resultsi =  mysqli_query($conc,$si);
$nsi=mysqli_num_rows($resultsi);
$nsi = ($nsi+1)*(rand());
$inwryt = "insert into $tab values('$nsi','$name','$email','$comn','$phon','$hyperw')";
if(mysqli_query($conc,$inwryt)){echo "<br>added successfully";}
}
if(isset($_POST['out']))
{
session_destroy();
header("Location: http://localhost//iitdh/pp/usercreate.php");
}
?>

</html>
