<html>
<head>
  <body background="https://images.pexels.com/photos/1097930/pexels-photo-1097930.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
<style type="text/css">
h1 { text-align: center}
h3 { text-align: center}

body {
    background-color: lightgreen;
}

input[type=text], select {
    width: 30%;
    background-color: #FFE4B5;
    padding: 7px 20px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    border-color: #FFE4B5;
    box-sizing: border-box;
    }
input[type=password], select {
    width: 30%;
    background-color: #FFE4B5;
    padding: 7px 20px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    border-color: #FFE4B5;
}
input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 7px 20px;
    margin: 4px 0;
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
<center>
<h2 style="color: black">Login:</h2><br>
</center>

<center>
<form action="merge.php" method="post">
<b>User ID:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="au" placeholder="No Domain-name required" >
<br>
<b>Password:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="ap" >
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="watt" value="submit">
</form>
</center>












<br>

<br>
<h3 style="color: deeppink">Create Database account:</h3><br>
<b style="color:blue">Please type to create  your  username & password:</b>
<br>
<center>
<form action="merge.php" method="post">
<b> User ID:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="sqlu" placeholder="No Domain-name required">
<br>
<b> Password:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="sqlp" >
<br>
<b>Your full name:</b>
<input type="text" name="uuuname" required >
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="goinwsqlup" value="submit">
</center>
</form>


<?php
session_start();

//////////code for /@iitdh <start>
// if(isset($_POST['goinwsqlup']) )
// {
// $uu = $_POST['sqlu'];
// $up = $_POST['sqlp'];

// $l=strlen("$uu");

// if($l>=13){
// $nem="@iitdh.ac.in";
// $bool=0;


// for ($x =($l-1); $x >=($l-12)  ; $x--) {

//         static $count=0;
// static $f=11;       
//         if($nem[$f]==$uu[$x]){ $count++;  $f--; }


// } 

// if($count==12){$bool=1;}
// if($bool==1){




// $conc = mysqli_connect("localhost","root","");
// if($conc){
// echo "connected";
//   }
// else{
// echo "not connected";
//   }
// $zx = "create database ipd";
// if($conc->query($zx)){$_SESSION['c'] = 1 ;
// echo "<br>database ipd created successfully<br>";}
// $u = "use ipd";
// mysqli_query($conc,$u);






// $_SESSION['suname'] = $_POST['uuuname'];
// $tab="create table $uu(slno int,name varchar(120), email varchar(120), companyno bigint, phone bigint,webpage varchar(120))";
// $ac = mysqli_query($conc,$tab);
// $gen = "grant all privileges on ipd.$uu to '$uu'@'localhost' identified by '$up'";
// $ab =  mysqli_query($conc,$gen);
// if($ac){echo "made";}
// $_SESSION['su'] = $uu;
// $_SESSION['sp'] = $up;
// $_SESSION['loggedinuser'] = 1;
// header("Location: http://localhost//iitdh/pp/user.php");
// }

// else{
//     echo "Registration Denied";
// }

// }


// }
///////////////////////////Code for @iitdh <end>


if(isset($_POST['goinwsqlup']) )
{
$conc = mysqli_connect("localhost","root","");
if($conc){
echo "connected";
  }
else{
echo "not connected";
  }
$zx = "create database ipd";
if($conc->query($zx)){$_SESSION['c'] = 1 ;
echo "<br>database ipd created successfully<br>";}
$u = "use ipd";
mysqli_query($conc,$u);
$uu = $_POST['sqlu'];
$up = $_POST['sqlp'];
$_SESSION['suname'] = $_POST['uuuname'];
$tab="create table $uu(slno int,name varchar(120), email varchar(120), companyno bigint, phone bigint,webpage varchar(120))";
$ac = mysqli_query($conc,$tab);
$gen = "grant all privileges on ipd.$uu to '$uu'@'localhost' identified by '$up'";
$ab =  mysqli_query($conc,$gen);
if($ac){echo "made";}
$_SESSION['su'] = $uu;
$_SESSION['sp'] = $up;
$_SESSION['loggedinuser'] = 1;
header("Location: http://localhost//iitdh/pp/user.php");
}






if(isset($_POST['watt']))
{
$uuuu = $_POST['au'];
$pppp = $_POST['ap'];
// $uuuu=$check;
// $pppp=$checkp;    
if($uuuu!="root" && $uuuu!=""){
$conc1 = mysqli_connect("localhost","$uuuu","$pppp");
if($conc1)
{
$_SESSION['loggedinv'] = 1;
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
}



///////////////////////////

if(isset($_POST['watt']) )
{


$adu = $_POST['au'];
$apw = $_POST['ap'];
// $adu=$check;
// $apw=$checkp;

if($adu=='root'){
$conc1 = mysqli_connect("localhost","$adu","$apw");
if($conc1)
{
$_SESSION['loggedinsuper'] = 1;
$_SESSION['la'] = $adu;
$_SESSION['lp'] = $apw;

$uo = "use ipd";
mysqli_query($conc1,$uo);
echo  "valid";
header("Location: http://localhost//iitdh/pp/adminv.php");
}
else
  {
  echo  "invalid";
  }



}
}









?>


</html>
