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
input[type=password], select {
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

<p><h1 style="color: green">INTERNAL PHONE DATABASE</h1></p>
  <br>
 <br>
To login as admin:
 <br><br>

 <form action="usercreate.php" method="post">
  User ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="au" >
 <br>

  Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="password" name="ap" >
 <br>

 <input type="submit" name="goina" value="submit">
 </form>





  <br>
 <br>
To login as user:
 <br><br>

 <form action="usercreate.php" method="post">
  User ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="uuu" >
 <br>

  Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="password" name="ppp" >
 <br>

 <input type="submit" name="goin" value="submit">
 </form>



 <br>
<br>
<h3 style="color: deeppink">Create Database account:</h3><br>

<b style="color:blue">Please type to create  your  username & password:</b>
<br><br>

<form action="usercreate.php" method="post">
 <b> User ID: </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="sqlu" >
<br>

<b> Password:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="sqlp" >
<br>
<b> Your full name: </b>
<input type="text" name="uuuname" required >
<br>
<input type="submit" name="goinwsqlup" value="submit">
</form>





<?php
session_start();



if(isset($_POST['goinwsqlup']) )
{
$conc = mysqli_connect("localhost","root","");
  if($conc){
    echo "connected";
  }else{
    echo "not connected";
  }
  $zx = "create database ipd";
  if($conc->query($zx)){$_SESSION['c'] = 1 ;echo "<br>database ipd created successfully<br>";}
 $u = "use ipd";
  mysqli_query($conc,$u);


  $uu = $_POST['sqlu'];
$up = $_POST['sqlp'];
$_SESSION['suname'] = $_POST['uuuname'];

$tab="create table $uu(slno int,name varchar(120), email varchar(120), companyno int, phone int)";
$ac = mysqli_query($conc,$tab);
$gen = "grant all privileges on ipd.$uu to '$uu'@'localhost' identified by '$up'";

$ab =  mysqli_query($conc,$gen);
if($ac){echo "made";}

$_SESSION['su'] = $uu;
$_SESSION['sp'] = $up;
$_SESSION['loggedinuser'] = 1;

 header("Location: http://localhost//iitdh/pp/user.php");

}

if(isset($_POST['goin']) )
{
  $uuuu = $_POST['uuu'];
  $pppp = $_POST['ppp'];

  $conc1 = mysqli_connect("localhost","$uuuu","$pppp");

if($conc1)
{   $_SESSION['loggedinv'] = 1;
  $_SESSION['tabname'] = $uuuu;
   $_SESSION['usr'] = $uuuu;
   $_SESSION['psr'] = $pppp;
   $_SESSION['po'] = $conc1;

  $uo = "use ipd";


  mysqli_query($conc1,$uo);

  echo  "valid";

  header("Location: http://localhost//iitdh/pp/userv.php");
}
  else
  {
  echo  "invalid";
  }
}
  // $_SESSION['loggedin'] = 1;
//////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['goina']) )
{
  if($_POST['au'] == 'admin' && $_POST['ap'] == '123456')
  {
    // header("Location: http://localhost//iitdh/pp/lib.php");



    $conc1 = mysqli_connect("localhost","root","");

  if($conc1)
  {    $_SESSION['loggedinsuper'] = 1;

  //   $_SESSION['loggedin'] = 1;
    // $_SESSION['tabname'] = $uuuu;
    //  $_SESSION['usr'] = $uuuu;
    //  $_SESSION['psr'] = $pppp;
    //  $_SESSION['po'] = $conc1;

    $uo = "use ipd";


    mysqli_query($conc1,$uo);

    echo  "valid";

    header("Location: http://localhost//iitdh/pp/adminv.php");
  }





  }

  else
  {
  echo  "invalid";
  }
//   $uuuu = $_POST['uuu'];
//   $pppp = $_POST['ppp'];
//
// if()

}
/////////////////////////////////////////////////////////////////////////////





?>





</html>
