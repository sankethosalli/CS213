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
<h2 style="color: black">To Login:</h2><br>
<form action="usercreate.php" method="post">
<b>User ID:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="uuu" placeholder="No Domain-name required">
<br>
<b>Password:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="ppp" >
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="goin" value="submit">
</form>
</center>

<br>

<center>
<br>
<br>
<br>
<br>

<form action="show.php" method="POST">
<input type="text" name="ema" placeholder="OPTIONAL NAME PATTERN / OR DEFAULT DISPLAY ALL"/>

<input type="submit" name="dise" value="DISPLAY ALL CURRENT PROFILES"  />
</form>

<br>
</center>
<br>
<br>
<br>

<br>
<center>
<h3 style="color: deeppink">Create Database Account(SIGN UP):</h3><br>
<b style="color:blue">Please type to create  your  username & password:</b>
<br>
<center>


<form action="usercreate.php" method="post">
<b> User ID:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="sqlu" placeholder="No Domain-name required">
<br>
<b> Password:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="sqlp"  required >
<br>
<b>Your Full Name:</b>
<input type="text" name="uuuname" required >
<br>
<b>Your Institutional Email-Id:</b>  <br> 
<center>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="remail" placeholder="shouldbe@iitdh.ac.in"  required  >
</center>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="goinwsqlup" value="submit">
</center>
</form>
<br>
<br>
<br>
<br>
<br>
<br>


<form action="usercreate.php" method="POST">
<input type="text" name="reqpat" placeholder="name pattern"/>
<input type="submit" name="disreq" value="Display Requests LOG"  />
</form>


<?php
session_start();

include 'settings.php';


if(isset($_POST['disreq']) )
{




  $conca = mysqli_connect("$domainname","$drootname","$dpassword");
// if($conc){echo "aaaaaaaaaaaaaaaaaaaaaaa";}

  $nmp = $_POST['reqpat'];
  $exa = "select * from request1729 where name like '%$nmp%' ";
// echo $domainname;
//echo $nmp;

  $uo = "use ipdr";

  mysqli_query($conca,$uo);

// if(mysqli_query($conca,$uo)){echo "@@@@@@@@@@@@@@@@@@@@@@@@@22";}


  $resu =  mysqli_query($conca,$exa);

  $n=mysqli_num_rows($resu);

  $tab1 = '<table style="width:50%" border="1" bordercolor="green">';
  $tab1 .= "<tr><td><b>username</b></td><td><b>name</b></td><td><b>status</b></td></tr>";

  $i = 0;
  while($i<$n)
  {
   $row = mysqli_fetch_assoc($resu);

  $tab1 .= "<tr><td>".$row['uname']."</td><td>".$row['name']."</td><td>".$row['status']."</td></tr>";
    $i =$i+1;
  }
  $tab1 .="</table>";


  echo $tab1;

}





if(isset($_POST['goinwsqlup']) )
{





$concn = mysqli_connect("$domainname","$drootname","$dpassword");

$zx = "create database ipd";
$see = mysqli_query($concn,$zx);



if($concn )
{
echo "connected";


$uu = $_POST['sqlu'];
$up = $_POST['sqlp'];
$nam = $_POST['uuuname'];
$ema = $_POST['remail'];
$status = "pending";

// $mak = "use ipd";
//
// mysqli_query($concn,$mak);


$mak = "create database ipdr";

mysqli_query($concn,$mak);

$mak = "use ipdr";

mysqli_query($concn,$mak);




$rtab="create table request1729(slno bigint,uname varchar(120), upassword varchar(120),name varchar(120) , email varchar(120) , status varchar(120) ,requestdeletion varchar(120) )";

mysqli_query($concn,$rtab);

$nsi = rand()*rand();


$inwryt = "insert into request1729 values('$nsi','$uu','$up','$nam','$ema','$status','NULL')";


    // Array explode(string $delimiter, string $toexplode, [int $limit]);

$exploded = explode("@",$ema);


// print_r($exploded);

if($exploded[1] == "iitdh.ac.in")
{

  $uo = "use ipdr";
  mysqli_query($concn,$uo);

// echo "qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq";

  $see = mysqli_query($concn,$inwryt);
if($see)
{
  echo "<script> alert('request sent to admin approval. Come back Check later') </script>";

}


}

else{
  echo "<script> alert('invalid email domain') </script>";

}

  }
else{
echo "not connected";
  }

}



// $drootname
// $dpassword


if(isset($_POST['goin']) )
{
$uuuu=$_POST['uuu'];

if($drootname!=$uuuu){


$uuuu = $_POST['uuu'];
$pppp = $_POST['ppp'];
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


else
{


$adu = $_POST['uuu'];
$apw = $_POST['ppp'];

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
